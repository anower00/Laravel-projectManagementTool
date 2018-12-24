@extends('layouts.masterProjectManager')
@section('content')
<fieldset>
    <legend><b>USER | DETAIL</b></legend>
    <br/>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td width="100"></td>
            <td width="10"></td>
            <td width="230"></td>
            <td></td>
        </tr>
        <tr>
            <td>User Name</td>
            <td>:</td>
            <td>{{$user->username}}</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Name</td>
            <td>:</td>
            <td>{{$user->name}}</td>
            <td width="30%" rowspan="7" align="center">
                @if(isset($user->profile_picture) && !empty($user->profile_picture))
                <img src="{{ url($user->profile_picture) }}" >
                    @else
                    <img src="{{ url('images/profilePicture/profile-picture-not-available.jpg') }}" >
                    @endif
            </td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{$user->email}}</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Gender</td>
            <td>:</td>
            <td>{{$user->gender}}</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Date of Birth</td>
            <td>:</td>
            <td>{{$user->dateOfBirth}}</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Designation</td>
            <td>:</td>
            <td>{{$user->designation}}</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>{{$user->status}}</td>
        </tr>
    </table>
    <hr/>
    <a href="{{route('user.edit' , ['id' =>$user->id])}}" type="button" class="btn btn-primary">Edit</a>
    {{--<a href="{{route('user.delete' , ['id'=>$user->id])}}" type="button" class="btn btn-danger">Delete</a>--}}
    <a href="{{route('user.list')}}" type="button" class="btn btn-success">Back to All User</a>
    <br/><br/>
</fieldset>
    @endsection
