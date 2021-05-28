<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Contacts;
use App\Models\Jobs;
use App\Models\Sessions;
use App\Models\ContactsReplies;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Image;
use File;
use Mail;
use App\Models\JobsApplies;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $user = Auth::user();
        
        $saveJobs = Jobs::select('jobs.*')
            ->join('jobs_applies', 'jobs_applies.jobs_id', '=', 'jobs.id')
            ->where('jobs_applies.user_id', '=', $user->id)
            ->paginate(6);

        $saveJobs2 = JobsApplies::select('*')
            ->where('jobs_applies.user_id', '=', $user->id)
            ->paginate(6);
            
        $contactsAll = Contacts::select('*')
            ->where('contacts.user_id', '=', $user->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);  
        
        $contactsAllReply = ContactsReplies::select('*')
            ->where('contacts_replies.user_id', '=', $user->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);      
        
        return view('user.profile', [
            'saveJobs' => $saveJobs,
            'saveJobs2' => $saveJobs2,
            'contactsAll' => $contactsAll,
            'contactsAllReply' => $contactsAllReply
        ]);
    }

    public function update_avatar(Request $request){

        $user = Auth::user();

        if($user->avatar != 'images/avatar/default.jpg')
        {
            $destinationPath = public_path('images/avatar/');
            File::delete($destinationPath.$user->avatar);

            $user->avatar = null;
            $user->save();
        }

    	// Handle the user upload of avatar
    	if($request->hasFile('file-1')){
    		$avatar = $request->file('file-1');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(140, 140)->save( public_path('/images/avatar/' . $filename ) );

    		$user->avatar = 'images/avatar/' . $filename;
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
        'facebook' => 'max:255',
        'twitter' => 'max:255',
        'linkedin' => 'max:255',
        'github' => 'max:255',
        'web' => 'max:255',
        'biography' => 'max:160',
        'email' => 'required|email|max:255|unique:users,id,'.$user->id,

    ]);

            

    $user->lastname = $request->lastname;
    $user->firstname = $request->firstname;
    $user->phone = $request->phone;
    $user->email = $request->email;   
    $user->facebook = $request->facebook; 
    $user->twitter = $request->twitter; 
    $user->linkedin = $request->linkedin;  
    $user->github = $request->github;    
    $user->web = $request->web; 
    $user->biography = $request->biography;

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

        $user->show_facebook = $request->show_facebook;
        $user->show_twitter = $request->show_twitter;
        $user->show_linkedin = $request->show_linkedin;
        $user->show_github = $request->show_github;

        $user->show_cv = $request->show_cv;
        $user->show_username = $request->show_username;
        $user->show_web = $request->show_web;

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

        if($user->avatar != 'images/avatar/default.jpg')
        {
            $destinationPath = public_path('images/avatar/');
            File::delete($destinationPath.$user->avatar);
        }
        $user->delete();

        return redirect('/');

    }

    public function remove_cv(Request $request){

        $user = Auth::user();

        if($user->cv != null)
        {
            $destinationPath = public_path('documents/cv/');
            File::delete($destinationPath.$user->cv);
        }
        $user->cv = null;
        $user->save();

        return redirect('/profile');

    }

    public function reply_contact_user(Request $request){

        $contacts = DB::table('contacts')->where('id', '=', $request->route('id'))->first();

        if($contacts->status == 0)
        {

            DB::table('contacts_replies')->insert([
                'support_id' => $contacts->support_id,
                'user_id' => $contacts->reply_id,
                'reply_id' => Auth::user()->id,
                'content' => $request->content,
                'created_at' => Carbon::now('Europe/Paris')
            ]);

            return redirect('profile')->with('success','Vous avez répondu au ticket n°' . $contacts->support_id . '.');

        }else{
            return redirect('profile')->with('success','Le ticket n°' . $contacts->support_id . ' est résolue.');
        }

    }

     /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function resolved_contact_user(Request $request){

        $contacts = DB::table('contacts')->where('id', '=', $request->route('id'))->first();

        if($contacts->status == 0)
        {

            DB::table('contacts')->where('id', '=', $request->route('id'))->where('support_id', $contacts->support_id)->update(array('status' => 1));

            return redirect('profile')->with('success','Le ticket n°' . $contacts->support_id . ' est désormais fermer.');
        
        }else{
            return redirect('profile')->with('success','Vous avez déjà résolue ce ticket n°' . $contacts->support_id . '.');
        }

    }
}
