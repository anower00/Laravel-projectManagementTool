<?php

namespace App\Http\Controllers;

use App\AssignPerson;
use App\Http\Requests\CreateTaskRequest;
use Illuminate\Http\Request;
use App\Project;
use App\Users;
use App\AssignTask;
use App\Comment;
use DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('assign_tasks')
            ->select('assign_tasks.id as id','assign_tasks.taskName as task_name','assign_tasks.taskCode as taskCode','assign_tasks.assigned_by as assigned_by','assign_tasks.dueDate as deadline','assign_tasks.status as status','assign_tasks.priority as priority','projects.projectName as project_name','users.name as user_name')
            ->join('projects', 'assign_tasks.project_id', '=', 'projects.id')
        ->join('users', 'assign_tasks.user_id', '=', 'users.id')
        ->get();


//        $result = AssignTask::all();

        return view('pages.task.list')
            ->with('tasklist' , $result);
    }

    public function myTask()
    {
        $user = session()->get('user');
        $result = DB::table('assign_tasks')
            ->select('assign_tasks.id as id','assign_tasks.taskName as task_name','assign_tasks.taskCode as taskCode','assign_tasks.assigned_by as assigned_by','assign_tasks.dueDate as deadline','assign_tasks.status as status','assign_tasks.priority as priority','projects.projectName as project_name')
            ->join('projects', 'assign_tasks.project_id', '=', 'projects.id')
            ->where('user_id',$user->id)
            ->get();

        return view('pages.task.myTask')
            ->with('tasklist' , $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::all();
        $user = Users::where('designation','!=','Admin')->where('designation','!=','Project Manager')->get();

        return view('pages.task.create')
            ->with('projectlist' , $project)
            ->with('userlist', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request)
    {
//        dd($request);
        $taskCode = AssignTask::max('taskCode');
        $trimmed = ltrim($taskCode,"T");
        $trimmed+=1;
        $newCode = 'T'.$trimmed;
        $user = session()->get('user');
        $assignToTask = new AssignTask();
        $assignToTask->taskName = $request->taskName;
        $assignToTask->taskCode = $newCode;
        $assignToTask->project_id=$request->project_id;
        $assignToTask->user_id=$request->user_id;
        $assignToTask->assigned_by= $user->name;
        $assignToTask->description=$request->description;
        $assignToTask->dueDate=$request->dueDate;
        $assignToTask->status=$request->status;
        $assignToTask->priority = $request->priority;
        $assignToTask->save();

        return redirect()->route('task.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $task = AssignTask::find($id);
        $task = DB::table('assign_tasks')
            ->select('assign_tasks.id as id','assign_tasks.taskName as task_name','assign_tasks.project_id as project_id','assign_tasks.user_id as user_id','assign_tasks.assigned_by as assigned_by','assign_tasks.description as description','assign_tasks.dueDate as deadline','assign_tasks.status as status','assign_tasks.priority as priority','projects.projectName as project_name','users.name as user_name')
            ->join('projects', 'assign_tasks.project_id', '=', 'projects.id')
            ->join('users', 'assign_tasks.user_id', '=', 'users.id')
            ->where('assign_tasks.id',$id)
            ->first();
        $comments = Comment::where('task_id',$id)->get();
        $comments = DB::table('comments')
            ->select('comments.id as id','comments.comment as comment','comments.created_at as created_at','users.id as user_id','users.name as user_name')
            ->join('users', 'comments.commented_by', '=', 'users.id')
            ->where('comments.task_id',$id)
            ->get();
        return view('pages.task.details')
            ->with('task' , $task)
            ->with('comments' , $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = AssignTask::find($id);
        $project = Project::all();
        $user = Users::all();

        return view('pages.task.edit')
            ->with('task' , $task)
            ->with('projectlist' , $project)
            ->with('userlist' , $user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $taskToUpdate = AssignTask::find($request->tid);
    $taskToUpdate->taskName = $request->taskName;
    $taskToUpdate->project_id = $request->projec_id;
    $taskToUpdate->description = $request->description;
    $taskToUpdate->user_id = $request->user_id;
    $taskToUpdate->dueDate = $request->dueDate;
    $taskToUpdate->priority = $request->priority;
    $taskToUpdate->update();

    return redirect()->route('task.list');
}
    public function delete($id)
    {
        $task = AssignTask::find($id);

        return view('pages.task.delete')
            ->with('task' , $task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $taskToDelete = AssignTask::find($request->tid);
        $taskToDelete->delete();

        return redirect()->route('task.list');
    }

    public function projectWiseUsers(Request $request)
    {

        $userIds = AssignPerson::where('project_id',$request->projectId)->get();
        $ids = array();
        foreach ($userIds as $userId){
            $ids[] = $userId->user_id;
        }
        $users = Users::whereIn('id', $ids)->get();
        return response()->json(['success'=>$users]);
    }

    public function changeStatus($task_id)
    {
        $task = AssignTask::find($task_id);
        return view('pages.task.changeStatus', compact('task_id' , 'task'));
    }
    public function changeStatusUpdate(Request $request)
    {
        $taskToUpdate = AssignTask::find($request->task_id);
        $taskToUpdate->status = $request->status;
        $taskToUpdate->update();

        return redirect()->route('task.myTask');
    }

}
