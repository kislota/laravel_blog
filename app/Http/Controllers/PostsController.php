<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller {

    /*
     * Редирект с главной просто для удобства
     */
    public function redirect() {
        return redirect('/post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //Получаем все посты
        $posts = Post::all();
        //Передаём в вид объект постов
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //Выводим шаблон для новой записи
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {//Получаем объек с данными которые нам пришли
        //Проверяем пришла ли картинка
        if ($request->file('img')) {
            //Если пришла то сохраняем её на диск /storage/app/public/images
            //и генирируем рандомное имя и сохраняем его в $imgUrl
            $imgUrl = $request->file('img')->store(
                    '', 'images'
            );
        } else {
            //Если ничего не пришло нам то сохраняем пустое место
            $imgUrl = '';
        }
        //Сохраняем в базу данные которые нам пришли
        Post::create([
            'head' => $request->head,//Заголовок
            'text' => $request->text,//Текст поста
            'author' => $request->author,//Имя автора
            'img' => $imgUrl,//Название картинки
        ]);
        //Редирект на главную
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {//По ID поста выбираем нужный пост
        //Отображаем пост и передаём ему все что нашли в базе по этому посту
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {//Получаем данные поста по ID для редактирования
        //Отображаем вид для редактирования и передаём туда всё что нашли
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Получаем то что нам отправили и ID поста который надо изменить
    public function update(Request $request, Post $post) {
        //Проверяем поменялась ли картинка на новую
        if ($request->file('img_new')) {
            //Если поменялась то сохраняем её на диск и записываем новое имя
            $imgUrl = $request->file('img_new')->store(
                    '', 'images'
            );
            //А старую удаляем за ненадобностью и что бы не засорять диск
            Storage::disk('images')->delete($post->img);
        } else {
            //Если картинки новой не было перезаписываем старое имя картинки
            $imgUrl = $request->img;
        }
        //Обновляем пост
        $post->update([
            'head' => $request->head,//Заголовок
            'text' => $request->text,//Текст
            'author' => $request->author,//Автор
            'img' => $imgUrl,//Картинка новая или старая
        ]);
        //Редирект на главную
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {//Удаляем пост
        //Из полученіх данных о посте берём имя картинки и удаляем сначала её
        Storage::disk('images')->delete($post->img);
        //И удаляем затем запись из базы с данным постом
        $post->delete();
        //Редирект на главную
        return redirect('/');
    }

}
