<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Post;
use App\Models\Project;
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

    public function proyek()
    {
        $projects = Project::orderBy('id', 'DESC')->get();
        return view('home.project.index', compact('projects'));
    }

    public function about()
    {
        $about = About::find(1);
        return view('home.about', compact('about'));
    }
}
