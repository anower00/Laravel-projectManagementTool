@extends('layouts.master')

@section('content')
<fieldset>
    <legend><b>USER | EDIT</b></legend>
    <br/>
    <form method="post">
        @csrf
        <input type="hidden" name="uid" value="{{$user->id}}">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td width="100"></td>
                <td width="10"></td>
                <td width="230"></td>
                <td></td>
            </tr>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><input name="name" type="text" value="{{$user->name}}"></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>User Name</td>
                <td>:</td>
                <td><input name="name" type="text" value="{{$user->username}}"></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input name="email" type="text" value="{{$user->email}}">
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>
                    <input name="gender" type="radio" checked="checked">Male
                    <input name="gender" type="radio">Female
                    <input name="gender" type="radio">Other
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td valign="top">Date of Birth</td>
                <td valign="top">:</td>
                <td>
                    <input name="dateOfBirth" type="text" value="{{$user->dateOfBirth}}">
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Picture</td>
                <td>:</td>
                <td>
                    <table>
                        <tr>
                            <td><img width="48" src="resources/anower.jpg" /></td>
                            <td><input type="file"></td>
                        </tr>
                    </table>
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Designation</td>
                <td>:</td>
                <td>
                    <select name="designation">
                            <option>Project Manager</option>
                            <option>Developer</option>
                            <option>Team Lead</option>
                            <option>UX Engineer</option>
                            <option>QA Engineer</option>
                    </select>
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                    <select name="status">
                        <option>Active</option>
                        <option>Pending</option>
                        <option>Blocked</option>
                    </select>
                </td>
                <td></td>
            </tr>
        </table>
        <hr />
        <input type="submit" value="Update" type="button" class="btn btn-success">
        <a href="{{route('user.list')}}" type="button" class="btn btn-primary">Back to All User</a>
    </form>
</fieldset>
    @endsection
