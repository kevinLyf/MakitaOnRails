<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        $postsOrganized = [];
        foreach ($posts as $post) {
            $year = $post->created_at->format('Y');
            $month = $post->created_at->format('F');
            $postsOrganized[$year][$month][] = $post;
        }

        return view('welcome', compact('postsOrganized'));
    }


    public function create(): View
    {
        return view('posts.create');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function store(Request $request): RedirectResponse
    {
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        $tags = $request->tags;

        $tags = array_filter($tags);
        $tags = array_values($tags);
        $tags = explode(' ', $tags[0]);
        $post->tags = $tags;

        $post->save();

        return redirect('/');
    }

    public function tag($tag): View
    {
        $posts = Post::whereJsonContains('tags', $tag)->orderBy('created_at', 'desc')->get();

        $postsOrganized = [];
        foreach ($posts as $post) {
            $year = $post->created_at->format('Y');
            $month = $post->created_at->format('F');
            $postsOrganized[$year][$month][] = $post;
        }

        return view('welcome', ['postsOrganized' => $postsOrganized, 'tag' => $tag]);
    }
}
