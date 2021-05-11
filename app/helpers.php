<?php

use Illuminate\Support\Facades\DB;

function category($cat) {

    $countCat = DB::table('jobs')->where('category', $cat)->count();

    return $countCat;
}