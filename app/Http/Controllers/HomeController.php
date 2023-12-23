<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\HeroSection;
use App\Models\Layanan;
use App\Models\Pengaturan;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectCategory;

class HomeController extends Controller
{
    public function index()
    {
        $heros = HeroSection::all();
        $projects = Project::all();
        $posts = Post::orderBy('id', 'DESC')->get();
        $services = Layanan::orderBy('id', 'DESC')->get();
        $project_categories = ProjectCategory::all();
        $abouts = About::find(1);
        return view('home.index', compact('heros', 'projects', 'posts', 'services', 'project_categories', 'abouts'));
    }

    public function post()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        $services = Layanan::orderBy('id', 'DESC')->get();
        $abouts = About::find(1);
        return view('home.post.index', compact('posts', 'services', 'abouts'));
    }

    public function post_detail($slug)
    {
        $abouts = About::find(1);
        $post = Post::where('slug', $slug)->first();
        $title = $post->title;
        $services = Layanan::orderBy('id', 'DESC')->get();
        return view('home.post.detail', compact('post', 'title', 'services', 'abouts'));
    }

    public function proyek()
    {
        $projects = Project::orderBy('id', 'DESC')->get();
        $services = Layanan::orderBy('id', 'DESC')->get();
        $abouts = About::find(1);
        return view('home.project.index', compact('projects', 'services', 'abouts'));
    }

    public function tentangKami()
    {
        $abouts = About::find(1);
        $services = Layanan::orderBy('id', 'DESC')->get();
        return view('home.about', compact('abouts', 'services'));
    }

    public function kontak()
    {
        $services = Layanan::orderBy('id', 'DESC')->get();
        $abouts = About::find(1);
        return view('home.kontak', compact('services', 'abouts'));
    }
}
