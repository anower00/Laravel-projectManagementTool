@extends('layouts.masterProjectManager')
@section('content')

    <fieldset>
        <legend align="center">
            <b>MY TASK LIST</b>
        </legend><br/>
        <br/><br/>
        <table width="100%" cellspacing="0" border="1" cellpadding="5">
            <tr>
                <th align="left">Project Name</th>
                <th align="left">Task Name</th>
                <th align="left">Assigned By</th>
                <th align="left">Priority</th>
                <th align="left">Deadline</th>
                <th align="left">Status</th>
                <th colspan="5">Actions</th>
            </tr>
            @foreach($tasklist as $task)
                <tr>
                    <td>{{$task->project_name}}</td>
                    <td>{{$task->task_name}}</td>
                    <td>{{$task->assigned_by}}</td>
                    <td>{{$task->priority}}</td>
                    <td>{{$task->deadline}}</td>
                    <td>{{$task->status}}</td>
                    <td width="40"><a href="{{route('task.details' , ['id' => $task->id])}}">Detail</a></td>
                    <td width="40"><a href="{{route('task.changeStatus' , ['$id' => $task->id])}}" type="button" class="btn btn-success">Change Status</a></td>
                </tr>
            @endforeach
        </table>
    </fieldset>
@endsection
