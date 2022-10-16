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
            top: 8px;
            left: 10px;
            padding: 10px;
            color: #9ca3af;
            cursor: pointer;
        }
        .form1 span {
            position: absolute;
            right: 0px;
            top: 7px;
            padding: 2px 0px;
            border-left: 1px solid #d1d5db;
        }
        .form-input {
            height: 55px;
            text-indent: 120px;
            border-radius: 10px;
        }
        .form-input:focus {
            box-shadow: none;
            border: none;
        }
    </style>
</head>

<body>
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
            title: 'لینک تایید ارسال شد',
            text: 'ایمیل خود را باز کنید و روی لینک تایید ایمیل کلیک کنید.',
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
