<?php

namespace App\Http\Controllers;

use App\Models\Post;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortByDesc(function($post) {
            return $post->ratings->avg('rating');
        })->take(100);

        return view('welcome', [
            'posts' => $posts
        ]);
    }
}