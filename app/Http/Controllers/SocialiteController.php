<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Socialite;

use App\Models\User;

class SocialiteController extends Controller
{

    protected $providers = [ "google", "facebook", "github" ];

    # La vue pour les liens vers les providers
    public function loginRegister () {
    	return redirect(route('login'));
    }

    # redirection vers le provider
    public function redirect (Request $request) {

        $provider = $request->provider;

        // On vérifie si le provider est autorisé
        if (in_array($provider, $this->providers)) {
            return Socialite::driver($provider)->redirect(); // On redirige vers le provider
        }
        abort(404); // Si le provider n'est pas autorisé
    }

    // Callback du provider
    public function callback (Request $request) {

        $provider = $request->provider;

        if (in_array($provider, $this->providers)) {

        	// Les informations provenant du provider
            $data = Socialite::driver($request->provider)->user();

            # Social login - register

            $email = $data->getEmail(); // L'adresse email
            $username = $data->getUserName(); // le nom

            # 1. On récupère l'utilisateur à partir de l'adresse email
            $user = User::where("email", $email)->first();

            # 2. Si l'utilisateur existe
            if (isset($user)) {

                // Mise à jour des informations de l'utilisateur
                $user->username = $username;
                $user->save();

            # 3. Si l'utilisateur n'existe pas, on l'enregistre
            } else {
                
                // Enregistrement de l'utilisateur
                $user = User::create([
                    'username' => $username,
                    'email' => $email,
                    'password' => bcrypt("zoecloenihelbizard") // On attribue un mot de passe
                ]);
            }

            # 4. On connecte l'utilisateur
            auth()->login($user);

            # 5. On redirige l'utilisateur vers /home
            if (auth()->check()) return redirect(route('home'));

         }
         abort(404);
    }

}