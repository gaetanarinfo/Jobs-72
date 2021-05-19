<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Http\Request;

class DevisController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $file = $request->file('doc');

        if($file)
        {
            $this->validate($request,[
                'society' => 'max:255|required',
                'socialD' => 'max:255|required',
                'name' => 'max:255|required',
                'phone' => 'max:255|required',
                'email' => 'max:255|required',
                'salarie' => 'max:255|required',
                'typePoste' => 'max:255|required',
                'adress' => 'max:255|required',
                'city' => 'max:255|required',
                'cp' => 'max:255|required',
                'pays' => 'max:255|required',
                'content' => 'max:255|required',
                'doc' => 'max:2048'
            ]);

            $destinationPath = 'admin/documents/';
            $file->move($destinationPath,$file->getClientOriginalName());

            DB::table('devis')->insert([
                'society' => $request->society,
                'socialD' => $request->socialD,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'salarie' => $request->salarie,
                'typePoste' => $request->typePoste,
                'adress' => $request->adress,
                'city' => $request->city,
                'cp' => $request->cp,
                'pays' => $request->pays,
                'content' => $request->content,
                'doc' => $file->getClientOriginalName(),
                'created_at' => Carbon::now('Europe/Paris')
            ]);
        }else{

            $this->validate($request,[
                'society' => 'max:255|required',
                'socialD' => 'max:255|required',
                'name' => 'max:255|required',
                'phone' => 'max:255|required',
                'email' => 'max:255|required',
                'salarie' => 'max:255|required',
                'typePoste' => 'max:255|required',
                'adress' => 'max:255|required',
                'city' => 'max:255|required',
                'cp' => 'max:255|required',
                'pays' => 'max:255|required',
                'content' => 'max:255|required',
            ]);

            DB::table('devis')->insert([
                'society' => $request->society,
                'socialD' => $request->socialD,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'salarie' => $request->salarie,
                'typePoste' => $request->typePoste,
                'adress' => $request->adress,
                'city' => $request->city,
                'cp' => $request->cp,
                'pays' => $request->pays,
                'content' => $request->content,
                'created_at' => Carbon::now('Europe/Paris')
            ]);

        }

        return redirect('/')->with('success','Votre devis à été envoyer.');
    }
}