@extends('layouts.masterProjectManager')
@section('content')
    <fieldset>
        <legend><b>ADD PROJECT</b></legend>
        <br/>
        <form method="post" enctype="multipart/form-data">
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
                    <td>Project Name</td>
                    <td>:</td>
                    <td><input name="projectName" type="text" value="{{old('projectName')}}"></td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td>
                        <textarea cols="30" role="5" name="description" value="{{old('description')}}"></textarea>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td valign="top">Possible Start Date</td>
                    <td valign="top">:</td>
                    <td>
                        <input name="startDate" type="text" value="{{old('startDate')}}" id="startDate" onchange="dateDifference()">
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td valign="top">Possible End Date</td>
                    <td valign="top">:</td>
                    <td>
                        <input name="endDate" type="text" id="endDate" onchange="dateDifference()">
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Duration(Days)</td>
                    <td>:</td>
                    <td><input name="duration" type="text" id="duration"> </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Upload Documents</td>
                    <td>:</td>
                    <td><input type="file" name="uploadDocument" id="uploadDocument" value="{{old('uploadDocument')}}"></td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="status" value="Not Started">Not Started<br>
                        <input type="radio" name="status" value="Started">Started<br>
                        <input type="radio" name="status" value="Completed">Completed<br>
                        <input type="radio" name="status" value="Cancelled">Cancelled<br>
                    </td>
                    <td></td>
                </tr>
            </table>
            <hr />
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{route('project.list')}}" type="button" class="btn btn-primary">Back to All Project</a>
        </form>
    </fieldset>
    @endsection
@section('js')
    <script>
        $(function () {
            $("#startDate").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
            });
            $("#endDate").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
            });
        });
        function dateDifference() {
            var startDate = $('#startDate').val();
            console.log(startDate);
            var endDate = $('#endDate').val();
            console.log(endDate);
            var date1 = new Date(startDate);
            console.log(date1);
            var date2 = new Date(endDate);
            console.log(date2);
            var diffDays = date2.getDate() - date1.getDate();
            if (date2<date1){
                $('#duration').val('');
                alert('End Date should be greater than start date.');
            }else if(startDate !='' && endDate !='' )
            {
                $('#duration').val(diffDays);
            }
        }


    </script>
    @endsection
