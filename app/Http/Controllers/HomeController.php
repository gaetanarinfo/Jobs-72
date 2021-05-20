<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\News;

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
        $latestJobs = Jobs::where('active', 1)->orderBy('created_at', 'desc')->limit('6')->get();

        return view('home', compact('latestNews'), compact('latestJobs'));
    }

    public function language(String $locale)
    {
        $locale = in_array($locale, config('app.locales')) ? $locale : config('app.fallback_locale');
        session(['locale' => $locale]);
        return back();
    }
}
