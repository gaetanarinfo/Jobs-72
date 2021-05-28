<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class TransactionsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();

        if($user->roles != 'ROLES_RECRUTER' && $user->roles != 'ROLES_ADMIN')
        {
            return redirect(route('home'));
        }
    }

    public function add_credits_10(Request $request, $token)
    {

        $user = Auth::user();

        $tokenId = $request->session()->token();


        if($token == $tokenId)
        {
            DB::table('users')->where('id', '=', $user->id)->increment('credits', 10);

            DB::table('users_transactions')->insert([
                'user_id' => $user->id,
                'title' => "Pack de crédits - 10 euros - Déposer 10 offres",
                'price' => 10,
                'transaction' => uniqid(),
                'status' => 1,
                'created_at' => Carbon::now('Europe/Paris')
            ]);

            return redirect('recruter')->with('success','Vous avez été crédité de 10 euros.');
        }
    
    }

    public function add_credits_26(Request $request, $token)
    {

        $user = Auth::user();

        $tokenId = $request->session()->token();


        if($token == $tokenId)
        {
            DB::table('users')->where('id', '=', $user->id)->increment('credits', 26);

            DB::table('users_transactions')->insert([
                'user_id' => $user->id,
                'title' => "Pack de crédits - 26 euros - Déposer 26 offres",
                'price' => 26,
                'transaction' => uniqid(),
                'status' => 1,
                'created_at' => Carbon::now('Europe/Paris')
            ]);

            return redirect('recruter')->with('success','Vous avez été crédité de 26 euros.');
        }
    
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function error_credits()
    {
        return redirect('recruter')->with('error','Désolé, une erreur est survenue');
    }
}