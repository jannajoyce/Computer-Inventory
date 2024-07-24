<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap') }}">
</head>
<body class="bg-gradient-primary" style="background: var(--bs-body-color); height: 540px;">
<div class="container">
    <div class="row justify-content-center" style="margin-bottom: 0px; margin-top: 216px;">
        <div class="col-md-9 col-lg-12 col-xl-10" style="padding-bottom: initial;">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-register-image" style="background-image: url{{ ('/avatars/clipboard-image.png') }}">
                                <img src="{{ asset('img/clipboard-image.png') }}" style="margin-right: 0px; margin-left: 31px; width: 480px; margin-bottom: 0px; margin-top: 2px; padding-right: 7px;">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5" style="margin-top: initial;">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4" style="color: rgb(135, 135, 150); margin-bottom: 24px; margin-top: 5px;">Create an Account</h4>
                                </div>
                                <form class="user" action="{{ route('register') }}" method="POST" style="margin-top: 0px; margin-bottom: 0px; padding-top: 3px;">
                                    @csrf
                                    <div class="mb-3">
                                        <input class="form-control form-control-user" type="text" id="name" aria-describedby="nameHelp" placeholder="Full Name" name="name" value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password" required>
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control form-control-user" type="password" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required>
                                    </div>
                                    <button class="btn btn-primary d-block btn-user w-100" type="submit" style="background: rgb(0, 0, 128);">Register Account</button>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}" style="color: navy;">Already have an account? Login</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}" style="color: navy;">Forgot Password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bs-init.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
</body>
</html>
