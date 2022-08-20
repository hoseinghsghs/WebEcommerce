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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.2/js/lightgallery.js"></script>

    <script>
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

    function delete_product_cart(id) {

        let url =
            window.location.origin +
            "/remove-from-cart" +
            "/" + id;
        Swal.fire({
            text: "آیا مطمئن هستید حذف شود؟",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "بله",
            cancelButtonText: "خیر",
        }).then((result) => {
            if (result.isConfirmed) {
                $.get(url,
                    function(response, status, xyz) {
                        console.log(status);
                        if (status == 'success') {
                            let price = number_format(response);
                            $(".price-total").html(price + ' ' + 'تومان');
                            $("#" + id).remove();
                            $("#shopping-bag-item").html(
                                parseInt($("#shopping-bag-item").html(), 10) - 1
                            );
                            $("#count-cart").html(
                                parseInt($("#count-cart").html(), 10) - 1
                            );

                            Livewire.emit('delete', id);
                        }
                    }).fail(function() {
                    Swal.fire({
                        title: "مشکل",
                        text: " اینترنت شما قطع است",
                        icon: "error",
                        timer: 1500,
                        ConfirmButton: "باشه",

                    });
                })
            } else {

            }
        });
    }
    window.addEventListener('say-goodbye', event => {
        $("#shopping-bag-item").html(
            parseInt($("#shopping-bag-item").html(), 10) - 1
        );
        $("#count-cart").html(
            parseInt($("#count-cart").html(), 10) - 1
        );

        $("#" + event.detail.rowId).remove();

        $(".mini-card-total").remove();

    });
    </script>

    @include('sweetalert::alert')
    @livewireScripts()


</body>

@stack('scripts')
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>


<script>
$(document).ready(function() {

    $(".carousel").carousel({
        interval: false,
        pause: true,
        touch: true
    });

    $(".carousel .carousel-inner").swipe({
        swipeLeft: function(event, direction, distance, duration, fingerCount) {
            this.parent().carousel("next");
        },
        swipeRight: function() {
            this.parent().carousel("prev");
        },
        threshold: 0,
        tap: function(event, target) {
            window.location = $(this).find(".carousel-item.active a").attr("href");
        },
        excludedElements: "label, button, input, select, textarea, .noSwipe"
    });

    $(".carousel .carousel-control-prev").on("click", function() {
        $(".carousel").carousel("prev");
    });

    $(".carousel .carousel-control-next").on("click", function() {
        $(".carousel").carousel("next");
    });

});
</script>


</html>