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
        Mail::send('vendor.notifications.mail', ['name' => $request->name, 'email' => $request->email, 'subject' => $request->subject, 'content' => $request->content], function($message) use ($request){
            $message->to('support@jobs-72.com', 'Jobs-72')
            ->subject('Demande de contact - ' . $request->name . ''); 
        });

        return redirect('contact')->with('success', 'Votre message à été envoyé.');
    }

}