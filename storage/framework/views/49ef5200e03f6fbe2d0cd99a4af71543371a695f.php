<?php $__env->startSection('title','مشاهده کاربر'); ?>
<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>نمایش کاربر</h2>
                    <br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);"><a href=<?php echo e(route('admin.users.index')); ?>>لیست کاربران</a></li>
                        <li class="breadcrumb-item active">نمایش کاربر</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>مشخصات </strong>کاربر</h2>
                        </div>
                        <div class="body row">
                            <div class="col-sm-4">
                                <div class="blogitem">
                                    <div class="blogitem-image">
                                        <a class="text-center" href="<?php echo e($user->avatar ? asset('storage/profile/'.$user->avatar) : asset('img/profile.png')); ?>" target="_blank">
                                            <img class="img-fluid img-thumbnail w200" src="<?php echo e($user->avatar ? asset('storage/profile/'.$user->avatar) : asset('img/profile.png')); ?>">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group col-sm-8">
                                <button type="button" class="list-group-item list-group-item-action">
                                    <div class="row clearfix">
                                        <div class="col-6"><strong>نام کاربر:</strong></div>
                                        <div class="col-6"><?php echo e($user->name); ?></div>
                                    </div>
                                </button>
                                <button type="button" class="list-group-item list-group-item-action">
                                    <div class="row clearfix">
                                        <div class="col-6"><strong>ایمیل:</strong></div>
                                        <div class="col-6"><?php echo e($user->email); ?></div>
                                    </div>
                                </button>
                                <button type="button" class="list-group-item list-group-item-action">
                                    <div class="row clearfix">
                                        <div class="col-6"><strong>موبایل:</strong></div>
                                        <div class="col-6"><?php echo e($user->cellphone); ?></div>
                                    </div>
                                </button>

                                <button type="button" class="list-group-item list-group-item-action">
                                    <div class="row clearfix">
                                        <div class="col-6"><strong>تاریخ ایجاد حساب:</strong></div>
                                        <div class="col-6"><?php echo e(verta($user->created_at)->format('H:i Y/n/j')); ?></div>
                                    </div>
                                </button>
                                <button type="button" class="list-group-item list-group-item-action">
                                    <div class="row clearfix">
                                        <div class="col-6"><strong>تاریخ آخرین بروزرسانی:</strong></div>
                                        <div class="col-6"><?php echo e(verta($user->updated_at)->format('H:i Y/n/j')); ?></div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>لیست </strong>سفارشات</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover c_table theme-color">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>شماره سفارش</th>
                                        <th>تاریخ ثبت سفارش</th>
                                        <th>وضعیت</th>
                                        <th> مجموع<span>(تومان)</span></th>
                                        <th class="text-center">جزئیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td scope="row"><?php echo e($orders->firstItem() + $key); ?></td>
                                        <td><?php echo e($order->id); ?></td>
                                        <td><?php echo e(verta($order->created_at)->format('Y/n/j')); ?></td>
                                        <td class="<?php echo e($order->status == 'در انتظار پرداخت' ? 'text-primary' : 'text-success'); ?>">
                                            <?php echo e($order->status); ?>

                                        </td>
                                        <td><?php echo e(number_format($order->paying_amount)); ?></td>
                                        <td class="text-center js-sweetalert">
                                            <a onclick="loadbtn(event)" href="<?php echo e(route('admin.orders.show',$order->id)); ?>" class="btn btn-raised btn-info waves-effect">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6">
                                            <p class="text-center text-muted">هیچ رکوردی یافت نشد!</p>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <?php echo e($orders->onEachSide(1)->links()); ?>

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>لیست </strong>نظرات</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover c_table theme-color">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام محصول</th>
                                        <th>متن</th>
                                        <th>وضعیت</th>
                                        <th>تاریخ ثبت</th>
                                        <th class="text-center">جزئیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td scope="row"><?php echo e($comments->firstItem() + $key); ?></td>
                                        <td><?php echo e($comment->commentable->name); ?></td>
                                        <td>
                                            <p class="text-overflow"><?php echo $comment->text; ?></p>
                                        </td>
                                        <td>
                                            <?php if($comment->approved==1): ?>
                                            <span class="badge badge-success">تایید شده</span>
                                            <?php else: ?>
                                            <span class="badge badge-warning">تایید نشده</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(verta($comment->created_at)->format('Y/n/j')); ?></td>
                                        <td class="text-center js-sweetalert">
                                            <a onclick="loadbtn(event)" href="<?php echo e(route('admin.comments.edit',$comment->id)); ?>" class="btn btn-raised btn-info waves-effect">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6">
                                            <p class="text-center text-muted">هیچ رکوردی یافت نشد!</p>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <?php echo e($comments->onEachSide(1)->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/users/show.blade.php ENDPATH**/ ?>