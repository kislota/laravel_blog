<?php

namespace App;

use App\Model;
use App\Like;
use App\Filter;
use Illuminate\Support\Facades\Storage;

class Post extends Model {

    public function redirect() {
        return redirect('/posts');
    }

//Сохранение и изменение картинки
    public function saveImg($file, $fileOld = '') {
        if ($file != $fileOld) {
            //Если пришла то сохраняем её на диск /storage/app/public/images
            //и генирируем рандомное имя и сохраняем его в $imgUrl
            $imgUrl = $file->store('', 'images');
            if (Storage::disk('images')->exists($fileOld)) {
                Storage::disk('images')->delete($fileOld);
            }
        } else {
            //Если ничего не пришло нам то сохраняем пустое место
            $imgUrl = $file;
        }
        return $imgUrl;
    }

    //Имя пользователя для отображения в постах
    public function getUsername($userid) {
        //Получаем имя
        $user = User::where('id', $userid)->value('name');
        return $user;
    }

    //Лайкнул ли пользователь этот пост или нет
    public function getLikes($postid) {
        //Если лайкал то будет айди лайка если нет то будет NULL
        return Like::where(['post_id' => $postid, 'user_id' => auth()->id()])->value('id');
    }

    //Колличество лайков для поста
    public function getCountPostLikes($postid) {
        //Получаем все записи с лайками поста
        $count = Like::where('post_id', $postid)->get();
        //Считаем сколько же их набежало
        return $count->count();
    }

    //Получаем текст поста
    public function getText($text) {
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
    public function getReplace($str) {
        //получаем первый символ
        $strOne = mb_substr($str, 0, 1);
        //Получаем последний символ
        $strLast = mb_substr($str, mb_strlen($str) - 1);
        //Меняем остальные символы на звёздочки
        $str = str_repeat('*', mb_strlen($str) - 2);
        //Соединяем всё до кучки
        return $strOne . $str . $strLast;
    }

}
