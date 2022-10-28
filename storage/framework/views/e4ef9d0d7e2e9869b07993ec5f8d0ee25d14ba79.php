<?php $__env->startSection('title' , 'آدرس ها'); ?>
<?php $__env->startSection('content'); ?><div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    <?php echo $__env->make('home.page.users_profile.partial.right_side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if(!$addresses->count()): ?>
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="profile-address">
                                    <center class="my-5">
                                        <div class="m-3 "> لیست آدرس شما خالی است.
                                        </div>
                                        <a class="btn btn-warning btn-sm  m-3 "
                                            href="<?php echo e(route('home.addreses.create')); ?>">آدرس
                                            جدید</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <a class="btn btn-warning btn-sm mr-5 my-3 " href="<?php echo e(route('home.addreses.create')); ?>">آدرس جدید</a>
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">

                            <div class="profile-address">
                                <div class="box-header">
                                    <span class="box-title">آدرس ها</span>
                                </div>
                                <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="profile-address-item">
                                    <div class="profile-stats m-1 p-3">
                                        <div class="profile-address-item-top">
                                            <div class="profile-address-item-title">
                                                <?php echo e($address->address); ?>

                                            </div>
                                            <div class="ui-more">
                                                <a href="<?php echo e(route('home.addreses.destroy', ['address' => $address->id])); ?>"
                                                    class="btn-remove-address btn btn-danger" type="submit">حذف</a>
                                            </div>
                                        </div>
                                        <div class="profile-address-content">
                                            <ul class="profile-address-info">
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-map-outline"></i>
                                                        <?php echo e(province_name($address->province_id)); ?> ،
                                                        <?php echo e(city_name($address->city_id)); ?>

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-email-outline"></i>
                                                        <?php echo e($address->postal_code); ?>

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-phone"></i>
                                                        <?php echo e($address->cellphone); ?> , <?php echo e($address->cellphone2); ?>

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-account"></i>
                                                        <?php echo e($address->name); ?>

                                                    </div>
                                                </li>
                                                <li class="location-link">
                                                    <a href="<?php echo e(route('home.addreses.edit', ['address' => $address->id])); ?>"
                                                        class="edit-address-link">ویرایش آدرس</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    </hr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php endif; ?>
<?php $__env->startPush('scripts'); ?>
<script>
$('.province-select').change(function() {
    var provinceID = $(this).val();
    if (provinceID) {
        $.ajax({
            type: "GET",
            url: "<?php echo e(url('/get-province-cities-list')); ?>?province_id=" + provinceID,
            success: function(res) {
                if (res) {
                    $(".city-select").empty();
                    $.each(res, function(key, city) {
                        $(".city-select").append('<option value="' + city.id + '">' +
                            city.name + '</option>');
                    });
                } else {
                    $(".city-select").empty();
                }
            }
        });
    } else {
        $(".city-select").empty();
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/users_profile/address.blade.php ENDPATH**/ ?>