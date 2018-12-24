<?php

namespace App\Http\Controllers;

use App\AssignTask;
use App\Project;
use App\Users;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Comment::all();

        return view('pages.comment.list')
            ->with('commentlist' , $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::all();
        $user = Users::all();
        $task = AssignTask::all();

        return view('pages.comment.create')
            ->with('projectlist' , $project)
            ->with('userlist' , $user)
            ->with('tasklist' , $task);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = session()->get('user');
        $comment = new Comment();
        $comment->project_id = $request->project_id;
        $comment->task_id = $request->task_id;
        $comment->user_id = $request->user_id;
        $comment->commented_by = $user->id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->route('comment.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);

        return view('pages.comment.details')
            ->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        $project = Project::all();
        $user = Users::all();
        $task = AssignTask::all();

        return view('pages.comment.edit')
            ->with('comment' , $comment)
            ->with('projectlist' , $project)
            ->with('userlist' , $user)
            ->with('tasklist' , $task);
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
        $commentToUpdate = Comment::find($request->cid);
        $commentToUpdate ->project_id = $request->project_id;
        $commentToUpdate ->task_id = $request->task_id;
        $commentToUpdate ->user_id = $request->user_id;
        $commentToUpdate ->comment = $request->comment;
        $commentToUpdate ->save();

        return redirect()->route('comment.list');
    }
    public function delete($id)
    {
        $commentToDelete = Comment::find($id);

        return view('pages.comment.delete')
            ->with('comment' , $commentToDelete);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $commentToDelete = Comment::find($request->cid);
        $commentToDelete-> delete();

        return redirect()->route('comment.list');
    }

    public function comment(Request $request)
    {
        $user = session()->get('user');
        $comment = new Comment();
        $comment->project_id = $request->project_id;
        $comment->task_id = $request->task_id;
        $comment->user_id = $request->user_id;
        $comment->commented_by = $user->id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back();
    }
}
