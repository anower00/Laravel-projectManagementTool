@extends('layouts.masterProjectManager')
@section('content')
    <fieldset>
        <legend><b>TASk DELETE</b></legend>
        <br/>
        <form method="post">
            @csrf
            <input type="hidden" name="tid" value="{{$task->id}}">
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
                <td>{{$task->taskName}}</td>
            </tr>
            <tr><td colspan="3"><hr /></td></tr>
            <tr>
                <td>Project Name</td>
                <td>:</td>
                <td>{{$task->project_id}}</td>
            </tr>
            <tr><td colspan="3"><hr /></td></tr>
            <tr>
                <td>Description</td>
                <td>:</td>
                <td>{{$task->description}}</td>
            </tr>
            <tr><td colspan="3"><hr/></td></tr>
            <tr>
                <td>Assign To</td>
                <td>:</td>
                <td>{{$task->user_id}}</td>
            </tr>
            <tr><td colspan="3"><hr/></td></tr>
            <tr>
                <td>Assign By</td>
                <td>:</td>
                <td>Anower</td>
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
                <td>{{$task->dueDate}}</td>
            </tr>
        </table>
        <hr/>
        <h3><p><font color="red">Are You Sure? Do You Want To Delete This Task!</font></p></h3><br>
            <input class="btn btn-danger" type="submit" value="DELETE">
        <a href="{{route('task.edit' , ['$id' => $task->id])}}" type="button" class="btn btn-success">Edit</a>
        <a href="{{route('task.list')}}" type="button" class="btn btn-success">All Task</a>
        <br/><br/>
        </form>
    </fieldset>
    @endsection
