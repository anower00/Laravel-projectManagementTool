@extends('layouts.masterProjectManager')
@section('content')
<fieldset>
    <legend><b>CHANGE PASSWORD</b></legend>
    <br/>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('user.updatePassword') }}" method="post">
        @csrf
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="150"></td>
                <td width="10"></td>
                <td width="150"></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td><font size="3" color="green">Current Password</font></td>
                <td>:</td>
                <td><input type="password" name="oldPass" /></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td><font size="3" color="green">New Password</font></td>
                <td>:</td>
                <td><input type="password" name="newPass" /></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td><font size="3" color="red">Retype New Password</font></td>
                <td>:</td>
                <td><input type="password" name="retypeNewPass"/></td>
                <td></td>
            </tr>
        </table>
        <hr />
        <input type="hidden" name="uid" value="{{ $user->id }}"/>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</fieldset>
    @endsection
