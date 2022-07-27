<!doctype html>

<html class="no-js " lang="fa" dir="rtl">

<head>
    @include('admin.partial.Head')
    @stack('styles')
    @livewireStyles()
</head>

<body class="theme-blush" id="cheack_collapsed">

    <!-- Page Loader -->
    @include('admin.partial.PageLoader')
    <!-- Overlay For Sidebars -->
    <div class=" overlay">
    </div>

    <!-- Main Search -->
    @include('admin.partial.MainSearch')
    <!-- Right Icon menu Sidebar -->
    @include('admin.partial.RightIconSidebar')

    <!-- Left Sidebar -->
    @include('admin.partial.LeftSidebar')

    <!-- Right Sidebar -->
    @include('admin.partial.RightSidebar')
    <!-- Main Content -->

    @yield('Content')

    @include('sweetalert::alert')
    <!-- Jquery Core Js -->
    <script src="{{asset('js/admin.js')}}"></script>
    <script>
        @if(session('status'))
        swal({
            text: "{{ session('status') }}",
            icon: 'success',
            button: 'تایید',
            timer: 3000,
            timerProgressBar: true,
        })
        @endif

        function number_format(number, decimals, dec_point, thousands_sep) {
            // Strip all characters but numerical ones.
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
    </script>


    @flasher_render()

    @livewireScripts()

    @stack('scripts')

    @flasher_livewire_render




</body>

</html>
