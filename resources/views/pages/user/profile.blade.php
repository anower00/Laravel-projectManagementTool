@extends('layouts.masterProjectManager')
@section('content')
<fieldset>
    <legend><b>USER | PROFILE</b></legend>
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
                <div style="margin-top: 5%;margin-left: 15%">
                    <form method="post" action="{{ url('changeProfilePicture') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="picture" style="margin-bottom: 5%">
                        <input type="submit" value="Update Profile Picture">
                    </form>
                </div>
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
    <br/><br/>
</fieldset>
    @endsection
