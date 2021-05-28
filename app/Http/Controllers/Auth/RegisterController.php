<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Form;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cvdoc' => ['required', 'mimes:pdf', 'max:2048'],
            'recruter' => []
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(Request $request)
    {

        $this->validate($request,[
            'username' => 'max:255|required|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|string|confirmed',
            'cvdoc' => 'mimes:pdf|max:2048'
        ]); 

        $file = $request->file('cvdoc');

        if($request->has('recruter') == true){
            if($file != null)
            {
                $destinationPath = 'documents/cv';
                $file->move($destinationPath,$file->getClientOriginalName());

                User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'cv' => $file->getClientOriginalName(),
                    'roles' => 'ROLES_RECRUTER'
                ]);

                return redirect('')->with('success','Votre compte à été crée.');

            }else{

                User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'roles' => 'ROLES_RECRUTER'
                ]);

                return redirect('')->with('success','Votre compte à été crée.');

            }
            
        }else{
            if($file != null)
            {
                $destinationPath = 'documents/cv';
                $file->move($destinationPath,$file->getClientOriginalName());

                User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'cv' => $file->getClientOriginalName(),
                    'roles' => 'ROLES_USER'
                ]);

                return redirect('')->with('success','Votre compte à été crée.');
            }else{

                User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'roles' => 'ROLES_USER'
                ]);

                return redirect('')->with('success','Votre compte à été crée.');

            }
        }

        return redirect(route(''));

    }

}
