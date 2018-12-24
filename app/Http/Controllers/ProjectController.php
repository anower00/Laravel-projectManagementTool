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
//        dd($result);
        foreach ($result as $project){
        $assigns = AssignPerson::where('project_id',$project->id)->get();
//            dd($assigns);
        $assigned_to = '';
        $assigned_by = '';
        foreach ($assigns as $assign){
            $user = Users::find($assign->user_id);
            $assigned_to=$assigned_to.$user->name.',';
            $assigned = Users::find($assign->assigned_by);
//dd($assigned);
            if (strpos($assigned_by, $assigned->name) === false) {
                $assigned_by=$assigned_by.$assigned->name.',';
            }

        }
            $assigned_to=rtrim($assigned_to,", ");
            $assigned_by=rtrim($assigned_by,", ");
        $project->assigned_to = $assigned_to;
        $project->assigned_by = $assigned_by;
        }
//dd($result);
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
        $projectCode = Project::max('codeName');
        $trimmed = ltrim($projectCode,"P");
        $trimmed+=1;
        $newCode = 'P'.$trimmed;
        $project = new Project();
        $project->projectName = $request->projectName;
        $project->codeName = $newCode;
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
        $project = Project::find($id);

        return view('pages.project.edit')
            ->with('project' , $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProjectRequest $request, $id)
    {
        $projectToUpdate = Project::find($request->pid);
        $projectToUpdate->projectName = $request->projectName;
        $projectToUpdate->codeName = $request->codeName;
        $projectToUpdate->description = $request->description;
        $projectToUpdate->startDate = $request->startDate;
        $projectToUpdate->endDate = $request->endDate;
        $projectToUpdate->duration = $request->duration;
//        $projectToUpdate->uploadDocument = $request->uploadDocument;
        $projectToUpdate->status = $request->status;
        $projectToUpdate->save();

        return redirect()->route('project.list');
    }

    public function delete($id)
    {
        $project = Project::find($id);

        return view('pages.project.delete')
            ->with('project',$project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $projectToDelete = Project::find($request->pid);
        $projectToDelete-> delete();

        return redirect()->route('project.list');
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
        $assignData = AssignPerson::where('user_id',$request->user_id)->where('project_id',$request->project_id)->first();
//        dd($assignData);
        if (!empty($assignData->user_id)){
            $message = "This user is already assigned to this project.";
            $project = Project::all();
            $user = Users::all();


            return view('pages.project.assignUser')
                ->with('projectlist',$project)
                ->with('userlist' , $user)
                ->with('message' , $message);
        } else{
        $user = session()->get('user');
        $assignToUser = new AssignPerson();
        $assignToUser->user_id = $request->user_id;
        $assignToUser->project_id= $request->project_id;
        $assignToUser->assigned_by= $user->id;
        $assignToUser->save();

        return redirect()->route('project.list');
        }
    }

/*    public function addTask()
    {
        $project = Project::all();
        $user = Users::all();

        return view('pages.project.addTask')
            ->with('projectlist' , $project)
            ->with('userlist', $user);
    }*/
/*
    public function taskAssign( Request $request)
    {
//        dd($request);
        $assignToTask = new AssignTask();
        $assignToTask->taskName = $request->taskName;
        $assignToTask->project_id=$request->project_id;
        $assignToTask->user_id=$request->user_id;
        $assignToTask->description=$request->description;
        $assignToTask->dueDate=$request->dueDate;
        $assignToTask->priority->$request->priority;
        $assignToTask->save();

        return redirect()->route('pages.project.taskList');
    }*/

/*    public function taskList()
    {
        return view('pages.project.taskList');
    }*/


    public function projectReport()
    {
        return view('pages.project.projectReport');
    }
}
