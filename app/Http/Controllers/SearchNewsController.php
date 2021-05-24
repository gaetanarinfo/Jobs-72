<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SearchNewsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $search_input = $request->input('search_input');

        $posts = News::where('title', 'like', '%' . $search_input . '%')->orderBy('created_at', 'desc')->paginate(24);
        
        return response()->json([
            'news' => $posts
        ]);
    }

    public function search_cat(Request $request): JsonResponse
    {
        $search_cat = $request->input('search_cat');

        $posts = News::where('category', 'like', '%' . $search_cat . '%')->orderBy('created_at', 'desc')->paginate(24);
        
        return response()->json([
            'news' => $posts
        ]);
    }
}