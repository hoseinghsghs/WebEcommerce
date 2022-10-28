<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <?php echo $__env->make('home.partial.Head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

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

<body>
    <?php echo $__env->renderUnless(request()->routeIs('login','register'),'home.partial.Header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
    <?php echo $__env->renderUnless(request()->routeIs('login','register'),'home.partial.Modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->renderUnless(request()->routeIs('login','register'),'home.partial.Footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
    <?php echo $__env->make('home.partial.Scroll', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('home.partial.Loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript" src="<?php echo e(asset('js/home.js')); ?>"></script>

    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php echo app('flasher.livewire_response_manager')->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>

    <script>
    <?php if(session('status')): ?>
    <?php if(session('status') == "profile-information-updated"): ?>
    Swal.fire({
        text: "حساب کاربری با موفقیت ویرایش شد",
        icon: 'success',
        showConfirmButton: false,
        toast: true,
        position: 'top-right',
        timer: 5000,
        timerProgressBar: true,
    })
    <?php elseif(session('status') == 'verification-link-sent'): ?>
    Swal.fire({
        title: 'لینک تایید ارسال شد',
        text: 'ایمیل خود را باز کنید و روی لینک تایید ایمیل کلیک کنید.',
        icon: 'success',
        confirmButtonText: 'تایید',
    })
    <?php elseif(session('status') == 'passwords.reset'): ?>
    Swal.fire({
        text: 'رمز عبور با موفقیت ذخیره شد.',
        icon: 'success',
        showConfirmButton: false,
        toast: true,
        position: 'top-right',
        timer: 5000,
        timerProgressBar: true,
    })
    <?php else: ?>
    Swal.fire({
        text: "<?php echo e(session('status')); ?>",
        icon: 'success',
        showConfirmButton: false,
        toast: true,
        position: 'top-right',
        timer: 5000,
        timerProgressBar: true,
    })
    <?php endif; ?>
    <?php endif; ?>
    </script>
    <script type="text/javascript" src="<?php echo e(asset('assets/home/js/vendor/bootstrap.bundle.min.js')); ?>">
    </script>
    <script type="text/javascript" src="<?php echo e(asset('assets/home/js/vendor/jquery.touchSwipe.min.js')); ?>"></script>
</body>

</html><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/layout/MasterHome.blade.php ENDPATH**/ ?>