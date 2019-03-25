<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['github_id','created_at','updated_at','image']; // 追記したところ
}
