<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Newsletter;
 
class NewsletterController extends Controller
{
    public function index()
    {
        return view('newsletter');
    }
 
    public function store(Request $request)
    {
        
        if ( ! Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribePending($request->email);
            return redirect('newsletter')->with('success', 'Merci pour l\'abonnement');
        }
        return redirect('newsletter')->with('error', 'Désoler ! Vous êtes déjà abonné');
            
    }
}