<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;
use App\User;

class LikesController extends Controller {

    //Лайк
    public function store(Request $request) {
        //Добавляем новій лайк
        Like::create([
            'post_id' => $request->post_id, //Пост который лайкнули
            'user_id' => auth()->id(), //ID Пользователя который лайкнул
        ]);
        //Получаем ID пользователя который лайкнул первым
        $oneLike = $this->checkLike($request->post_id);
        //Если уже кто то лайкнул первым то печалька
        if (!$oneLike) {
            //Если это первый лайк то вносим ID пользователя в таблицу
            $this->postUpdate($request->post_id, auth()->id());
        }
        return back();
    }

    //Анлайк
    public function destroy(Like $like) {
        //Получаем ID пользователя который лайкнул первым
        $oneLike = $this->checkLike($like->post_id) + 0;
        //Если он совпадает с тем кто ставит дизлайк то удаляем его из записи поста
        if ($oneLike == auth()->id()) {
            //Удаляем запись о первом лайке
            $this->postUpdate($like->post_id);
        }
        //Удаляем сам лайк
        $like->delete();

        /*
         * Если надо что бы пользователь который лайкнул вторым к нему перешло
         * право на редактирование раскоментировать этот код
         * Потому что не совсем понятно что делать если он сделал анлайк
         */

        //Получаем следующего пользователя который лайнул этот пост
        //$this->nextLike($like->post_id);
        //Назад
        return back();
    }

    //Есть ли первый лайкнувший
    protected function checkLike($post) {
        //Получаем ID первого лайнувшего
        $post = Post::where('id', $post)->value('user_id_like');
        return $post;
    }

    /*
     * Передаём право редактирования следующему кто лайкнул 
     * после первого если тот удалил свой лайк
     */
    protected function nextLike($postid) {
        //Получаем следующего пользователя если такой есть
        $userid = Like::where('post_id', $postid)->value('user_id');
        //Обновляем пост и передаём право другому редактировать пост
        return $this->postUpdate($postid, $userid);
    }

    //Обновление поста
    protected function postUpdate($postid, $userid = '') {
        if ($userid) {
            $post = Post::where('id', $postid)->update([
                'user_id_like' => $userid,
            ]);
        }
        return true;
    }

}
