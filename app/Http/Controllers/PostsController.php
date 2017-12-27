<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Filter;
use App\Like;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller {

    //Разрешаем не зарегистрированным пользователям
    //только просмотривать и читать посты
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }

    protected function redirect() {
        return redirect('/posts');
    }

    public function index() {
        //Получаем все посты
        $posts = Post::all();
        //Передаём в вид объект постов
        return view('posts.index', compact('posts'));
    }

    public function create() {
        //Выводим шаблон для новой записи
        return view('posts.create');
    }
    
    //Получаем объек с данными которые нам пришли
    public function store(Request $request) {
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
        //Фильтруем введёный пользователем текст
        $text = $this->getText($request->text);
        //Сохраняем в базу данные которые нам пришли
        Post::create([
            'head' => $request->head, //Заголовок
            'text' => $text, //Текст поста
            'author' => auth()->id(), //ID Автора
            'img' => $imgUrl, //Название картинки
            'user_id_like' => '',
        ]);
        //Редирект на главную
        return $this->redirect();
    }

    //По ID поста выбираем нужный пост
    public function show(Post $post) {
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
        //Фильтруем введёный пользователем текст
        $text = $this->getText($request->text);
        //Обновляем пост
        $post->update([
            'head' => $request->head, //Заголовок
            'text' => $text, //Текст
            'author' => $request->author, //Автор
            'img' => $imgUrl, //Картинка новая или старая
        ]);
        //Редирект на главную
        return $this->redirect();
    }

    //Удаляем пост
    public function destroy(Post $post) {
        //Из полученіх данных о посте берём имя картинки и удаляем сначала её
        Storage::disk('images')->delete($post->img);
        //Удаляем лайки этого поста
        Like::where('post_id', $post->id)->delete();
        //И удаляем затем запись из базы с данным постом
        $post->delete();
        //Редирект на главную
        return $this->redirect();
    }

    //Получаем текст поста
    protected function getText($text) {
        //Получаем слова которые запрещены
        $filters = Filter::all();
        //Перебираем слова ищем есть ли запрещённые
        foreach ($filters as $filter) {
            //Выполняем замены если нашлись такие слова
            $text = preg_replace('/' . $filter->text . '/usi', '$1' . $this->getReplace($filter->text) . '$2', $text);
        }
        //Отдаём обработаный текст
        return $text;
    }
    
    //Передаём запрещённое слово для получения слова для замены если такое найдём
    protected function getReplace($str) {
        //получаем первый символ
        $strOne = mb_substr($str, 0,1);
        //Получаем последний символ
        $strLast = mb_substr($str, mb_strlen($str)-1);
        //Меняем остальные символы на звёздочки
        $str = str_repeat('*', mb_strlen($str) - 2);
        //Соединяем всё до кучки
        return $strOne . $str . $strLast;
    }

}
