@extends('layouts.masterProjectManager')
@section('content')
    <fieldset>
        <legend align="center">
            <b>PROJECT REPORT</b>
        </legend><br/>
        <br/><br/>
        <table width="100%" cellspacing="0" border="1" cellpadding="5">
            <tr>
                <th align="left">Task Code</th>
                <th align="left">Task Name</th>
                <th align="left">Assigned To</th>
                <th align="left">Deadline</th>
                <th align="left">Priority</th>
                <th align="left">Status</th>
            </tr>
            <?php $sl = 0 ?>
            @foreach($tasks as $task)
                <?php $sl++ ?>
                <tr>
                    <td>#{{ $sl }}</td>
                    <td>{{$task->task_name}}</td>
                    <td>{{$task->assigned_to}}</td>
                    <td>{{$task->deadline}}</td>
                    <td>{{$task->priority}}</td>
                    <td>{{$task->status}}</td>
                    {{--<td width="40"><a href="#">project management</a></td>--}}
                </tr>
            @endforeach
        </table>
    </fieldset>
@endsection
