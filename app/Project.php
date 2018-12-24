<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;

//    public function assignProject()
//    {
//        return $this->hasMany('App\AssignUser', 'project_id');
//    }

    public function assignProject()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }
    public function assignUser()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }
    public function assignTask()
    {
        return $this->hasMany('App\AssignTask', 'id');
    }

    public $fillable = [];
}
