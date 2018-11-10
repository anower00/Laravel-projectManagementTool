@extends('layouts.master')
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
            <td>anower</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Name</td>
            <td>:</td>
            <td>anower hasan</td>
            <td width="30%" rowspan="7" align="center">
                <img width="128" src="resources/anower.jpg"/>
            </td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>anower.hasan@gmail.com</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Gender</td>
            <td>:</td>
            <td>Male</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Date of Birth</td>
            <td>:</td>
            <td>19/09/1998</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Designation</td>
            <td>:</td>
            <td>Admin</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>Active</td>
        </tr>
    </table>
    <hr/>
    <a href="alluser.php" type="button" class="btn btn-success">Back to All User</a>
    <br/><br/>
</fieldset>
    @endsection
