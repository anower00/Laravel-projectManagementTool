<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignPerson extends Model
{
    protected $primaryKey = 'assign_id';
    public $timestamps = false;

//    public function assignUser()
//    {
//        return $this->belongsTo('App\Project', 'user_id');
//    }
//    public function assignProject()
//    {
//        return $this->belongsTo('App\Users', 'project_id');
//    }

    public function assignPeople()
    {
        return $this->hasMany('App\AssignUser', 'project_id');
    }
}
