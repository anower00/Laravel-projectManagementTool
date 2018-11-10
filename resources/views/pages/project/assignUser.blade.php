@extends('layouts.masterProjectManager')

@section('content')
    <fieldset>
        <legend><b>ASSIGN USER</b></legend>
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
                        <select name="project_id">
                            <option></option>
                            @foreach($projectlist as $project)
                            <option value="{{$project->id}}">{{$project->projectName}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Select Resource Person</td>
                    <td>:</td>
                    <td>
                        <select name="user_id">
                            <option></option>
                            @foreach($userlist as $user)
                                @if($user->designation != 'Admin')
                            <option value="{{$user->id}}">{{$user->username }} ({{$user->designation}})</option>
                                @endif
                                @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
            </table>
            <hr />
            <button type="submit" class="btn btn-success">ADD</button>
            <a href="{{route('project.list')}}" type="button" class="btn btn-success">Back To Project</a>
        </form>
    </fieldset>
    @endsection
