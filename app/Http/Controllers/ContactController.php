<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $file = $request->file('doc');

        if($file)
        {
            $this->validate($request,[
                'content' => 'max:255|required',
                'doc' => 'max:2048'
            ]);

            $destinationPath = 'admin/contact/documents/';
            $file->move($destinationPath,$file->getClientOriginalName());

            DB::table('contacts')->insert([
                'user_id' => Auth::user()->id,
                'support_id' => uniqid(),
                'content' => $request->content,
                'doc' => $file->getClientOriginalName(),
                'created_at' => Carbon::now('Europe/Paris')
            ]);
        }else{

            $this->validate($request,[
                'content' => 'max:255|required',
            ]);

            DB::table('contacts')->insert([
                'user_id' => Auth::user()->id,
                'support_id' => uniqid(),
                'content' => $request->content,
                'created_at' => Carbon::now('Europe/Paris')
            ]);

        }

        return redirect('/profile')->with('success','Votre demande de contact à été envoyer.');
    }

     /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete_contact($id){

        $contacts = DB::table('contacts')->where('id', '=', $id)->first();

        if($contacts->doc != null)
        {
            $destinationPath = public_path('admin/contact/document/');
            File::delete($destinationPath.$contacts->doc);
        }

        DB::table('contacts')->where('id', '=', $id)->delete();

        return redirect('administration')->with('success','Le ticket n°' . $contacts->support_id . ' à été supprimer');

    }

    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function resolved_contact(Request $request){

        $contacts = DB::table('contacts')->where('id', '=', $request->route('id'))->first();
        $user = DB::table('users')->where('id', $contacts->user_id)->first();

        //  Send mail to admin
        Mail::send('vendor.notifications.contacts', ['lastname' => $user->lastname, 'firstname' => $user->firstname, 'contacts' => $contacts], function($message) use ($request){
            $contacts = DB::table('contacts')->where('id', '=', $request->route('id'))->first();
            $user = DB::table('users')->where('id', $contacts->user_id)->first();
            $message->to($user->email, $user->username)
            ->subject('Clôture de votre demande ticket n°' . $contacts->support_id . ''); 
        });

        DB::table('contacts')->where('id', '=', $request->route('id'))->update(array('status' => 1));

        return redirect('administration')->with('success','Le ticket n°' . $contacts->support_id . ' est désormais fermer.');

    }

    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reply_contact(Request $request){

        $contacts = DB::table('contacts')->where('id', '=', $request->route('id'))->first();

        $user = DB::table('users')->where('id', $contacts->user_id)->first();

        //  Send mail to admin
        Mail::send('vendor.notifications.reply', ['lastname' => $user->lastname, 'firstname' => $user->firstname, 'contacts' => $contacts, 'content' => $request->content], function($message) use ($request){
            $contacts = DB::table('contacts')->where('id', '=', $request->route('id'))->first();
            $user = DB::table('users')->where('id', $contacts->user_id)->first();
            $message->to($user->email, $user->username)
            ->subject('Réponse concernant votre ticket n°' . $contacts->support_id . ''); 
        });

        DB::table('contacts_replies')->insert([
            'support_id' => $contacts->support_id,
            'user_id' => $contacts->user_id,
            'reply_id' => Auth::user()->id,
            'content' => $request->content,
            'created_at' => Carbon::now('Europe/Paris')
        ]);

        return redirect('administration')->with('success','Vous avez répondu au ticket n°' . $contacts->support_id . '.');

    }
}