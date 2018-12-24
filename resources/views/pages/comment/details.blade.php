@extends('layouts.masterProjectManager')
@section('content')
<fieldset>
    <legend><b>COMMENTS DETAIL</b></legend>
    <br/>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td width="100"></td>
            <td width="10"></td>
            <td width="230"></td>
            <td></td>
        </tr>
        <tr>
            <td>Project Name</td>
            <td>:</td>
            <td>{{$comment->project_id}}</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Task Name</td>
            <td>:</td>
            <td>{{$comment->task_id}}</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
            <td>Comments</td>
            <td>:</td>
            <td>{{$comment->comment}}</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Commented By</td>
            <td>:</td>
            <td>{{$comment->commented_by}}</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Commented To</td>
            <td>:</td>
            <td>{{$comment->user_id}}</td>
        </tr>
        <tr><td colspan="3"><hr/></td></tr>
        <tr>
            <td>Time And Date</td>
            <td>:</td>
            <td>{{$comment->created_at}}</td>
        </tr>
    </table>
    <hr/>
    <a href="commentedit.php" type="button" class="btn btn-success">Edit</a>
    <a href="commentdelete.php" type="button" class="btn btn-danger">Delete</a>
    <a href="{{route('comment.list')}}" type="button" class="btn btn-success">All Comment</a>
    <br/><br/>
</fieldset>
    @endsection
