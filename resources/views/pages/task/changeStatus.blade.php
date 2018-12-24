@extends('layouts.masterProjectManager')

@section('content')
    <fieldset>
        <legend><b>ADD TASK</b></legend>
        <br/>
        <form method="post" action="{{ url('/pages/task/changeStatus') }}">
            @csrf
            <input type="hidden" name="task_id" value="{{$task_id}}">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="100"></td>
                    <td width="10"></td>
                    <td width="230"></td>
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
            </table>
            <input type="submit" value="UPDATE" type="button" class="btn btn-success">
            <a href="{{route('task.myTask')}}" type="button" class="btn btn-primary">Back to My Task</a>
        </form>
    </fieldset>
    @endsection
