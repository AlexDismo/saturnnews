<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        return view('posts.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        return redirect()->route('posts.index');
    }
    public function getPostsByTag(Request $request)
    {
        $tag = $request->tag;
        $page = $request->page;

        if ($tag === 'AllTags') {
            $posts = Post::paginate(6, ['*'], 'page', $page);
        } elseif ($tag === 'NoTags') {
            $posts = Post::doesntHave('tags')->paginate(6, ['*'], 'page', $page);
        } else {
            $tag = Tag::where('name', $tag)->first();

            if (!$tag) {
                return response()->json(['error' => 'Tag not found'], 404);
            }

            $posts = $tag->posts()->paginate(6, ['*'], 'page', $page);
        }

        if ($posts->isEmpty()) {
            return response()->json(['error' => 'No posts found for this tag'], 404);
        }

        $views = '';
        foreach ($posts as $post) {
            $views .= view('components.main.post_card', ['post' => $post])->render();
        }
        return response()->json([
            'html' => $views,
            'last_page' => $posts->lastPage()
        ]);
    }
}
