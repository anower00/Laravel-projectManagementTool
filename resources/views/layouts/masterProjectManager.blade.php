<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Management Tool For Managing Software Project.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href="{{asset('css/style.css')}}" type='text/css'>
    <link href="{{'https://fonts.googleapis.com/css?family=Raleway:100,400'}}" rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.css')}}">
</head>
<body>
<section id="main_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('partials.header')
            </div>
        </div>

        <div class="row center">
            <div class="col-md-4">
                @include('partials.sidebarProjectManager')
            </div>
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                @include('partials.footer')
            </div>
        </div>
    </div>
</section>
{{--<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>--}}
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}" crossorigin="anonymous"></script>

<!---- start-smoth-scrolling---->
<script type="text/javascript" src="{!! asset('js/move-top.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/easing.js') !!}"></script>
<script src="{!! asset('vendor/jquery-ui-1.12.1/jquery-ui.js') !!}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
@yield('js')
<!--start-smoth-scrolling-->
</body>
</html>
