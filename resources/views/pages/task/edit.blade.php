@extends('layouts.masterProjectManager')
@section('content')

<fieldset>
    <legend><b>TASK EDIT</b></legend>
    <br/>
    <form method="post">
        @csrf
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        @endif
        <input type="hidden" name="tid" value="{{$task->id}}">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="100"></td>
                <td width="10"></td>
                <td width="230"></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Task Name</td>
                <td>:</td>
                <td><input name="taskName" type="text" value="{{$task->taskName}}"></td>
                <td></td>
            </tr>
            </tr><tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Project Name</td>
                <td>:</td>
                <td>
                    <select name="projec_id" id="">
                        <option disabled>Select</option>
                        @foreach($projectlist as $project)
                        <option value="{{$project->id}}">{{$project->projectName}}</option>
                            @endforeach
                    </select>
                </td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Description</td>
                <td>:</td>
                <td>
                    <textarea cols="30" role="5" name="description">{{$task->description}}</textarea>
                </td>
                <td></td>
            </tr><tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Assign To</td>
                <td>:</td>
                <td>
                    <select name="user_id" id="">
                        @foreach($userlist as $user)
                            @if($user->designation != 'Admin')
                        <option value="{{$user->id}}">{{$user->name}}({{$user->designation}})</option>
                            @endif
                            @endforeach
                    </select>
                </td>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td valign="top">Due Date</td>
                <td valign="top">:</td>
                <td>
                    <input name="dueDate" type="text" value="{{$task->dueDate}}" id="">
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                    <input type="radio" name="status" value="Not Started Yet" {{ $task->status == 'Not Started Yet' ? 'checked' : ''}}>Not Started<br>
                    <input type="radio" name="status" value="In Progress" {{ $task->status == 'In Progress' ? 'checked' : ''}}>Started<br>
                    <input type="radio" name="status" value="Completed" {{ $task->status == 'Completed' ? 'checked' : ''}}>Completed<br>
                    <input type="radio" name="status" value="Cancelled" {{ $task->status == 'Cancelled' ? 'checked' : ''}}>Cancelled<br>
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Priority</td>
                <td>:</td>
                <td>
                    <select name="priority">
                        <option @if($task->priority == 'High'){{ 'selected' }} @endif>High</option>
                        <option @if($task->priority == 'Medium'){{ 'selected' }} @endif>Medium</option>
                        <option @if($task->priority == 'Low'){{ 'selected' }} @endif>Low</option>
                    </select>
                </td>
                <td></td>
            </tr>
        </table>
        <hr />
        <input type="hidden" name="id" value="">
        <input type="submit" value="UPDATE" type="button" class="btn btn-success">
        <a href="{{route('task.list')}}" type="button" class="btn btn-success">Back to All Task</a>
    </form>
</fieldset>
    @endsection
