@extends('layouts.masterProjectManager')

@section('content')
    <fieldset>
        <legend><b>ASSIGN Project</b></legend>
        <br/>
        @if(isset($message) && !empty($message))
        <h4 style="color: red">{{ $message }}</h4>
        @endif
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
                        <select name="project_id" required>
                            <option disabled selected>Select</option>
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
                        <select name="user_id" required>
                            <option disabled selected>Select</option>
                            @foreach($userlist as $user)
                                @if($user->designation != 'Admin' && $user->designation == 'Project Manager')
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
            <a href="{{route('project.list')}}" type="button" class="btn btn-primary">Back To Project</a>
        </form>
    </fieldset>
    @endsection
