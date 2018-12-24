@extends('layouts.masterProjectManager')
@section('content')

    <fieldset>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <b>PROJECT | REPORT</b>
                </td>
            </tr>
        </table>
    </fieldset>
    <br/>
    <table width="100%" cellspacing="0" border="1" cellpadding="5">
        <tr>
            <th align="left">PROJECT</th>
            <th align="left">STATUS</th>
            <th align="left">REPORT</th>
        </tr>
        @foreach($projects as $project)
        <tr>
            <td>{{$project->projectName}}</td>
            <td>{{$project->status}}</td>
            <td><a href="{{route('report.details' , ['$id'=> $project->id])}}" type="button" class="btn btn-success">Details</a></td>
        </tr>
        @endforeach
    </table>
@endsection
