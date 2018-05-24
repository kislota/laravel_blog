<?php

namespace App\Filters;

use App\User;
use App\Filters\Filters;

class PostFilters extends Filters{

    protected $filters = ['name'];


    protected function name($username) {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

}
