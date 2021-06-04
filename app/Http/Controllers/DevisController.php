<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Http\Request;
use Mail;

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
                'doc' => 'max:2048',
                'g-recaptcha-response' => 'required|captcha'
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
                'g-recaptcha-response' => 'required|captcha'
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

     /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete_devis($id){

        $devis = DB::table('devis')->where('id', '=', $id)->first();

        if($devis->doc != null)
        {
            $destinationPath = public_path('admin/document/');
            File::delete($destinationPath.$devis->doc);
        }

        DB::table('devis')->where('id', '=', $id)->delete();

        return redirect('administration')->with('success','Le devis de ' . $devis->name .' n° ' . $devis->id . ' à été supprimer');

    }

    /**
     * Show the application dashboard.
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reply_devis(Request $request){

        $devisInfo = DB::table('devis')->where('id', '=', $request->route('id'))->first();

        //  Send mail to admin
        Mail::send('vendor.notifications.devis', ['name' => $devisInfo->name], function($message) use ($request){
            $devis = DB::table('devis')->where('id', '=', $request->route('id'))->first();
            $message->to($devis->email, $devis->name)
            ->subject('Réponse concernant votre devis n°' . $devis->id . ''); 
        });

        DB::table('devis')->where('id', '=', $request->route('id'))->update(array('status' => 1));

        return redirect('administration')->with('success','Vous avez répondu au devis de ' . $devisInfo->name .' n° ' . $devisInfo->id . '.');

    }
}