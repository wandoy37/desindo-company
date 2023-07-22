<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $projects = Project::all();
        return view('auth.dashboard.index', compact('posts', 'projects'));
    }
}
