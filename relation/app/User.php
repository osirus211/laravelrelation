<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class User extends Model
{
    Public function Post(){
        return $this->hasOne('App\Post');
    }
}
