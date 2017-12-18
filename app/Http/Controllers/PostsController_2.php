<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller {
    /*
     * Все посты
     */

    public function index() {

        //Получаем все посты
        $posts = Post::all();
        //Передаём в вид объект постов
        return view('post.index', compact('posts'));
    }

    /*
     * Просмотр одного поста
     */

    public function show(Post $post) {//По ID поста выбираем нужный пост
        //Передаём в вид объект поста
        return view('post.show', compact('post'));
    }

    /*
     * Создание поста
     */

    public function create() {

        return view('post.create');
    }

    public function store(Request $request) {
        if ($request->file('img')) {
            $imgUrl = $request->file('img')->store(
                    '', 'images'
            );
        } else {
            $imgUrl = '';
        }

        $post = Post::create([
                    'head' => $request->head,
                    'text' => $request->text,
                    'author' => $request->author,
                    'img' => $imgUrl,
        ]);

        return response()->json($post, 201);
    }

    /*
     * Изменение поста
     */

    public function edit(Post $post) {

        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {

        $post->update($request->all());

        return response()->json($post, 200);
    }

    /*
     * Удаление поста
     */

    public function del(Post $post) {

        $post->delete();

        return redirect('/');
    }

    public function delete(Post $post) {

        $post->delete();

        return response()->json(null, 204);
    }

}
