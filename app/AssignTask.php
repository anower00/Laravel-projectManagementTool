<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignTask extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;

//    public function assignUser()
//    {
//        return $this->belongsTo('App\Project', 'user_id');
//    }
//    public function assignProject()
//    {
//        return $this->belongsTo('App\Users', 'project_id');
//    }

    public function assignTask()
    {
        return $this->BelongsTo('App\Users', 'id');
    }
    public function project()
    {
        return $this->BelongsTo('App\Project', 'id');
    }
    protected $fillable = [
        'taskName', 'project_id', 'user_id', 'description', 'dueDate', 'priority',
    ];
    protected $dates = ['deleted_at'];
}
