<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function category($cat) {

    $countCat = DB::table('jobs')->where('category', $cat)->count();

    return $countCat;
}

function user($username) {

    $user = User::where('username', '=', $username)->get();
    
    return $user;
}

function userId($id) {

    $user = User::where('id', '=', $id)->get();
    
    return $user;
}

function careerCat($category) {

    $label = null;

    switch ($category) {
        case 'CV et lettre de motivation':
            $label = 'bg-info';
            break;
        
        case 'Entretien d’embauche':
            $label = 'bg-warning';
            break;

        case 'Jeunes Diplômés':
            $label = 'bg-success';
            break;
                
        case 'Seniors':
            $label = 'bg-danger';
            break;

        case 'Vie en entreprise':
            $label = 'bg-secondary';
            break;
    }

    return $label;
}

function careerImg($category) {

    $image = null;

    switch ($category) {
        case 'CV et lettre de motivation':
            $image = 'Career-Advice-Position1@2x-01.webp';
            break;
        
        case 'Entretien d’embauche':
            $image = 'Career-Advice-Position2@2x-01.webp';
            break;

        case 'Jeunes Diplômés':
            $image = 'Career-Advice-Position3@2x-01.webp';
            break;
                
        case 'Seniors':
            $image = 'Career-Advice-Position4@2x-01.webp';
            break;

        case 'Vie en entreprise':
            $image = 'Career-Advice-Position5@2x-01.webp';
            break;
    }

    return $image;
}