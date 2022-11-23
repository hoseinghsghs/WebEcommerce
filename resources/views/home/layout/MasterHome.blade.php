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
        padding: 10px;
        color: #9ca3af;
        cursor: pointer;
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
    @flasher_livewire_render
    @stack('scripts')

    <script type="text/javascript">
        window.RAYCHAT_TOKEN = "cedac5cd-4b19-488d-b7a8-be5ab3dffa8d";
        (function () {
            d = document;
            s = d.createElement("script");
            s.src = "https://widget-react.raychat.io/install/widget.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>

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
