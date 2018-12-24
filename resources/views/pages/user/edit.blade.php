@extends('layouts.masterProjectManager')
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
                <td>User Name</td>
                <td>:</td>
                <td><input name="name" type="text" value="{{$user->username}}" required></td>
                <td></td>
            </tr>

            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><input name="name" type="text" value="{{$user->name}}" required></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input name="email" type="text" value="{{$user->email}}" required>
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>
                    {{--<input name="gender" type="radio" checked="checked">Male--}}
                    {{--<input name="gender" type="radio">Female--}}
                    {{--<input name="gender" type="radio">Other--}}
                    <input type=radio name="gender" value="male" {{ $user->gender == 'male' ? 'checked' : ''}}>Male
                    <input type=radio name="gender" value="female" {{ $user->gender == 'female' ? 'checked' : ''}}>FeMale
                    <input type=radio name="gender" value="other" {{ $user->gender == 'other' ? 'checked' : ''}}>Other
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td valign="top">Date of Birth</td>
                <td valign="top">:</td>
                <td>
                    <input name="dateOfBirth" type="text" value="{{$user->dateOfBirth}}" required>
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
                            <td></td>
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
                            <option @if($user->designation == 'Project Manager'){{ 'selected' }} @endif>Project Manager</option>
                            <option @if($user->designation == 'Developer'){{ 'selected' }} @endif>Developer</option>
                            <option @if($user->designation == 'Team Lead'){{ 'selected' }} @endif>Team Lead</option>
                            <option @if($user->designation == 'UX Engineer'){{ 'selected' }} @endif>UX Engineer</option>
                            <option @if($user->designation == 'QA Engineer'){{ 'selected' }} @endif>QA Engineer</option>
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
                        <option @if($user->status == 'Active'){{ 'selected' }} @endif>Active</option>
                        <option @if($user->status == 'Pending'){{ 'selected' }} @endif>Pending</option>
                        <option @if($user->status == 'Blocked'){{ 'selected' }} @endif>Blocked</option>
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
