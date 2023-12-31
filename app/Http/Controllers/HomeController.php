<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Pengaturan;
use App\Models\Post;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'DESC')->take(3)->get();
        $hero = Pengaturan::find(1);
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('home.index', compact('projects', 'hero', 'posts'));
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

    public function tentangKami()
    {
        $about = About::find(1);
        return view('home.about', compact('about'));
    }
}
