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

class GitHubController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGitHubCallback()
    {
        try {
    
            $user = Socialite::driver('github')->user();
     
            $finduser = User::where('email', $user->email)->where('github_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/profile')->with('success', 'Connexion réussi avec votre compte Github.');
     
            }else{
                    $newUser = User::create([
                        'username' => $user->user["login"],
                        'avatar' => $user->user["avatar_url"],
                        'email' => $user->user["login"] . '_' . $user->user["name"] . '@jobs-72.com',
                        'email_verified_at' => Carbon::now('Europe/Paris'),
                        'github_id'=> $user->id,
                        'biography' => $user->user['bio'],
                        'password' => Hash::make('tesvhuhuhruh87751122')
                    ]);

                    Auth::login($newUser);

                    return redirect('/profile')->with('success', 'Merci de votre inscription, connexion réussi avec votre compte Github.');
     
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}