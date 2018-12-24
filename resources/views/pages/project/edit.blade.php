@extends('layouts.masterProjectManager')
@section('content')
    <fieldset>
        <legend><b>EDIT PROJECT</b></legend>
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
            <input type="hidden" name="pid" value="{{$project->id}}">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="100"></td>
                    <td width="10"></td>
                    <td width="230"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Project Name</td>
                    <td>:</td>
                    <td><input name="projectName" type="text" value="{{$project->projectName}} required"></td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Code Name</td>
                    <td>:</td>
                    <td><input name="codeName" type="text" value="{{$project->codeName}}"></td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td>
                        <textarea cols="30" role="5" name="description">{{$project->description}}</textarea>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td valign="top">Possible Start Date</td>
                    <td valign="top">:</td>
                    <td>
                        <input name="startDate" type="date" value="{{$project->startDate}}">
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td valign="top">Possible End Date</td>
                    <td valign="top">:</td>
                    <td>
                        <input name="endDate" id="ped" type="date" value="{{$project->endDate}}">
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Duration(Days)</td>
                    <td>:</td>
                    <td><input name="duration" type="text" value="{{$project->duration}}"></td>
                    <td></td>
                </tr>

                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <input type=radio name="status" value="Not Started" {{ $project->status == 'Not Started' ? 'checked' : ''}}>Not Started<br>
                        <input type=radio name="status" value="Started" {{ $project->status == 'Started' ? 'checked' : ''}}>Started<br>
                        <input type=radio name="status" value="Completed" {{ $project->status == 'Completed' ? 'checked' : ''}}>Completed<br>
                        <input type=radio name="status" value="Cancelled" {{ $project->status == 'Cancelled' ? 'checked' : ''}}>Cancelled<br>
                    </td>
                    <td></td>
                </tr>
            </table>
            <hr />
            <input type="submit" value="UPDATE" type="button" class="btn btn-success">
            <a href="{{route('project.list')}}" type="button" class="btn btn-primary">Back to All Project</a>
        </form>
    </fieldset>
@endsection
