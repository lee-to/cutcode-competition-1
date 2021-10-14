<?php

namespace App\Http\Controllers;

use App\Models\Post;

class IndexController extends Controller
{
    public function index()
    {
        // 1101 queries, 36 mb, 13.96 ms, 11100 models
//        $posts = Post::all()->sortByDesc(function($post) {
//            return $post->ratings->avg('rating');
//        })->take(100);
        $posts = Post::select(['category_id', 'title', 'created_at'])
            ->with(['category' => function($query) {
                $query->select(['id', 'title']);
            }])
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->orderByDesc('ratings_avg_rating')
            ->take(100)
            ->get();
//        dd($posts->first());

        return view('welcome', compact('posts'));
    }
}
