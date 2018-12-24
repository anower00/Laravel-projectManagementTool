@extends('layouts.masterProjectManager')
@section('content')

    <fieldset>
        <legend>
            <b>ALL COMMENT</b>
        </legend><br/>
        <br/><br/>
        <table width="100%" cellspacing="0" border="1" cellpadding="5">
            <tr>
                <th align="left">Project Name</th>
                <th align="left">Task Name</th>
                <th align="left">Comment</th>
                <th align="left">Commented To</th>
                <th align="left">Commented By</th>
                <th colspan="5">Actions</th>
            </tr>
            @foreach($commentlist as $comment)
            <tr>
                <td>{{$comment->project_id}}</td>
                <td>{{$comment->task_id}}</td>
                <td>{{$comment->comment}}</td>
                <td>{{$comment->user_id}}</td>
                <td>{{$comment->commented_by}}</td>
                <td width="40"><a href="{{route('comment.show' , ['$id' => $comment->id])}}">Detail</a></td>
                <td width="30"><a href="{{route('comment.edit' , ['$id' => $comment->id])}}">Edit</a></td>
                <td width="45"><a href="{{route('comment.delete' , ['$id' => $comment->id])}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </fieldset>
@endsection
