<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;
use App\User;

class LikesController extends Controller {

    //Лайк
    public function store(Request $request, Like $like) {
        //Добавляем новій лайк
        Like::create([
            'post_id' => $request->post_id, //Пост который лайкнули
            'user_id' => auth()->id(), //ID Пользователя который лайкнул
        ]);
        //Если это первый лайк то вносим ID пользователя в таблицу
        $like->oneLike($request->post_id);
        return back();
    }

    //Анлайк
    public function destroy(Like $like) {
        //Удаляем запись о первом лайке
        $like->oneLike($like->post_id);
        //Удаляем сам лайк
        $like->delete();
        //Получаем следующего пользователя который лайнул этот пост
        $like->nextLike($like->post_id);
        //Назад
        return back();
    }

}