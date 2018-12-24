@extends('layouts.masterProjectManager')

@section('content')
    <fieldset>
        <legend><b>CREATE COMMENT</b></legend>
        <br/>
        <form method="post">
            @csrf
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="100"></td>
                    <td width="10"></td>
                    <td width="230"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Select Project</td>
                    <td>:</td>
                    <td>
                        <select name="project_id" id="">
                            @foreach($projectlist as $project)
                            <option value="{{$project->id}}">{{$project->projectName}}</option>
                                @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Select Task</td>
                    <td>:</td>
                    <td>
                        <select name="task_id" id="">
                            @foreach($tasklist as $task)
                            <option value="{{$task->id}}">{{$task->taskName}}</option>
                                @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Commented To</td>
                    <td>:</td>
                    <td>
                        <select name="user_id" id="">
                            @foreach($userlist as $user)
                                @if($user->designation != 'Admin')
                            <option value="{{$user->id}}">{{$user->username}} ({{$user->designation}})</option>
                                @endif
                                @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Comment</td>
                    <td>:</td>
                    <td>
                        <textarea cols="30" role="5" name="comment"></textarea>
                    </td>
                    <td></td>
                </tr>
            </table>
            <hr />
            <input type="submit" value="SAVE" type="button" class="btn btn-success">
            <a href="{{route('comment.list')}}" type="button" class="btn btn-primary">Back to All Comments</a>
        </form>
    </fieldset>
@endsection
