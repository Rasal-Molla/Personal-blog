
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registration</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{url('/Backend/css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">

                                <h4 class="text-center">Registration</h4>

                                <form class="mt-5 mb-5 login-input" action="{{route('admin.info')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger">{{$error}}</p>
                                        @endforeach
                                    @endif

                                    @if (session()->has('message'))
                                        <p class="alert alert-success">{{session()->get('message')}}</p>
                                    @endif

                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control"  placeholder="Name" value="{{old('name')}}" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control"  placeholder="Email" value="{{old('email')}}" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="phone" type="text" class="form-control"  placeholder="Phone" value="{{old('phone')}}" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Password" value="{{old('password')}}" required>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Sign Up</button>
                                </form>
                                    <p class="mt-5 login-form__footer">Have account? <a href="{{route('admin.login')}}" class="text-primary">Sign In </a> now</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{url('/Backend/plugins/common/common.min.js')}}"></script>
    <script src="{{url('/Backend/js/custom.min.js')}}"></script>
    <script src="{{url('/Backend/js/settings.js')}}"></script>
    <script src="{{url('/Backend/js/gleek.js')}}"></script>
    <script src="{{url('/Backend/js/styleSwitcher.js')}}"></script>
</body>
</html>





