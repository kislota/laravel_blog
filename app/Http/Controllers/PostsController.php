<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\Comment;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller {

    //Разрешаем не зарегистрированным пользователям
    //только просмотривать и читать посты
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() {
        //Получаем все посты
        $posts = Post::orderBy('created_at', 'DESC')->get();
        //Передаём в вид объект постов
        return view('posts.index', compact('posts'));
    }

    public function create() {
        //Выводим шаблон для новой записи
        return view('posts.create');
    }

    //Получаем объек с данными которые нам пришли
    public function store(Request $request, Post $post) {
        //Сохраняем в базу данные которые нам пришли
        Post::create([
            'head' => $post->getText($request->head), //Заголовок
            'text' => $post->getText($request->text), //Текст поста
            'author' => auth()->id(), //ID Автора
            'img' => $post->saveImg($request->file('img')), //Название картинки
            'user_id_like' => '',
        ]);
        //Редирект на главную
        return $post->redirect();
    }

    //По ID поста выбираем нужный пост
    public function show(Comment $comments, Post $post) {
        $post->comments = $post->getComments($post);
//        dd($post->comments);
        //Отображаем пост и передаём ему все что нашли в базе по этому посту
        return view('posts.show', compact('post'));
    }

    //Получаем данные поста по ID для редактирования
    public function edit(Post $post) {
        //Отображаем вид для редактирования и передаём туда всё что нашли
        return view('posts.edit', compact('post'));
    }

    //Получаем то что нам отправили и ID поста который надо изменить
    public function update(Request $request, Post $post) {

        //Обновляем пост
        $post->update([
            'head' => $post->getText($request->head), //Заголовок
            'text' => $post->getText($request->text), //Текст
            'author' => $request->author, //Автор
            'img' => $post->saveImg($request->file('img_new'), $request->file('img')), //Картинка новая или старая
        ]);
        //Редирект на главную
        return $post->redirect();
    }

    //Удаляем пост
    public function destroy(Post $post) {
        //Из полученіх данных о посте берём имя картинки и удаляем сначала её
        Storage::disk('images')->delete($post->img);
        //Удаляем лайки этого поста
        Like::where('post_id', $post->id)->delete();
        //Удаляем комменарии
        Comment::where('post_id', $post->id)->delete();
        //И удаляем затем запись из базы с данным постом
        $post->delete();
        //Редирект на главную
        return $post->redirect();
    }

}
