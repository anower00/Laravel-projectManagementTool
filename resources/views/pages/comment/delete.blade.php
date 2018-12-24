@extends('layouts.masterProjectManager')
@section('content')

<fieldset>
    <legend><b>COMMENT DELETE</b></legend>
    <br/>
    <form method="post">
        @csrf
        <input type="hidden" name="cid" value="{{$comment->id}}">
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
    <h3><p><font color="red">Are You Sure? Do You Want To Delete This Comment!</font></p></h3><br>
    <input class="btn btn-danger" type="submit" value="DELETE">
    <a href="{{route('comment.edit', ['$id' => $comment->id])}}" type="button" class="btn btn-success">Edit</a>
    <a href="{{route('comment.list')}}" type="button" class="btn btn-success">All Comments</a>
    <br/><br/>
    </form>
</fieldset>
    @endsection
