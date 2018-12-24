<?php $user = session()->get('user') ?>
@extends('layouts.masterProjectManager')
@section('content')

    <fieldset>
        <legend align="center">
            <b>TASK LIST</b>
        </legend><br/>
        <br/><br/>
        <table width="100%" cellspacing="0" border="1" cellpadding="5">
            <tr>
                <th align="left">Task Name</th>
                <th align="left">Task Code</th>
                <th align="left">Project Name</th>
                <th align="left">Assign To</th>
                <th align="left">Assign BY</th>
                <th align="left">Priority</th>
                <th align="left">Deadline</th>
                <th colspan="5">Actions</th>
            </tr>
            @foreach($tasklist as $task)
            <tr>
                <td>{{$task->task_name}}</td>
                <td>{{$task->taskCode}}</td>
                <td>{{$task->project_name}}</td>
                <td>{{$task->user_name}}</td>
                <td>{{$task->assigned_by}}</td>
                <td>{{$task->priority}}</td>
                <td>{{$task->deadline}}</td>
                <td width="40"><a href="{{route('task.details' , ['$id' => $task->id])}}">Detail</a></td>
                @if($user->designation == 'Project Manager')
                <td width="30"><a href="{{route('task.edit' , ['$id' => $task->id])}}">Edit</a></td>
                <td width="45"><a href="{{route('task.destroy' , ['$id' => $task->id])}}">Delete</a></td>
                    @endif
            </tr>
                @endforeach
        </table>
        <hr />
    </fieldset>
@endsection
