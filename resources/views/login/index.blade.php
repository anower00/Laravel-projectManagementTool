<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="text-center"
         style="position: absolute;margin-left:33%;margin-top: 4%;font-family: Helvetica Neue, Helvetica, Arial, sans-serif">
        <h1>Project Management Tool</h1>
    </div>
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post">
                @csrf
					<span class="login100-form-title">
						User Login
					</span>

                <div class="wrap-input100 validate-input" data-validate = "required">
                    <input class="input100" type="text" name="username" placeholder="User Name" value="{{old('username')}}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
                <br>
                <div class="text-color">
                <p class="text-danger" >
                @if(session('message'))
                    {{session('message')}}
                @endif
                </p>
                </div>
                <div>
                    <p class="text-danger" >
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </p>
                </div>

                <div class="text-center p-t-12">
						<span class="txt1">
							PMTTOOL:
						</span>
                    <a class="txt2" href="{{route('ourTeam')}}">
                        OUR TEAM MEMBER
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="#">
                        <i class="" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/tilt/tilt.jquery.min.js')}}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
