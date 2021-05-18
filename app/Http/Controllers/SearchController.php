<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $q = $request->input('q');

        $posts = Jobs::where('title', 'like', '%' . $q . '%')->orderBy('created_at', 'desc')->paginate(12);
        
        return response()->json([
            'jobs' => $posts
        ]);
    }

    public function order_tel(Request $request): JsonResponse
    {
        $q = $request->input('q');

        $posts = Jobs::where('teletravail', '=', $q)->orderBy('created_at', 'desc')->paginate(12);

        return response()->json([
            'jobs' => $posts
        ]);
    }
}