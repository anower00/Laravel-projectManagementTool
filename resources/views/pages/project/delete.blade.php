@extends('layouts.masterProjectManager')
@section('content')

    <fieldset>
        <legend><b>PROJECT DELETE</b></legend>
        <br/>
        <form method="post">
            @csrf
            <input type="hidden" name="pid" value="{{$project->id}}">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td width="100"></td>
                <td width="10"></td>
                <td width="230"></td>
                <td></td>
            </tr>
            <tr>
                <td>Project Code</td>
                <td>:</td>
                <td>{{$project->codeName}}</td>
            </tr>
            <tr><td colspan="3"><hr /></td></tr>
            <tr>
                <td>Project Name</td>
                <td>:</td>
                <td>{{$project->projectName}}</td>
            </tr>
            <tr><td colspan="3"><hr /></td></tr>
            <tr>
                <td>Description</td>
                <td>:</td>
                <td>{{$project->description}}</td>
            </tr>
            <tr><td colspan="3"><hr/></td></tr>
            <tr>
                <td>Possible Start Date</td>
                <td>:</td>
                <td>{{$project->startDate}}</td>
            </tr>
            <tr><td colspan="3"><hr/></td></tr>
            <tr>
                <td>Possible End Date</td>
                <td>:</td>
                <td>{{$project->endDate}}</td>
            </tr>
            <tr><td colspan="3"><hr/></td></tr>
            <tr>
                <td>Duration</td>
                <td>:</td>
                <td>{{$project->duration}}</td>
            </tr>
            <tr><td colspan="3"><hr/></td></tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>{{$project->status}}</td>
            </tr>
            <tr><td colspan="3"><hr/></td></tr>
            <tr>
                <td>Document</td>
                <td>:</td>
                <td>{{$project->uploadDocument}}</td>
            </tr>
        </table>
        <hr/>
            <h3><p><font color="red">Are You Sure? Do You Want To Delete This Task!</font></p></h3><br>
            <input class="btn btn-danger" type="submit" value="DELETE">
        <a href="{{route('project.edit' , ['$id' => $project->id])}}" type="button" class="btn btn-success">Edit</a>
        <a href="{{route('project.list')}}" type="button" class="btn btn-primary">Project List</a>
        <br/><br/>
        </form>
    </fieldset>
@endsection
