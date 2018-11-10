<?php

namespace App\Http\Controllers;

use App\AssignPerson;
use App\AssignTask;
use App\Http\Requests\CreateProjectRequest;
use App\Project;

use App\Users;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.project.index');
    }

    public function list()
    {
        $result = Project::all();

        return view('pages.project.list')
            ->with('projectlist',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $project = new Project();
        $project->projectName = $request->projectName;
        $project->codeName = $request->codeName;
        $project->description = $request->description;
        $project->startDate = $request->startDate;
        $project->endDate = $request->endDate;
        $project->duration = $request->duration;
        $project->uploadDocument = $request->uploadDocument;
        $project->status = $request->status;
//        dd($project);
        $project->save();

        return redirect()->route('project.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        return view('pages.project.details')
            ->with('project',$project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignUser()
    {
        $project = Project::all();
        $user = Users::all();


        return view('pages.project.assignUser')
            ->with('projectlist',$project)
            ->with('userlist' , $user);
    }

    public function assignUserStore( Request $request)
    {
//        echo "<pre>";
//        dd($request);
        /* @var $assignToUser \App\AssignPerson */
        $assignToUser = new AssignPerson();
        $assignToUser->user_id = $request->user_id;
        $assignToUser->project_id= $request->project_id;
        $assignToUser->save();

        return redirect()->route('project.list');
    }

    public function addTask()
    {
        $project = Project::all();
        $user = Users::all();

        return view('pages.project.addTask')
            ->with('projectlist' , $project)
            ->with('userlist', $user);
    }

    public function taskAssign( Request $request)
    {
        $assignToTask = new AssignTask();
        $assignToTask->task_name = $request->taskName;

        return redirect()->route('pages.project.taskList');
    }

    public function taskList()
    {
        return view('pages.project.taskList');
    }

    public function addComment()
    {
        return view('pages.project.addComment');
    }

    public function commentList()
    {
        return view('pages.project.commentList');
    }

    public function projectReport()
    {
        return view('pages.project.projectReport');
    }
}
