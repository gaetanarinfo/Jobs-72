<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use App\Models\User;
use App\Models\JobsLikes;
use App\Models\JobsApplies;
use App\Providers\JobsServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @param  string  $author
     * @return \Illuminate\View\View
     */
    public function show($id, $author)
    {
        $cat2 = DB::table('jobs')->where('id', $id)->get();

        if($cat2->count() == 0)
        {
            return redirect('/');
        }else{

            $cat = DB::table('jobs')->where('id', $id)->first();

            if($cat->active == 1)
            {
                $cat = DB::table('jobs')->where('id', $id)->first();
                $latestJobs = Jobs::where('active', 1)->where('category', $cat->category)->orderBy('created_at', 'desc')->limit('3')->get();
                $ipVue = DB::table('jobs_vues')->where('ip', request()->ip())->first();
                $likeVue = DB::table('jobs_likes')->where('id', $id)->get();

                $publicite = DB::table('jobs_pub')->first();

                if($likeVue->count() == 0)
                {
                    $likeVue->ip = null;
                }

                if(Auth::user())
                {

                    if($ipVue->user_id != Auth::user()->id || $ipVue->jobs_id != $id)
                    {
                        
                            /*
                                Insert le nombre de vue
                            */
                            DB::table('jobs_vues')->insert([
                                'jobs_id' => $id,
                                'user_id' => Auth::user()->id,
                                'ip' => request()->ip()
                            ]);

                            /*
                                Met à jour le nombre de vue
                            */
                            DB::table('jobs')
                            ->where('id', $id)->increment('vue');                       
                    
                    }    
                }

                return view('jobs-details', [
                    'jobs' => Jobs::findOrFail($id),
                    'latestJobs' => $latestJobs,
                    'likeVue' => $likeVue,
                    'ipUser' => request()->ip(),
                    'publicite' => $publicite
                ]);
            }else{
                return redirect('/');
            }
        }
    }

    /**
     * @param  int  $id
     * @param  string  $author
     * @return \Illuminate\View\View
     */
     public function likes($id)
     {
 
         $ipVue = DB::table('jobs_likes')->where('ip', request()->ip())->get();
 
         if(Auth::user()) {
            if($ipVue->count() == 0)
            {
                /*
                    Insert le nombre de like
                */
                DB::table('jobs_likes')->insert([
                    'jobs_id' => $id,
                    'ip' => request()->ip()
                ]);
    
                /*
                    Met à jour le nombre de like
                */
                DB::table('jobs')
                ->where('id', $id)->increment('likes');     
                
                return back()->with('success','Merci, pour votre vote.');
            }else{
                return back()->with('error','Désoler, vous avez déjà voté.');
            }
        }    
 
     }

     /**
     * @param  int  $id
     * @param  string  $author
     * @return \Illuminate\View\View
     */
    public function apply(Request $request, $id, $author)
    {
        $apply = JobsApplies::select('*')
            ->where('jobs_applies.user_id', '=', Auth::user()->id)
            ->where('jobs_applies.jobs_id', '=', $id)
            ->get();      
 
        if(Auth::user()) {

           if($apply->count() == 0)
           {
                $this->validate($request,[

                    'motivation' => 'max:160',
            
                ]);

               /*
                   Insert le nombre de apply
               */
               DB::table('jobs_applies')->insert([
                   'jobs_id' => $id,
                   'user_id' => Auth::user()->id,
                   'author' => Auth::user()->username,
                   'motivation' => $request->motivation,
                   'cv' => Auth::user()->cv
               ]);
   
               /*
                   Met à jour le nombre de apply
               */
               DB::table('jobs')
               ->where('id', $id)->increment('apply');     
               
               return back()->with('success','Merci, d\'avoir postulé à cette offre.');
           }else{
               return back()->with('error','Désoler, vous avez déjà postulé à cette offre.');
           }
           
       }    
    }

     /**
     * Show the profile for a given user.
     *
     * @param  string  $category
     * @return \Illuminate\View\View
     */
    public function show_cat($category)
    {

        $jobsCat = Jobs::select('jobs.*')
        ->where('jobs.active', '=', 1)
        ->where('jobs.category', '=', $category)
        ->paginate(15);

        $jobsCatCount = Jobs::select('jobs.*')
        ->where('jobs.active', '=', 1)
        ->where('jobs.category', '=', $category)
        ->count();

        return view('jobs-category', [
            'jobsCat' => $jobsCat,
            'category' => $category,
            'jobsCatCount' => $jobsCatCount
        ]);

    }

    /**
     * Show the profile for a given user.
     *
     * @param  string  $key
     * @return \Illuminate\View\View
     */
    public function show_key($key)
    {

        $jobsKey = Jobs::select('jobs.*')
        ->where('jobs.active', '=', 1)
        ->where('jobs.title', 'like', '%' . $key . '%')
        ->paginate(15);

        $jobsKeyCount = Jobs::select('jobs.*')
        ->where('jobs.active', '=', 1)
        ->where('jobs.title', 'like', '%' . $key . '%')
        ->count();


        return view('jobs-key', [
            'jobsKey' => $jobsKey,
            'key' => $key,
            'jobsKeyCount' => $jobsKeyCount
        ]);

    }

    /**
     * Show the profile for a given user.
     *
     * @param  string  $city
     * @return \Illuminate\View\View
     */
    public function show_city($city)
    {

        $jobsCity = Jobs::select('jobs.*')
        ->where('jobs.active', '=', 1)
        ->where('jobs.localisation', 'like', '%' . $city . '%')
        ->paginate(15);

        $jobsCityCount = Jobs::select('jobs.*')
        ->where('jobs.active', '=', 1)
        ->where('jobs.localisation', 'like', '%' . $city . '%')
        ->count();

        return view('jobs-city', [
            'jobsCity' => $jobsCity,
            'city' => $city,
            'jobsCityCount' => $jobsCityCount
        ]);

    }

}