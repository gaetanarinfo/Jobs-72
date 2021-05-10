<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Image;
use File;

class ProfileController extends Controller
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
        return view('user.profile');
    }

    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('file-1')){
    		$avatar = $request->file('file-1');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(140, 140)->save( public_path('/images/avatar/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}else{
            return back()->with('error','Désoler, une erreur est survenue.');
        }

    	return back()->with('success','Votre photo de profil à été modifier.');

    }

    public function  update_profil(Request $request){
       
        
        $user = Auth::user();

            

    $this->validate($request,[

        'lastname' => 'max:255',
        'firstname' => 'max:255',
        'phone' => 'max:14',
        'email' => 'required|email|max:255|unique:users,id,'.$user->id,

    ]);

            

    $user->lastname = $request->lastname;
    $user->firstname = $request->firstname;
    $user->phone = $request->phone;
    $user->email = $request->email;        

    if($request->password){

        if($request->password == $request->passwordComfirm){           

            $this->validate($request,[

                'password' => 'min:8|string',

            ]);

                

            $user->password = Hash::make($request->password);

        }else{
            return back()->with('error','Désoler, une erreur est survenue.');
        }

    }

    $user->save();
    return back()->with('success','Votre profil à été modifier.');

    }

    public function  update_notif(Request $request){
       
        
        $user = Auth::user();

        $user->notification_news = $request->notification_news;
        $user->notification_newsletter = $request->notification_newsletter;
        $user->notification_jobs = $request->notification_jobs;

        $user->save();
        return back()->with('success','Vos notifications on été modifier.');

    }

    public function  update_show(Request $request){
       
        
        $user = Auth::user();

        $user->show_lastname = $request->show_lastname;
        $user->show_firstname = $request->show_firstname;
        $user->show_phone = $request->show_phone;
        $user->show_email = $request->show_email;
        $user->show_cv = $request->show_cv;

        $user->save();
        return back()->with('success','Votre visibilité à été modifier.');

    }


    public function update_cv(Request $request){

    	$file = $request->file('cvdoc');
        $user = Auth::user();

        if($file){

            if($file->getClientOriginalName() != $user->cv){

            $request->validate([
                'cvdoc' => 'required|mimes:pdf|max:2048',
            ]);

            $destinationPath = 'documents/cv';
            $file->move($destinationPath,$file->getClientOriginalName());

            $user->cv = $file->getClientOriginalName();
            $user->save();

            return back()->with('success','Votre CV à été importer.');

            }else{
                return back()->with('error','Vous ne pouvez pas importer le même CV.');
            }

        }else{

            return back()->with('error','Désoler, une erreur est survenue.');
            
        }

    }

    public function remove_account(Request $request){

        $user = Auth::user();

        if($user->avatar != 'default.jpg')
        {
            $destinationPath = public_path('images/avatar/');
            File::delete($destinationPath.$user->avatar);
        }
        $user->delete();

        return redirect('/');

    }
}
