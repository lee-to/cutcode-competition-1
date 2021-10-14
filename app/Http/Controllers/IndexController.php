<?php

namespace App\Http\Controllers;

use App\Models\Post;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::select(['category_id', 'title', 'created_at'])
            ->with(['category' => function($query) {
                $query->select(['id', 'title']);
            }])
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->orderByDesc('ratings_avg_rating')
            ->take(100)
            ->get();

        return view('welcome', compact('posts'));
    }
}
