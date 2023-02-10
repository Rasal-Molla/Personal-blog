@extends('Backend.master')

@section('content')

<div class="login-form-bg h-100 mt-10">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">

                            <h4 class="text-center">Reset Password</h4>

                            <form class="mt-5 mb-5 login-input" action="" method="" enctype="multipart/form-data">
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
                                    <input name="email" type="email" class="form-control"  placeholder="Enter E-Mail Address" required>
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control"  placeholder="New Password" required>
                                </div>
                                <div class="form-group">
                                    <input name="confirm_password" type="password" class="form-control" placeholder="Confirm Password" required>
                                </div>
                                <button type="submit" class="btn login-form__btn submit w-100">Reset Password</button>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
