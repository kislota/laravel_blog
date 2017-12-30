<?php

namespace App;

use App\Model;
use App\Post;
use App\User;

class Like extends Model {

    //Есть ли первый лайкнувший
    public function checkLike($post) {
        //Получаем ID первого лайнувшего
        return Post::where('id', $post)->value('user_id_like');
    }

    /*
     * Передаём право редактирования следующему кто лайкнул 
     * после первого если тот удалил свой лайк
     */

    public function nextLike($postid) {
        //Получаем следующего пользователя если такой есть
        $userid = $this->where('post_id', $postid)->value('user_id');
        if(!$userid) {
            $userid = '';
        }
        //Обновляем пост и передаём право другому редактировать пост
        return $this->postUpdate($postid, $userid);
    }

    //Обновление поста
    public function postUpdate($postid, $userid = '') {
        //dd($userid);
        //Обновляем запись поста
        Post::where('id', $postid)->update([
            'user_id_like' => $userid,
        ]);
        return true;
    }

    public function oneLike($postId) {

        //Если уже кто то лайкнул первым то печалька
        if (!$this->checkLike($postId)) {
            //Если это первый лайк то вносим ID пользователя в таблицу
            $this->postUpdate($postId, auth()->id());
        }
        //Если он совпадает с тем кто ставит дизлайк то удаляем его из записи поста
        elseif ($this->checkLike($postId) == auth()->id()) {
            //Удаляем запись о первом лайке
            $this->postUpdate($postId);
        }
    }

}
