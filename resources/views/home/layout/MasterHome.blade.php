<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    @include('home.partial.Head')
    @stack('styles')
    @livewireStyles()
    <style>
    .form1 {
        position: relative;
    }

    .form1 i {
        position: absolute;
        top: 4px;
        left: 10px;
        padding: 7px;
        color: #9ca3af;
        cursor: pointer;
        font-size: 1.2em;
    }

    .form1 span {
        position: absolute;
        right: 0px;
        top: 1px;
        padding: 2px 5px;
        border-left: 1px solid #d1d5db;
    }

    .form1 .left-pan1 select {
        font-size: 14px;
        text-align: center;
    }

    .form1 .left-pan1 select:focus {
        border: none;
        box-shadow: none;
    }

    .form-input {
        height: 44px;
        text-indent: 110px;
        border-radius: 10px;
        font-size: 14px;
    }

    .form-input:focus {
        box-shadow: none;
        border: none;
    }
    </style>
</head>

<body class="container-main-xlg mx-auto">
    @includeUnless(request()->routeIs('login','register'),'home.partial.Header')
    @includeUnless(request()->routeIs('login','register'),'home.partial.Modal')

    @yield('content')

    @includeUnless(request()->routeIs('login','register'),'home.partial.Footer')
    @include('home.partial.Scroll')
    @include('home.partial.Loader')


    <script type="text/javascript" src="{{asset('js/home.js')}}"></script>

    @include('sweetalert::alert')
    @livewireScripts()
    @stack('scripts')

    <!---start GOFTINO code--->
    <script type="text/javascript">
        !function(){var i="REbu0W",a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/"+i,l=localStorage.getItem("goftino_"+i);g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
    </script>
    <!---end GOFTINO code--->

    <script>
    @if(session('status'))
    @if(session('status') == "profile-information-updated")
    Swal.fire({
        text: "حساب کاربری با موفقیت ویرایش شد",
        icon: 'success',
        showConfirmButton: false,
        toast: true,
        position: 'top-right',
        timer: 5000,
        timerProgressBar: true,
    })
    @elseif(session('status') == 'verification-link-sent')
    Swal.fire({
        title: 'لینک ارسال شد',
        text: 'ایمیل خود(اسپم) را بررسی کنید و بر روی لینک تایید ایمیل کلیک کنید.',
        icon: 'success',
        confirmButtonText: 'تایید',
    })
    @elseif(session('status') == 'passwords.reset')
    Swal.fire({
        text: 'رمز عبور با موفقیت ذخیره شد.',
        icon: 'success',
        showConfirmButton: false,
        toast: true,
        position: 'top-right',
        timer: 5000,
        timerProgressBar: true,
    })
    @else
    Swal.fire({
        text: "{{ session('status') }}",
        icon: 'success',
        showConfirmButton: false,
        toast: true,
        position: 'top-right',
        timer: 5000,
        timerProgressBar: true,
    })
    @endif
    @endif
    </script>
    <script type="text/javascript" src="{{asset('assets/home/js/vendor/bootstrap.bundle.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('assets/home/js/vendor/jquery.touchSwipe.min.js')}}"></script>
</body>

</html>
