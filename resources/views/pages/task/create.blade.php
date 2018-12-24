@extends('layouts.masterProjectManager')
@section('content')

    <fieldset>
        <legend><b>CREATE TASK</b></legend>
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
                    <td>Task Name</td>
                    <td>:</td>
                    <td><input type="text" name="taskName"></td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr/></td></tr>
                <tr>
                    <td>Select Project</td>
                    <td>:</td>
                    <td>
                        <select name="project_id" id="projectId">
                            <option disabled selected>Select Project</option>
                            @foreach($projectlist as $project)
                                <option value="{{$project->id}}">{{$project->projectName}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr/></td></tr>
                <tr>
                    <td>Assign To</td>
                    <td>:</td>
                    <td>
                        <select name="user_id" id="userId">
                            <option disabled selected>Assign User</option>
                            @foreach($userlist as $user)
                                    <option value="{{$user->id}}">{{$user->name}} ({{$user->designation}}) </option>
                            @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td>
                        <textarea cols="30" role="5" name="description"></textarea>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td valign="top">Due Date</td>
                    <td valign="top">:</td>
                    <td>
                        <input name="dueDate" type="text" value="" id="dueDate">
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="status" value="Not Started Yet">Not Started<br>
                        <input type="radio" name="status" value="In Progress">Started<br>
                        <input type="radio" name="status" value="Completed">Completed<br>
                        <input type="radio" name="status" value="Cancelled">Cancelled<br>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr/></td></tr>
                <tr>
                    <td>Priority</td>
                    <td>:</td>
                    <td>
                        <select name="priority">
                            <option disabled selected>Select</option>
                            <option>High</option>
                            <option>Medium</option>
                            <option>Low</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
            </table>
            <hr />
            <input type="submit" value="ADD" type="button" class="btn btn-success">
            <a href="{{route('task.list')}}" type="button" class="btn btn-primary">Back to Task</a>
        </form>
    </fieldset>
@endsection
@section('js')
    <script>
        $(function () {
            $("#dueDate").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
            });
        });
    </script>
    {{--<script>
        // $( function() {
        //     $( "#due_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
        // } );
        $('#projectId').on('change', function(){
            // projectId = $('#projectId option:selected').val(); // the dropdown item selected value
            // console.log(projectId);
            // $.ajax({
            //     type :'POST',
            //     dataType:'json',
            //     data : {projectId : projectId},
            //     url : 'ajax/getUserData.php',
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            projectId = $('#projectId option:selected').val(); // the dropdown item selected value
            // console.log(projectId);
                $.ajax({
                url: '{{ url('/projectWiseUsers') }}',
                type: "POST",
                data: {_token: CSRF_TOKEN,projectId : projectId},
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                    $('#userId').html('');
                    $('#userId').append('<option>Assign User</option>');
                    data.success.forEach(function(t) {
                        // $('#item') refers to the EMPTY select list
                        // the .append means add to the object refered to above
                        $('#userId').append('<option value="'+t['id']+'">'+t['name']+' ('+t['designation']+')</option>');
                    });
                }
            })
        });
    </script>--}}
    @endsection
