<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;

class MainController extends Controller
{
    public function index()
    {
        $randomPosts = Post::inRandomOrder()->take(3)->get();
        $posts = Post::paginate(6);

        $tags = Tag::all()->pluck('name')->toArray();

        array_unshift($tags, "All Tags");
        $tags[] = "No Tags";

        return view('main.index', ['randomPosts' => $randomPosts, 'posts' => $posts, 'tags' => $tags]);
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function resetEmailView()
    {
        return view('auth.password.email');
    }
}

