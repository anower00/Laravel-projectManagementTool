@extends('layouts.masterProjectManager')
@section('content')
<fieldset>
    <legend align="center">
        <b>ALL PROJECT</b>
    </legend><br/>
    <br/><br/>
    <table width="100%" cellspacing="0" border="1" cellpadding="5">
        <tr>
            <th align="left">Project Code</th>
            <th align="left">Project Name</th>
            <th align="left">Duration</th>
            <th align="left">STATUS</th>
            <th align="left">Assign To</th>
            <th align="left">Assign BY</th>
            {{--<th align="left">Project</th>--}}
            <th colspan="5">Actions</th>
        </tr>
        @foreach($projectlist as $project)
        <tr>
            <td>{{$project->codeName}}</td>
            <td>{{$project->projectName}}</td>
            <td>{{$project->duration}}</td>
            <td>{{$project->status}}</td>
            <td></td>
            <td>{{$project->name}}</td>
            {{--<td width="40"><a href="#">project management</a></td>--}}
            <td width="40"><a href="{{route('project.details' , ['id' => $project->id])}}">Detail</a></td>
            <td width="30"><a href="edit.php">Edit</a></td>
            <td width="45"><a href="delete.php">Delete</a></td>
        </tr>
            @endforeach
    </table>
</fieldset>
    @endsection
