<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller {

    public function getIndex() {

        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function view(Post $post) {

        return view('post.view', compact('post'));
    }

    public function edit(Post $post) {

        return view('post.edit', compact('post'));
    }

    public function create(Post $post) {

        return view('post.create', compact('post'));
    }

    public function saveNew() {

        $imgUrl = request()->file('img')->store(
                '', 'images'
        );

        Post::create([
            'head' => request('head'),
            'text' => request('text'),
            'author' => request('author'),
            'img' => $imgUrl,
        ]);

        return redirect('/');
    }

}
