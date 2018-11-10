@extends('layouts.masterProjectManager')
@section('content')

<fieldset>
    <legend><b>ADD TASK</b></legend>
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
                <td>Task Name</td>
                <td>:</td>
                <td><input type="text" name="taskName"></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Select Project</td>
                <td>:</td>
                <td>
                    <select name="project_id" id="">
                        <option></option>
                        @foreach($projectlist as $project)
                        <option value="{{$project->id}}">{{$project->projectName}}</option>
                            @endforeach
                    </select>
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Assign To</td>
                <td>:</td>
                <td>
                    <select name="user_id" id="">
                        <option></option>
                        @foreach($userlist as $user)
                            @if($user->designation != 'Admin')
                        <option>{{$user->name}} ({{$user->designation}}) </option>
                            @endif
                            @endforeach
                    </select>
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Description</td>
                <td>:</td>
                <td>
                    <textarea cols="30" role="5" name="description"></textarea>
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td valign="top">Due Date</td>
                <td valign="top">:</td>
                <td>
                    <input name="" type="date" value="" id="">
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Priority</td>
                <td>:</td>
                <td>
                    <select name="">
                        <option></option>
                        <option >High</option>
                        <option>Medium</option>
                        <option>Low</option>
                    </select>
                </td>
                <td></td>
            </tr>
        </table>
        <hr />
        <input type="submit" value="ADD" type="button" class="btn btn-success">
        <a href="alltask.php" type="button" class="btn btn-success">Back to Task</a>
    </form>
</fieldset>
    @endsection
