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

class TwitterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleTwitterCallback()
    {
        try {
    
            $user = Socialite::driver('twitter')->user();
     
            $finduser = User::where('email', $user->email)->where('twitter_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/profile');
     
            }else{

                    $newUser = User::create([
                        'username' => $user->nickname,
                        'avatar' => $user->user["profile_image_url_https"],
                        'email' => $user->nickname . '_' . $user->id . '@jobs-72.com',
                        'email_verified_at' => Carbon::now('Europe/Paris'),
                        'twitter_id' => $user->id,
                        'biography' => $user->user['description'],
                        'password' => Hash::make('tesvhuhuhruh87751122'),
                    ]);

                    Auth::login($newUser);

                    return redirect('/profile')->with('success', 'Merci de votre inscription, connexion réussi avec votre compte Twitter.');
     
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}