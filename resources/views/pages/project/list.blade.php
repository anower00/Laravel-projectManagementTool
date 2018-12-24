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
            <th align="left">Assigned To</th>
            <th align="left">Assigned By</th>
            {{--<th align="left">Project</th>--}}
            <th colspan="5">Actions</th>
        </tr>
        @foreach($projectlist as $project)
        <tr>
            <td>{{$project->codeName}}</td>
            <td>{{$project->projectName}}</td>
            <td>{{$project->duration}}</td>
            <td>{{$project->status}}</td>
            <td>{{$project->assigned_to}}</td>
            <td>{{$project->assigned_by}}</td>
            {{--<td width="40"><a href="#">project management</a></td>--}}
            <td width="40"><a href="{{route('project.details' , ['id' => $project->id])}}">Detail</a></td>
            <td width="30"><a href="{{route('project.edit' , ['$id' => $project->id])}}">Edit</a></td>
            <td width="45"><a href="{{route('project.delete', ['id' => $project->id])}}">Delete</a></td>
        </tr>
            @endforeach
    </table>
</fieldset>
    @endsection
