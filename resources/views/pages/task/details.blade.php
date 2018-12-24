@extends('layouts.masterProjectManager')
@section('content')

<fieldset>
    <legend><b>TASk DETAILS</b></legend>
    <br/>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td width="100"></td>
            <td width="10"></td>
            <td width="230"></td>
            <td></td>
        </tr>
        <tr>
            <td>Task Name</td>
            <td>:</td>
            <td>{{$task->task_name}}</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Project Name</td>
            <td>:</td>
            <td>{{$task->project_name}}</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Description</td>
            <td>:</td>
            <td>{{$task->description}}</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Assigned To</td>
            <td>:</td>
            <td>{{$task->user_name}}</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Assigned By</td>
            <td>:</td>
            <td>{{$task->assigned_by}}</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Priority</td>
            <td>:</td>
            <td>{{$task->priority}}</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Due Date</td>
            <td>:</td>
            <td>{{$task->deadline}}</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>{{$task->status}}</td>
        </tr>
        <br><br>
        <form method="post" action="{{ url('/pages/comment') }}">
            @csrf
            <input type="hidden" name="project_id" value="{{$task->project_id}}">
            <input type="hidden" name="task_id" value="{{$task->id}}">
            <input type="hidden" name="user_id" value="{{$task->user_id}}">
        <tr><td colspan="4"><hr /></td></tr>
        <tr>
            <td>Comment</td>
            <td>:</td>
            <td>
                <textarea cols="30" role="5" name="comment"></textarea>
                <input type="submit" value="COMMENT" type="button" class="btn btn-success">
            </td>
            <td></td>
        </tr>

        <tr><td colspan="4"><hr /></td></tr>
            @foreach($comments as $comment)
        <tr>
            <td>{{ $comment->user_name }}</td>
            <td>:</td>
            <td>{{ $comment->comment }}</td>
            <td>{{ $comment->created_at }}</td>
        </tr>
                @endforeach
        </form>
    </table>
    {{--<hr/>--}}
    {{--<a href="#" type="button" class="btn btn-success">Edit</a>--}}
    {{--<a href="#" type="button" class="btn btn-danger">Delete</a>--}}
    {{--<a href="{{route('task.list')}}" type="button" class="btn btn-success">View Task</a>--}}
    {{--<br/><br/>--}}
</fieldset>
    @endsection
