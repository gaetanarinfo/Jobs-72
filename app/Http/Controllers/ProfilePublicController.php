<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

class ProfilePublicController extends Controller
{
    /**
     * Show the application dashboard.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($username)
    {

        if(Auth::user()->username != $username)
        {
            if(Auth::user()->roles != 'ROLES_RECRUTER' && Auth::user()->roles != 'ROLES_ADMIN') {
                return redirect(route('home'));
            }
        }

        $user = DB::table('users')->where('username', '=', $username)->first();

        return view('user.profile-public', [
            'user' => $user
        ]);

    }
}