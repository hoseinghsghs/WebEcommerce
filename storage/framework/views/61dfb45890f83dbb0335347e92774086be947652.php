<!-- adplacement--------------------------->
<div class="container-fluid">
    <div class="row">
        <div class="adplacement-container-row ml-2 my-1">
            <?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-lg-3 p-1 pr">
                <a href="<?php echo e($header->link); ?>" class="adplacement-item m-1 ">
                    <div class="adplacement-sponsored_box">
                        <img src="<?php echo e(url(env('BANNER_IMAGES_PATCH').$header->image)); ?>" alt="<?php echo e($header->title); ?>">
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- adplacement---------------------------><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/partial/Adplacement.blade.php ENDPATH**/ ?>