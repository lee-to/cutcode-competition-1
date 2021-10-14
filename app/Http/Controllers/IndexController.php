<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        // $posts = Post::all()->sortByDesc(function($post) {
        //     return $post->ratings->avg('rating');
        // })->take(100);

        $posts = Post::query()
            ->selectRaw('posts.title as title')
            ->selectRaw('posts.created_at as created')
            ->selectRaw('categories.title as category')
            ->selectRaw('(select count(ratings.id) as rc from ratings where post_id = posts.id) as cnt')
            ->selectRaw('(select avg(ratings.rating) as rc from ratings where post_id = posts.id) as rat')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->orderBy('rat', 'desc')
            ->limit(100)
            ->get();

        return view('welcome', [
            'posts' => $posts
        ]);
    }
}