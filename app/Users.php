<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function assignTask()
    {
        return $this->hasMany('App\AssignTask', 'id');
    }
    public $fillable = [];
}

