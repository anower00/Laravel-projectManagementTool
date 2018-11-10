<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        Account
    </h4>
    <a href="changepassword.php" class="list-group-item list-group-item-action">Change Password</a>
    <a href="profile.php" class="list-group-item list-group-item-action">Profile</a>
</div>

<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        Project
    </h4>
    <a href="{{route('project.create')}}" class="list-group-item list-group-item-action">Create Project</a>
    <a href="{{route('project.list')}}" class="list-group-item list-group-item-action">View Project</a>
    <a href="#" class="list-group-item list-group-item-action">Upload Project</a>
</div>

<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        User
    </h4>
    <a href="{{route('project.assign')}}" class="list-group-item list-group-item-action">Assign User</a>
</div>

<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        Task
    </h4>
    <a href="{{route('project.addTask')}}" class="list-group-item list-group-item-action">Add Task</a>
    <a href="{{route('taskList')}}" class="list-group-item list-group-item-action">View Task</a>
</div>

<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        Comments
    </h4>
    <a href="{{route('addComment')}}" class="list-group-item list-group-item-action">Add Comments</a>
    <a href="{{route('commentList')}}" class="list-group-item list-group-item-action">View Comments</a>
</div>

<div class="list-group">
    <h4 class="list-group-item list-group-item-action active">
        Project Report
    </h4>
    <a href="{{route('projectReport')}}" class="list-group-item list-group-item-action">project Report</a>
    <a href="bardiagram.php" class="list-group-item list-group-item-action">Bar Diagram</a>
</div>

