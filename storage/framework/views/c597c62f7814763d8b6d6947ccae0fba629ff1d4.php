<?php $__env->startSection('title', __('Not Found')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-main">
    <div class="col-12">
        <div id="content">
            <div class="d-404">
                <div class="d-404-title">
                    <h1>صفحه‌ای که دنبال آن بودید پیدا نشد!</h1>
                </div>
                <div class="d-404-actions">
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">صفحه اصلی</a>
                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary btn-rounded btn-icon-left"><i
                            class="w-icon-long-arrow-right"></i>بازگشت به صفحه قبل</a>
                </div>
                <div class="d-404-image">
                    <img src="/assets/home/images/404.png">
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/errors/404.blade.php ENDPATH**/ ?>