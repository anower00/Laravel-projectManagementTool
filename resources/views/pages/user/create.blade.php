@extends('layouts.master')

@section('content')
    <fieldset>
        <legend><b>USER | CREATE</b></legend>
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
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="100"></td>
                    <td width="10"></td>
                    <td width="230"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><input name="name" type="text" value="{{old('name')}}"></td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>User Name</td>
                    <td>:</td>
                    <td><input name="username" type="text" value="{{old('username')}}"></td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input name="password" type="password" required></td>
                    <td></td>
                </tr>

                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>
                        <input name="email" type="text" value="{{old('email')}}">
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td>
                        <input name="gender" type="radio" value="Male">Male
                        <input name="gender" type="radio" value="Female">Female
                        <input name="gender" type="radio" value="Other">Other
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td valign="top">Date of Birth</td>
                    <td valign="top">:</td>
                    <td>
                        <input name="dateOfBirth" type="date" value="{{old('dateOfBirth')}}">
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
                            <option >Active</option>
                            <option>Pending</option>
                            <option>Blocked</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
            </table>
            <hr />
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{route('user.list')}}" type="button" class="btn btn-success">Back to All User</a>
        </form>
    </fieldset>
    @endsection
