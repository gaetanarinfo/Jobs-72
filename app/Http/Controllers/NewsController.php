<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Model\NewsApplies;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cat2 = DB::table('news')->where('id', $id)->get();

        if($cat2->count() == 0)
        {
            return redirect('/');
        }else{

            $cat = DB::table('news')->where('id', $id)->first();

            if($cat->active == 1)
            {
                $cat = DB::table('news')->where('id', $id)->first();
                $latestNews = News::where('active', 1)->where('category', $cat->category)->orderBy('created_at', 'desc')->limit('3')->get();
                $ipVue = DB::table('news_vues')->where('ip', request()->ip())->first();
                $likeVue = DB::table('news_likes')->where('id', $id)->get();

                $publicite = DB::table('jobs_pub')->first();

                if($likeVue->count() == 0)
                {
                    $likeVue->ip = null;
                }

                if(Auth::user())
                {

                    if($ipVue->user_id != Auth::user()->id || $ipVue->news_id != $id)
                    {
                        
                        /*
                            Insert le nombre de vue
                        */
                        DB::table('news_vues')->insert([
                            'news_id' => $id,
                            'user_id' => Auth::user()->id,
                            'ip' => request()->ip()
                        ]);

                        /*
                            Met à jour le nombre de vue
                        */
                        DB::table('news')
                        ->where('id', $id)->increment('vue');                       
                    
                    }    
                }

                $commentAll = DB::table('news_comment')->where('news_id', $id)->orderBy('created_at', 'desc')->get();
                $countComment = DB::table('news_comment')->where('news_id', $id)->count();

                return view('news-details', [
                    'news' => News::findOrFail($id),
                    'latestNews' => $latestNews,
                    'likeVue' => $likeVue,
                    'ipUser' => request()->ip(),
                    'commentAll' => $commentAll,
                    'countComment' => $countComment,
                    'publicite' => $publicite
                ]);
            }else{
                return redirect('/');
            }
        }
    }

    /**
     * @param  int  $news_id
     * @param  int  $user_id
     * @return \Illuminate\View\View
     */
    public function likes($news_id, $user_id)
    {

        $ipVue = DB::table('news_comment_likes')->where('news_id', $news_id)->where('user_id', Auth::user()->id)->get();

        if(Auth::user()) {

           if($ipVue->count() == 0)
           {
               /*
                   Met à jour le nombre de like
               */
              DB::table('news_comment')
              ->where('news_id', $news_id)
              ->where('user_id', $user_id)
              ->increment('likes');    

               /*
                   Insert le nombre de like
               */
               DB::table('news_comment_likes')->insert([
                   'news_id' => $news_id,
                   'user_id' => Auth::user()->id,
                   'ip' => request()->ip()
               ]); 
               
               return back()->with('success','Merci, pour votre vote.');
           }else{
               return back()->with('error','Désoler, vous avez déjà voté.');
           }
       }    

    }

    /**
     * @param  int  $news_id
     * @param  int  $user_id
     * @return \Illuminate\View\View
     */
    public function post_comment($news_id)
    {

        if(Auth::user()) {
            
            DB::table('news_comment')->insert([
                'news_id' => $news_id,
                'user_id' => Auth::user()->id,
                'author' => Auth::user()->username,
                'content' => request()->content,
                'created_at' => Carbon::now('Europe/Paris'),
            ]);

            return back()->with('success','Merci, pour votre commentaire.');
        }

    }

    public function show_all()
    {

        $newsAll = DB::table('news')->where('active', 1)->orderBy('created_at', 'desc')->paginate('12');

        return view('news', [
            'newsAll' => $newsAll
        ]);
    }
}