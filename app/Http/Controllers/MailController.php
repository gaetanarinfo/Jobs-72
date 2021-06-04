<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function create(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'g-recaptcha-response' => 'required|captcha'
    
        ]);
        
        Mail::send('vendor.notifications.mail', ['name' => $request->name, 'email' => $request->email, 'subject' => $request->subject, 'content' => $request->content], function($message) use ($request){
            $message->to('support@jobs-72.com', 'Jobs-72')
            ->subject('Demande de contact - ' . $request->name . ''); 
        });

        return redirect(route('home'))->with('success', 'Votre message à été envoyé.');
    }

}