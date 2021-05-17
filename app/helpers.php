<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;

function category($cat) {

    $countCat = DB::table('jobs')->where('category', $cat)->count();

    return $countCat;
}

function user($username) {

    $user = User::where('username', '=', $username)->get();
    
    return $user;
}