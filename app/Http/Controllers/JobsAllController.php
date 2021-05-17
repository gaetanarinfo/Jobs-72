<?php

namespace App\Http\Controllers;

use App\Models\Jobs;

class JobsAllController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $jobsAll = Jobs::select('jobs.*')
            ->where('jobs.active', '=', 1)
            ->paginate(24);

        return view('jobs', [
            'jobsAll' => $jobsAll
        ]);
    }
}