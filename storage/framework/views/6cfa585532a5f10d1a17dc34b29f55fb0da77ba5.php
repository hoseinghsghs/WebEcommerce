<?php $__env->startSection('title','لیست نقش ها'); ?>

<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست نقش ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">نقش ها</a></li>
                        <li class="breadcrumb-item active">لیست نقش ها</li>
                    </ul>
                    </br>
                    <a onclick="loadbtn(event)" href="<?php echo e(route('admin.roles.create')); ?>" class="btn btn-raised btn-info waves-effect">
                        افزودن<i class="zmdi zmdi-plus mr-1 align-middle"></i></a>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <?php if(count($roles)===0): ?>
                            <p>هیچ رکوردی وجود ندارد</p>
                            <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover c_table theme-color">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>نام نمایشی</th>
                                            <th>نام</th>
                                            <th class="text-center">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td scope="row"><?php echo e($roles->firstItem() + $key); ?></td>
                                            <td><?php echo e($role->display_name); ?></td>
                                            <td><?php echo e($role->name); ?></td>
                                            <td class="text-center js-sweetalert">
                                                <a href="<?php echo e(route('admin.roles.edit',$role->id)); ?>" class="btn btn-raised btn-info waves-effect" onclick="loadbtn(event)">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <button class="btn btn-raised btn-danger waves-effect" data-type="confirm" data-form-id="del-role-<?php echo e($role->id); ?>"><i class="zmdi zmdi-delete"></i></button>
                                                <form action="<?php echo e(route('admin.roles.destroy',$role->id)); ?>" id="del-role-<?php echo e($role->id); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php echo e($roles->onEachSide(1)->links()); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/roles/index.blade.php ENDPATH**/ ?>