<?php

namespace App\Http\Controllers;

use App\Models\Careers;
use App\Models\Jobs;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latestNews = News::where('active', 1)->orderBy('created_at', 'desc')->limit('6')->get();
        $latestNewsCount = DB::table('news')->count();
        $latestJobs = Jobs::where('active', 1)->orderBy('created_at', 'desc')->limit('6')->get();
        $latestJobsCount = DB::table('jobs')->count();
        $latestCareers = Careers::where('active', 1)->orderBy('created_at', 'desc')->limit('6')->get();

        return view('home', [
            'latestJobs' => $latestJobs,
            'latestNews' => $latestNews,
            'latestCareers' => $latestCareers,
            'latestNewsCount' => $latestNewsCount,
            'latestJobsCount' => $latestJobsCount
        ]);
    }

    public function language(String $locale)
    {
        $locale = in_array($locale, config('app.locales')) ? $locale : config('app.fallback_locale');
        session(['locale' => $locale]);
        return back();
    }
}
