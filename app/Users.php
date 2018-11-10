<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function assignProject()
    {
        return $this->hasMany('App\AssignUser', 'user_id');
    }
    public $fillable = [];
}

