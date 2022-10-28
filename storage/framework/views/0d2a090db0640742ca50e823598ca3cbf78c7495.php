<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست پست ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item active">لیست پست ها</li>
                    </ul>
                    </br>
                    <a onclick="loadbtn(event)" href="<?php echo e(route('admin.posts.create')); ?>"
                        class="btn btn-raised btn-info waves-effect">
                        افزودن پست </a>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <?php if(count($posts)===0): ?>
                            <p>هیچ رکوردی وجود ندارد</p>
                            <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>نوشته توسط</th>
                                            <th>تاریخ</th>
                                            <th class="ml-1">وضعیت</th>
                                            <th class="text-center">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td scope="row"><?php echo e($key+1); ?></td>
                                            <td><?php echo e($post->title); ?></td>
                                            <td><?php echo e($post->user->name); ?></td>
                                            <td><?php echo e(Hekmatinasser\Verta\Verta::instance($post->created_at)->format('Y/n/j')); ?>

                                            </td>
                                            <td>
                                                <?php if($post->status): ?>
                                                <i class="icon-ok icon-2x" style="color: green;"></i>
                                                <?php else: ?>
                                                <i class="icon-remove icon-2x" style="color: red;"></i>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center js-sweetalert">
                                                <a href="<?php echo e(route('admin.posts.edit',$post->id)); ?>"
                                                    class="btn btn-raised btn-info waves-effect"
                                                    onclick="loadbtn(event)">
                                                    ویرایش
                                                </a>

                                                <form action="<?php echo e(route('admin.posts.destroy',$post->id)); ?>"
                                                    id="del-post-<?php echo e($post->id); ?>" method="POST">
                                                    <button class="btn btn-raised btn-danger waves-effect"
                                                        data-type="confirm"
                                                        data-form-id="del-post-<?php echo e($post->id); ?>">حذف</button>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($posts->onEachSide(1)->links()); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/posts/index.blade.php ENDPATH**/ ?>