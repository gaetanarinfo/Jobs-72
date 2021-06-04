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

class LinkedinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleLinkedinCallback()
    {
        try {
    
            $user = Socialite::driver('linkedin')->user();
     
            $finduser = User::where('email', $user->email)->where('linkedin_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/profile')->with('success', 'Connexion réussi avec votre compte Linkedin.');
     
            }else{

                $newUser = User::create([
                    'username' => $user->first_name . '_' . $user->last_name . '_' . uniqid(),
                    'lastname' => $user->last_name,
                    'firstname' => $user->first_name,
                    'avatar' => $user->avatar ?? 'images/avatar/default.jpg',
                    'email' => $user->email,
                    'email_verified_at' => Carbon::now('Europe/Paris'),
                    'linkedin_id'=> $user->id,
                    'password' => Hash::make('tesvhuhuhruh87751122'),
                ]);

                Auth::login($newUser);

                return redirect('/profile')->with('success', 'Merci de votre inscription, connexion réussi avec votre compte Linkedin.');
     
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}