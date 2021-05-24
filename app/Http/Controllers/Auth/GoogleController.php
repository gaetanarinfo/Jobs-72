<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('email', $user->email)->where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/profile')->with('success', 'Connexion réussi avec votre compte Google.');
     
            }else{

                if($user->user['email_verified'] == true)
                {
                    $newUser = User::create([
                        'username' => $user->user["given_name"] . '_' . $user->user["family_name"] . '_' . uniqid(),
                        'lastname' => $user->user["given_name"],
                        'firstname' => $user->user["family_name"],
                        'avatar' => $user->user["picture"],
                        'email' => $user->email,
                        'email_verified_at' => Carbon::now('Europe/Paris'),
                        'google_id'=> $user->id,
                        'password' => Hash::make('tesvhuhuhruh87751122'),
                    ]);

                    Auth::login($newUser);

                    return redirect('/profile')->with('success', 'Merci de votre inscription, connexion réussi avec votre compte Google.');
                }else{
                    return redirect('/')->with('error', 'Désolé, votre compte Google n\'a pas été validé.');
                }
     
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}