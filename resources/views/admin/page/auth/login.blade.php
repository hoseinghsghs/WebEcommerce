<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>ورود</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="/css/admin.css">

</head>

<body class="theme-blush">

    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form id="form_validation" novalidate="novalidate" class="card auth_form" action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="header">
                            @isset($setting->logo)
                            <img class="logo" src="{{asset('storage/'.$setting->logo)}}" alt="logo">
                            @endisset
                            <h5>ورود</h5>
                        </div>
                        <div class="body text-right">
                            <label>نام کاربری:</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="ایمیل یا شماره همراه" value="{{old('username')}}" required />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                                @error('username')
                                <div class="invalid-feedback text-right">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <label>رمز عبور:</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><a href="forgot-password.html" class="forgot" title="فراموشی رمز عبور"><i class="zmdi zmdi-lock"></i></a></span>
                                </div>
                                @error('password')
                                <div class="invalid-feedback text-right">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="checkbox">
                                <input id="remember_me" type="checkbox" name="remember">
                                <label for="remember_me">مرا به خاطر بسپار</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">ورود</button>
                            <div class="signin_with mt-3">
                                <p class="mb-0">یا ثبت نام با استفاده از</p>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i class="zmdi zmdi-facebook"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i class="zmdi zmdi-twitter"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i class="zmdi zmdi-google-plus"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="copyright text-center">
                        &copy;
                        {{verta()->year}},
                        <span>طراحی و توسعه توسط <a href="https://meta-webs.ir" target="_blank">Meta-Web</a></span>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="/assets/admin/images/signin.svg" alt="Sign In" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="/js/admin.js"></script>
    <!-- Lib Scripts Plugin Js -->
</body>

</html>
