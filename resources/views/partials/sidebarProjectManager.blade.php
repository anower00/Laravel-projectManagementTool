<?php
$user = session()->get('user');
?>
{{--{{ dd($user->designation) }}--}}
<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        Account
    </h4>
    <a href="{{route('user.resetPassword')}}" class="list-group-item list-group-item-action">Change Password</a>
    <a href="{{route('user.profile')}}" class="list-group-item list-group-item-action">Profile</a>
</div>
@if($user->designation == "Admin")
<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        User List
    </h4>
    <a href="{{route('user.list')}}" class="list-group-item list-group-item-action">User List</a>
    <a href="{{route('user.create')}}" class="list-group-item list-group-item-action">Create User</a>
</div>
@endif
@if($user->designation == "Project Manager")
<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        Project
    </h4>
    <a href="{{route('project.create')}}" class="list-group-item list-group-item-action">Create Project</a>
    <a href="{{route('project.list')}}" class="list-group-item list-group-item-action">View Project</a>
    {{--<a href="#" class="list-group-item list-group-item-action">Upload Project</a>--}}
</div>
@endif
@if($user->designation == "Project Manager")
<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        User
    </h4>
    <a href="{{route('project.assign')}}" class="list-group-item list-group-item-action">Assign Project</a>
</div>
@endif
@if($user->designation != "Admin")
<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        Task
    </h4>
    @if($user->designation == "Project Manager")
    <a href="{{route('task.create')}}" class="list-group-item list-group-item-action">Create Task</a>
    @endif
    <a href="{{route('task.list')}}" class="list-group-item list-group-item-action">All Task</a>
    <a href="{{route('task.myTask')}}" class="list-group-item list-group-item-action">My Task</a>
</div>

{{--<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        Comments
    </h4>
    <a href="{{route('comment.create')}}" class="list-group-item list-group-item-action">Add Comments</a>
    <a href="{{route('comment.list')}}" class="list-group-item list-group-item-action">View Comments</a>
</div>--}}
@endif
@if($user->designation == "Admin" ||$user->designation == "Project Manager")
<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        Project Report
    </h4>
    <a href="{{route('projectReport')}}" class="list-group-item list-group-item-action">project Report</a>
</div>
@endif

