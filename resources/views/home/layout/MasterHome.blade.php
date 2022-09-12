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
</body>

@stack('scripts')
</script>
<script type="text/javascript" src="{{asset('assets/home/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/home/js/vendor/jquery.touchSwipe.min.js')}}"></script>

</html>