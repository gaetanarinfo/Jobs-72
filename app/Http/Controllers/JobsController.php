<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id, $author)
    {
        $jobsAuthor2 = User::where('username', '=', $author)->firstOrFail();
        $cat = DB::table('jobs')->where('id', $id)->first();
        $latestJobs = Jobs::where('active', 1)->where('category', $cat->category)->orderBy('created_at', 'desc')->limit('3')->get();

        return view('jobs-details', [
            'jobs' => Jobs::findOrFail($id),
            'userJobs' => $jobsAuthor2,
            'latestJobs' => $latestJobs
        ]);
    }
}