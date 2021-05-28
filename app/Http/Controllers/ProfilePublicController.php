<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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

        $user = DB::table('users')->where('username', '=', $username)->first();

        return view('user.profile-public', [
            'user' => $user
        ]);

    }
}