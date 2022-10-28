<!doctype html>

<html class="no-js " lang="fa" dir="rtl">

<head>
    <?php echo $__env->make('admin.partial.Head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>

<body class="theme-blush" id="cheack_collapsed">

    <!-- Page Loader -->
    <?php echo $__env->make('admin.partial.PageLoader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Overlay For Sidebars -->
    <div class=" overlay">
    </div>

    <!-- Main Search -->
    <?php echo $__env->make('admin.partial.MainSearch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Right Icon menu Sidebar -->
    <?php echo $__env->make('admin.partial.RightIconSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Left Sidebar -->
    <?php echo $__env->make('admin.partial.LeftSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Sidebar -->
    <?php echo $__env->make('admin.partial.RightSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Main Content -->

    <?php echo $__env->yieldContent('Content'); ?>

    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Jquery Core Js -->
    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
    <script>
    <?php if(session('status')): ?>
    swal({
        text: "<?php echo e(session('status')); ?>",
        icon: 'success',
        button: 'تایید',
        timer: 3000,
        timerProgressBar: true,
    })
    <?php endif; ?>

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
    <script>
    $(document).ready(function() {

        $('#summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough',
                    'clear'
                ]],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ol', 'ul', 'paragraph', 'height']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
            ]
        })
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#summernote2').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough',
                    'clear'
                ]],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ol', 'ul', 'paragraph', 'height']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
            ]
        })
    });
    window.addEventListener('say-sound', event => {
        var audio = new Audio(window.location.origin + '/assets/admin/sound/beep.mp3');
        audio.play();

        $('.notify').css({
            "display": "block"
        });

        $.notify({
            message: "رویداد جدید ثبت شد."
        });

    })
    </script>


    <?php echo app('flasher.response_manager')->render(); ?>

    <?php echo \Livewire\Livewire::scripts(); ?>


    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo app('flasher.livewire_response_manager')->render(); ?>




</body>

</html><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/layout/MasterAdmin.blade.php ENDPATH**/ ?>