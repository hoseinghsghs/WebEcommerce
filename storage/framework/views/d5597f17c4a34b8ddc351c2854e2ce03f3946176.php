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
                                <div class="table-orders">
                                    <?php if($orders->isEmpty()): ?>
                                    <div class="cart-empty text-center d-block p-5">
                                        <p class="cart-empty-title">لیست سفارشات خالی است</p>
                                        <div class="return-to-shop">
                                            <a href="<?php echo e(route('home')); ?>" class="backward btn btn-warning">بازگشت
                                                به
                                                خانه</a>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <table class="table table-profile-orders">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">شماره سفارش</th>
                                                <th scope="col">تاریخ ثبت سفارش</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">مجموع</th>
                                                <th scope="col">جزئیات</th>
                                            </tr>
                                            <tr style="border-top:solid 1px #dddddd;"></tr>
                                        </thead>

                                        <tbody>

                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td class="order-code"><?php echo e($order->id); ?></td>
                                                <td> <?php echo e(Hekmatinasser\Verta\Verta::instance($order->created_at)->format('Y/n/j')); ?>

                                                </td>
                                                <td
                                                    class="<?php echo e($order->status == 'در انتظار پرداخت' ? 'text-primary' : 'text-success'); ?>">
                                                    <?php echo e($order->status); ?>

                                                </td>
                                                <td class="totla">
                                                    <span class="amount"><?php echo e(number_format($order->paying_amount)); ?>

                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                                <td class="detail"><a
                                                        href="<?php echo e(route('home.user_profile.orders',['order' => $order->id])); ?>"
                                                        class="btn btn-secondary d-block">نمایش</a></td>

                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <?php endif; ?>
                                    <div class="profile-orders">
                                        <div class="collapse">
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="profile-orders-item">
                                                <div class="profile-orders-header">
                                                    <!-- <hr class="ui-separator"> -->
                                                    <div class="profile-orders-header-data">
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-label">شماره سفارش</div>
                                                                    <div class="profile-info-value"><?php echo e($order->id); ?></div>
                                                                </div>
                                                                <div class="profile-info-label">وضعیت</div>
                                                                <div
                                                                    class="profile-info-value <?php echo e($order->status == 'در انتظار پرداخت' ? 'text-primary' : 'text-success'); ?>">
                                                                    <?php echo e($order->status); ?>

                                                                </div>
                                                            </div>

                                                            <div class="profile-info-label">تاریخ ثبت سفارش</div>
                                                            <div class="profile-info-value">
                                                                <?php echo e(Hekmatinasser\Verta\Verta::instance($order->created_at)->format('Y/n/j')); ?>

                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-label">مبلغ کل</div>
                                                            <div class="profile-info-value">
                                                                <span
                                                                    class="amount"><?php echo e(number_format($order->paying_amount)); ?>

                                                                    <span>تومان</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <a href="<?php echo e(route('home.user_profile.orders',['order' => $order->id])); ?>"
                                                            class="profile-orders-header-details">
                                                            <div class="profile-orders-header-summary">
                                                                <div class="profile-orders-header-row">
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            </br>
                                            </hr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/users_profile/order/orderList.blade.php ENDPATH**/ ?>