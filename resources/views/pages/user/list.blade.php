@extends('layouts.masterProjectManager')

@section('content')
    <fieldset>
        <div class="text-color">
            <h2 class="text-success" >
                @if(session('message'))
                    {{session('message')}}
                @endif
            </h2>
        </div>
        <legend>
            <b>USER | SEARCH</b>
        </legend>
        <form action="{{ url('searchUser') }}" method="post">
            @csrf
        Filter By
        <select name="category">
            <option value="name">Name</option>
            <option value="email">Email</option>
            <option value="designation">Designation</option>
            <option value="status">Status</option>
        </select>
        <input type="text" name="search_query" />
        <input type="submit" value="Search" />
        </form>
    </fieldset>

    <br/>
    <table width="100%" cellspacing="0" border="1" cellpadding="5">
        <tr>
            <th align="left">NAME</th>
            <th align="left">EMAIL</th>
            <th align="left">DESIGNATION</th>
            <th align="left">STATUS</th>
            <th colspan="3">OPTION</th>
        </tr>
        <tr>
        @foreach($userlist as $user)
            @if($user->designation != 'Admin')

            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->designation}}</td>
            <td>{{$user->status}}</td>
            <td width="40"><a href="{{route('user.details' , ['id' => $user->id])}}">Detail</a></td>
            <td width="30"><a href="{{route('user.edit' , ['id' => $user->id])}}">Edit</a></td>
            <td width="45"><a href="{{route('user.delete' , ['id' => $user->id])}}" onclick="{{'deleteUserModal('. $user->id .',event)'}}">Delete</a></td>
        </tr>
        @endif
            @endforeach
    </table>
    <div id="deleteModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-body">
                    Are you Sure want to delete!?
                </div>
                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div>

@endsection
@section('js')
    <script>
        function deleteUserModal(user_id,event) {
            event.preventDefault();
            $('#deleteModal').modal('show');
            $('#deleteModal .modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button onclick="deleteUser('+user_id+',event)" class="btn badge-danger">Delete</button>')
        }
        function deleteUser(user_id,event) {
            event.preventDefault();
            $.ajax({
                type:'get',
                dataType:'json',
                // data:{id:user_id},
                url:'/ProjectManagement/public/pages/user/destroy/'+user_id,
                success:function (data) {
                    console.log(data);
                    alert(data.msg);
                    $('#user-row_'+user_id).remove();
                    $('#deleteModal').modal('hide');

                    location.reload();
                },
                error:function (data) {
                    alert(data);

                }
            })
        }
    </script>
@endsection
