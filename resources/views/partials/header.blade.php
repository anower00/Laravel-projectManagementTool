<?php
 $user = session()->get('user');
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('user')}}"><h1>PROJECT Management</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            {{--<input class="form-control mr-sm-2" type="search" placeholder="User Search" aria-label="Search">--}}
        </ul>
        <form class="form-inline my-2 my-lg-0">
            @csrf
            <h4 class="admin">{{ $user->name }}</h4>
            <a href="{{route('logout')}}">
                <button type="button" class="btn btn-outline-danger">logout</button></a>
        </form>
    </div>
</nav>
