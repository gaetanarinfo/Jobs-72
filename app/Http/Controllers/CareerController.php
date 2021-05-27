<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Careers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id, $slug)
    {

        $titleSlug = strtolower(str_replace(' ', '-', $slug));

        $cat2 = DB::table('careers')->where('id', $id)->get();

        if($cat2->count() == 0)
        {
            return redirect('/');
        }else{

            $cat = DB::table('careers')->where('id', $id)->first();

            if($cat->active == 1)
            {
                $cat = DB::table('careers')->where('id', $id)->first();

                $publicite = DB::table('jobs_pub')->first();

                return view('career-details', [
                    'career' => Careers::findOrFail($id),
                    'publicite' => $publicite
                ]);
            }else{
                return redirect('/');
            }
        }
    }
}