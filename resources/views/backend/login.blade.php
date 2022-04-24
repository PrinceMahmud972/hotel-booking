<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="{{ asset('1.png') }}" rel="icon" />
        <title>AmiratHotel - Login</title>
        <link href="{{ asset('backend/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/ruang-admin.min.css') }}" rel="stylesheet" />
    </head>

    <body class="bg-gradient-login">
        <!-- Login Content -->
        <div class="container-login">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card shadow-sm my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Amirat Hotel Login Form</h1>
                                        </div>
                                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email Address" />
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" />
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                                    <input type="checkbox" name="remeberme" class="custom-control-input" id="customCheck" />
                                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                        <hr />
                                        {{-- <div class="text-center">
                                            <a class="font-weight-bold small" href="{{ route('register') }}">Create an Account!</a>
                                        </div> --}}
                                        <div class="text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Content -->
        <script src="{{ asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/ruang-admin.min.js') }}"></script>
    </body>
</html>
