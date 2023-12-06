@extends('layouts.app')
@section('title')
    Halaman Login
@endsection
@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('assets/media/photos/photo34@2x.jpg');">
        <div class="row mx-0 bg-black-op">
            <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                <div class="p-30 invisible" data-toggle="appear">
                    <p class="font-size-h3 font-w600 text-white">
                        Get Inspired and Create with Creative PRS.
                    </p>
                    <p class="font-italic text-white-op">
                        Copyright &copy; <span class="js-year-copy"></span>
                    </p>
                </div>
            </div>
            <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                <div class="content content-full">
                    <!-- Header -->
                    <div class="px-30 py-10">
                        <a class="link-effect font-w700" href="/">
                            <i class="si si-fire"></i>
                            <span class="font-size-xl text-primary-dark">code</span><span class="font-size-xl">base</span>
                        </a>
                        <h1 class="h3 font-w700 mt-30 mb-10">Welcome to Your Dashboard</h1>
                        <h2 class="h5 font-w400 text-muted mb-0">Please sign in</h2>
                    </div>
                    <!-- END Header -->

                    <!-- Sign In Form -->
                    <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form class="js-validation-signin px-30" action="" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="text" class="form-control" id="username" name="username">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me">
                                    <label class="custom-control-label" for="login-remember-me">Remember Me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                <i class="si si-login mr-10"></i> Sign In
                            </button>
                            <div class="mt-30">
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="/register">
                                    <i class="fa fa-plus mr-5"></i> Create Account
                                </a>
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="op_auth_reminder2.html">
                                    <i class="fa fa-warning mr-5"></i> Forgot Password
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- END Sign In Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
@section('additional-scripts')
    <script>
        $(document).ready(function() {
            // Memeriksa cookie dan mengisi formulir jika ada
            var rememberMe = Cookies.get('rememberMe');
            var username = Cookies.get('username');
            var password = Cookies.get('password');

            if (rememberMe && username && password) {
                $('#username').val(username);
                $('#password').val(password);
                $('#login-remember-me').prop('checked', true);
            }

            // Menangani klik tombol "Sign In"
            $(".js-validation-signin").on("submit", function() {
                // Simpan nilai checkbox "Remember Me" ke cookie jika dicentang
                if ($('#login-remember-me').is(':checked')) {
                    var enteredUsername = $('#username').val();
                    var enteredPassword = $('#password').val();
                    Cookies.set('rememberMe', true, {
                        expires: 7
                    }); // Cookie berlaku selama 7 hari
                    Cookies.set('username', enteredUsername, {
                        expires: 7
                    });
                    Cookies.set('password', enteredPassword, {
                        expires: 7
                    });
                } else {
                    // Hapus cookie jika checkbox tidak dicentang
                    Cookies.remove('rememberMe');
                    Cookies.remove('username');
                    Cookies.remove('password');
                }
            });
        });
    </script>
@endsection
