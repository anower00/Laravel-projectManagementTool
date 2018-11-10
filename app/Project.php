<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'project_id';
    public $timestamps = false;

//    public function assignProject()
//    {
//        return $this->hasMany('App\AssignUser', 'project_id');
//    }

    public function assignProject()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }
    public function assignUser()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }
    public $fillable = [];
}
