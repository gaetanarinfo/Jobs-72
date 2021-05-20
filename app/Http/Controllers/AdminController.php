<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsComment;
use App\Models\User;
use App\Models\Devis;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use File;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        if(Auth::user()->roles != 'ROLES_ADMIN')
        {
            return back();
        }

        $user = Auth::user();

        $newsAll = News::select('news.*')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);

        $usersAll = User::select('users.*')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);  
            
        $devisAll = Devis::select('devis.*')
            ->orderBy('created_at', 'DESC')
            ->paginate(4);    

        return view('admin.index', [
            'newsAll' => $newsAll,
            'usersAll' => $usersAll,
            'devisAll' => $devisAll
        ]);
    }

    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news_validate($id){

        DB::table('news')->where('id', '=', $id)->update(array('active' => 1));

        return redirect('administration')->with('success','Votre article à été mise en ligne');

    }

    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news_invalidate($id){

        DB::table('news')->where('id', '=', $id)->update(array('active' => 0));

        return redirect('administration')->with('success','Votre article est désormais invisible');

    }

    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news_delete($id){

        $news = DB::table('news')->where('id', '=', $id)->first();

        if($news->image != 'default.jpg')
        {
            $destinationPath = public_path('images/news/');
            File::delete($destinationPath.$news->image);

        }

        DB::table('news')->where('id', '=', $id)->delete();

        return redirect('administration')->with('success','Votre article à été supprimer');

    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news_update(Request $request, $id)
    {

        $news = DB::table('news')->where('id', '=', $id)->first();

        return view('admin.update', [
            'news' => $news
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news_update_post(Request $request, $id)
    {

        $this->validate($request,[
            'title' => 'max:255|required',
            'category' => 'required',
            'smallContent' => 'max:160',
            'content' => 'required',
            'active' => 'required',
        ]); 

        DB::table('news')->where('id', '=', $id)->update(array('updated_at' => Carbon::now('Europe/Paris')));
        
        DB::table('news')->where('id', '=', $id)->update(array(
            'title' => $request->title,
            'category' => $request->category,
            'smallContent' => $request->smallContent,
            'content' => $request->content,
            'active' => $request->active
        ));

        return redirect('administration')->with('success','Votre article à été modifier');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news_create(Request $request)
    {
        
        return view('admin.create');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news_create_post(Request $request)
    {
        $user = Auth::user();
    
            $this->validate($request,[
                'title' => 'max:255',
                'category' => 'required',
                'smallContent' => 'max:160',
                'content' => 'required',
                'image' => 'required',
                'active' => 'required'
            ]);

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path('/images/news/' . $filename ) );

            DB::table('news')->insert([
                'author' => $user->username,
                'title' => $request->title,
                'category' => $request->category,
                'smallContent' => $request->smallContent,
                'content' => $request->content,
                'image' => $filename,
                'active' => $request->active,
                'created_at' => Carbon::now('Europe/Paris')
            ]);

            return redirect('administration')->with('success','Votre article à été crée');

    }

    
    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function users_validate($id){

        DB::table('users')->where('id', '=', $id)->update(array('blocked_at' => null));

        return redirect('administration')->with('success','L\'ulisateur à été débanni');

    }

    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function users_invalidate($id){

        DB::table('users')->where('id', '=', $id)->update(array('blocked_at' => Carbon::now('Europe/Paris')));

        return redirect('administration')->with('success','L\'ulisateur à été banni');

    }

    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove_users($id){

        $users = DB::table('users')->where('id', '=', $id)->first();

        if($users->roles != 'ROLES_ADMIN')
        {

            if($users->avatar != 'default.jpg')
            {
                $destinationPath = public_path('images/avatar/');
                File::delete($destinationPath.$users->avatar);

            }

            DB::table('users')->where('id', '=', $id)->delete();

            return redirect('administration')->with('success','L\'utilisateur à été supprimé');

        }else{
            return redirect('administration')->with('error','L\'utilisateur n\'à pas été supprimé');
        }

    }

}