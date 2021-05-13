<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class RecruterController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->roles != 'ROLES_RECRUTER' && Auth::user()->roles != 'ROLES_ADMIN')
        {
            return back();
        }

        $user = Auth::user();

        $jobsAll = Jobs::select('jobs.*')
            ->where('jobs.author', '=', $user->username)
            ->paginate(12);

        return view('recruter.index', [
            'jobsAll' => $jobsAll
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        $user = Auth::user();

        $this->validate($request,[
            'title' => 'max:255',
            'category' => 'required',
            'smallContent' => 'max:160',
            'content' => 'required',
            'localisation' => 'required',
            'status' => 'required',
            'type' => 'required',
            'salaire' => 'required',
            'avantages' => 'required',
            'horaires' => 'required',
            'teletravail' => 'required',
            'experience' => 'required',
            'experience_exiger' => 'required'
    
        ]);

        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save( public_path('/images/jobs/' . $filename ) );

        DB::table('jobs')->insert([
            'author' => $user->username,
            'title' => $request->title,
            'category' => $request->category,
            'smallContent' => $request->smallContent,
            'content' => $request->content,
            'image' => $filename,
            'localisation' => $request->localisation,
            'active' => $request->active,
            'status' => $request->status,
            'type' => $request->type,
            'salaire' => $request->salaire,
            'avantages' => json_encode($request->avantages),
            'horaires' => json_encode($request->horaires),
            'teletravail' => $request->teletravail,
            'experience' => $request->experience,
            'experience_exiger' => $request->experience_exiger,
            'created_at' => Carbon::now()
        ]);

        return redirect('recruter')->with('success','Votre annonce à été mise en ligne');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request)
    {
        return view('recruter.create');
    }

    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove_jobs($id){

        $jobs = DB::table('jobs')->where('id', '=', $id)->where('author', '=', Auth::user()->username)->first();

        $destinationPath = public_path('images/jobs/');
        File::delete($destinationPath.$jobs->image);

        DB::table('jobs')->where('id', '=', $id)->where('author', '=', Auth::user()->username)->delete();

        return redirect('recruter')->with('success','Votre offre à été supprimer');

    }

    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function validate_jobs($id){

        DB::table('jobs')->where('id', '=', $id)->where('author', '=', Auth::user()->username)->update(array('active' => 1));

        return redirect('recruter')->with('success','Votre offre à été mise en ligne');

    }

    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function invalidate_jobs($id){

        DB::table('jobs')->where('id', '=', $id)->where('author', '=', Auth::user()->username)->update(array('active' => 0));

        return redirect('recruter')->with('success','Votre offre est désormais invisible');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update_jobs($id)
    {

        $jobs = DB::table('jobs')->where('id', '=', $id)->where('author', '=', Auth::user()->username)->first();

        return view('recruter.update', [
            'jobs' => $jobs
        ]);
    }

}