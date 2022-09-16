<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    @include('home.partial.Head')
    @stack('styles')
    @livewireStyles()
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

    @if (request()->session()->has('message'))
    <script>
        // show message if exist
        Swal.fire({
            text: "{{session('message.text')}}",
            icon: "{{session('message.type')}}",
            showConfirmButton: false,
            toast: true,
            position: 'top-right',
            timer: 5000,
            timerProgressBar: true,
        });
    </script>
    @endif
    <script type="text/javascript" src="{{asset('assets/home/js/vendor/bootstrap.bundle.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('assets/home/js/vendor/jquery.touchSwipe.min.js')}}"></script>
</body>

</html>