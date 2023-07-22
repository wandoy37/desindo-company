<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function post()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('home.post.index', compact('posts'));
    }

    public function post_detail($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $title = $post->title;
        return view('home.post.detail', compact('post', 'title'));
    }
}
