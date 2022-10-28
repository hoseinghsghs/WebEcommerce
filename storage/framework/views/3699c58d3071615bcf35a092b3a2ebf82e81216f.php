<?php $__env->startSection('title' , 'پروفایل کاربری'); ?>
<?php $__env->startSection('content'); ?>

<!-- profile------------------------------->
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">

                    <?php echo $__env->make('home.page.users_profile.partial.right_side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <table class="table table-profile">
                                    <tbody>
                                        <tr>
                                            <td class="w-50">
                                                <div class="title">نام و نام خانوادگی:</div>
                                                <div class="value"><?php echo e(auth()->user()->name); ?></div>
                                            </td>
                                            <td>
                                                <div class="title">پست الکترونیک :</div>
                                                <div class="value"><?php echo e(auth()->user()->email); ?></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="title">شماره تلفن همراه:</div>
                                                <div class="value"><?php echo e(auth()->user()->cellphone); ?></div>
                                            </td>
                                            <td>
                                                <div class="title">تاریخ عضویت:</div>
                                                <div class="value">
                                                    <?php echo e(Hekmatinasser\Verta\Verta::instance(auth()->user()->created_at)->format('Y/n/j')); ?>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="title"> دریافت خبرنامه :</div>
                                                <div class="value">بله</div>
                                            </td>
                                            <td>
                                                <div class="title"> کد ملی :</div>
                                                <div class="value">-</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="profile">
                                    <ul class="mb-0">
                                        <li class="profile-item">
                                            <div class="title">نام و نام خانوادگی:</div>
                                            <div class="value"><?php echo e(auth()->user()->name); ?></div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="title">پست الکترونیک :</div>
                                            <div class="value"><?php echo e(auth()->user()->email); ?></div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="title">شماره تلفن همراه:</div>
                                            <div class="value"><?php echo e(auth()->user()->cellphone); ?>1</div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="title">تاریخ عضویت:</div>
                                            <div class="value">
                                                <?php echo e(Hekmatinasser\Verta\Verta::instance(auth()->user()->created_at)->format('Y/n/j')); ?>

                                            </div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="title"> دریافت خبرنامه :</div>
                                            <div class="value">بله</div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="title"> کد ملی :</div>
                                            <div class="value">-</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="profile-edit-action">
                                    <a href="<?php echo e(route('home.user_profile.edit')); ?>"
                                        class="link-spoiler-edit btn btn-secondary">ویرایش اطلاعات</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- profile------------------------------->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/users_profile/index.blade.php ENDPATH**/ ?>