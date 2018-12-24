<?php

namespace App\Http\Controllers;

use App\AssignTask;
use Illuminate\Http\Request;
use App\Project;
use DB;

class ReportController extends Controller
{
    public function allProject()
    {
        $result = Project::all();
        return view('pages.report.index')
            ->with('projects' , $result);
    }

    public function details($id)
    {
        $result = Project::find($id);
        $tasks = AssignTask::where('project_id' , $id)->get();
        $tasks = DB::table('assign_tasks')
            ->select('assign_tasks.id as id','assign_tasks.taskName as task_name','assign_tasks.assigned_by as assigned_by','assign_tasks.dueDate as deadline','assign_tasks.status as status','assign_tasks.priority as priority','users.name as assigned_to')
            ->join('users', 'assign_tasks.user_id', '=', 'users.id')
            ->get();
//        dd($result);

        return view('pages.report.details')
            ->with('projectlist' , $result)
            ->with('tasks',$tasks);
    }
}
