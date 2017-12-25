<?php

namespace App;

use App\Model;
use App\Like;

class Post extends Model {

    //Имя пользователя для отображения в постах
    public function getUsername($userid) {
        //Получаем имя
        $user = User::where('id', $userid)->value('name');
        return $user;
    }

    //Лайкнул ли пользователь этот пост или нет
    public function getLikes($postid) {
        //Если лайкал то будет айди лайка если нет то будет NULL
        $likeId = Like::where(['post_id' => $postid, 'user_id' => auth()->id()])->value('id');
        return $likeId;
    }

    //Колличество лайков для поста
    public function getCountPostLikes($postid) {
        //Получаем все записи с лайками поста
        $count = Like::where('post_id', $postid)->get();
        //Считаем сколько же их набежало
        return $count->count();
    }

}
