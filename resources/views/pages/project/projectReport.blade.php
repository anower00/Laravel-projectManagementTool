@extends('layouts.masterProjectManager')

@section('content')
    <fieldset>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <b>USER | STATISTICS</b>
                </td>
                <td align="right">
                    <input type="submit" value="Print"/>
                </td>
            </tr>
        </table>
    </fieldset>
    <br/>
    <table width="100%" cellspacing="0" border="1" cellpadding="5">
        <tr>
            <th align="left">PROJECT</th>
            <th align="left">NO OF USERS</th>
            <th align="left">STATUS</th>
        </tr>
        <tr>
            <td>Baghdoom.com</td>
            <td>8</td>
            <td>Completede</td>
        </tr>
        <tr>
            <td>School management</td>
            <td>5</td>
            <td>Pending</td>
        </tr>
        <tr>
            <td>Gym Management</td>
            <td>5</td>
            <td>Not Started</td>
        </tr>
        <tr>
            <td align="center"><b>Total : 3</b></td>
            <td align="center"><b>Total : 18</b></td>
            <td align="center"><b>Com:1, pen:1, ns:1</b></td>
        </tr>
    </table>
    @endsection
