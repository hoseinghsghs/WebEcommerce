<?php $__env->startSection('title','تماس با ما'); ?>

<?php $__env->startSection('content'); ?>
<!-- contact-us---------------------------->
<div class="container-main">
    <div class="col-12">
        <div id="content">
            <div class="contact-us">
                <div class="col-lg-9 col-md-9 col-xs-12 mx-auto">
                    <div class="contact-us-section">
                        <?php if(isset($setting->description)): ?>
                        <div class="box-header">
                            <span class="box-title">درباره ما</span>
                        </div>
                        <div class="contact-us-row">
                            <p><?php echo e($setting->description); ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="box-header">
                            <span class="box-title">اطلاعات <?php echo e($setting->title); ?></span>
                        </div>
                        <div class="contact-us-row">
                            <div class="contact-us-address-container">
                                <div class="contact-us-address-header">
                                    دفتر مرکزی
                                </div>
                                <div class="contact-us-address-text">
                                    <i class="fa fa-map-marker fa-2x text-danger">

                                    </i>
                                    <?php echo e($setting->address); ?>

                                </div>
                                <div class="contact-us-address-header">
                                    شماره تماس
                                </div>
                                <?php if(json_decode($setting->phones) != null && json_decode($setting->phones) != []): ?>
                                <div class="contact-us-address-text">
                                    <i class="fa fa-phone fa-2x text-danger"></i>
                                    <?php $__currentLoopData = json_decode($setting->phones); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="tel:<?php echo e($phone); ?>"><?php echo e($phone); ?></a><?php echo e($loop->last ? '' : ' - '); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php endif; ?>
                                <div class="contact-us-address-header">
                                    ایمیل سازمانی
                                </div>
                                <i class="fa fa fa-envelope-o fa-2x text-danger"></i>
                                <?php if(json_decode($setting->emails) != null && json_decode($setting->emails) != []): ?>
                                <div class="contact-us-address-text d-inline-block">
                                    <?php $__currentLoopData = json_decode($setting->emails); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a><?php echo e($loop->last ? '' : ' - '); ?>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- contact-us---------------------------->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/contact-us.blade.php ENDPATH**/ ?>