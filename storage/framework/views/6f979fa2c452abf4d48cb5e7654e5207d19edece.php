<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header d-flex align-items-center">
                <h2><strong>لیست برندها </strong>( <?php echo e($brands->total()); ?> )</h2>
                <a onclick="loadbtn(event)" href="<?php echo e(route('admin.brands.create')); ?>" class="btn btn-raised btn-info waves-effect mr-auto">
                    افزودن برند </a>
            </div>
            <div class="body">
                <?php if(count($brands)===0): ?>
                <p>هیچ رکوردی وجود ندارد</p>
                <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover c_table theme-color">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عکس</th>
                                <th>نام</th>
                                <th>ترتیب</th>
                                <th>وضعیت</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                        </thead>
                        <tbody data-lightbox="image-1" data-title="My caption">
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr wire:key="brand-field-<?php echo e($brand->id); ?>">
                                <td scope="row"><?php echo e($key+1); ?></td>
                                <?php if(Storage::exists('brands/'.$brand->image)): ?>
                                <td>
                                    <a href="<?php echo e(asset('storage/brands/'.$brand->image)); ?>" data-lightbox="brand-<?php echo e($loop->index); ?>" data-title="<?php echo e($brand->name); ?>">
                                        <img src="<?php echo e(asset('storage/brands/'.$brand->image)); ?>" alt="<?php echo e($brand->name); ?>" width="48" class="img-fluid rounded" style="min-height: 3rem;">
                                    </a>
                                </td>
                                <?php endif; ?>
                                <td><?php echo e($brand->name); ?></td>
                                <td><?php echo e($brand->index); ?></td>
                                <td>
                                    <div class="row clearfix">
                                        <div class="col-6">
                                            <?php if($brand->is_active): ?>
                                            <a wire:click="Inactive_brand(<?php echo e($brand->id); ?>)" class="btn btn-raised btn-success waves-effect"><span style="color: white;">منتشر
                                                    شده </span>
                                                <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="Inactive_brand(<?php echo e($brand->id); ?>)"></span>

                                            </a>
                                            <?php else: ?>
                                            <a wire:click="active_brand(<?php echo e($brand->id); ?>)" class="btn btn-raised btn-danger waves-effect"><span style="color: white;">عدم
                                                    انتشار</span>
                                                <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="active_brand(<?php echo e($brand->id); ?>)"></span>
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center js-sweetalert">
                                    <a href="<?php echo e(route('admin.brands.edit',$brand->id)); ?>" class="btn btn-raised btn-info waves-effect" onclick="loadbtn(event)">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <button class="btn btn-raised btn-danger waves-effect" wire:click="delbrand(<?php echo e($brand->id); ?>)">
                                        <i class="zmdi zmdi-delete"></i>
                                        <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="delbrand(<?php echo e($brand->id); ?>)"></span>
                                    </button>
                                    <!-- <form action="<?php echo e(route('admin.brands.destroy',$brand->id)); ?>"
                                            id="del-brand-<?php echo e($brand->id); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form> -->
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <?php echo e($brands->onEachSide(1)->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $("#loading").hide();
        $("#loading1").hide();
        $(document).ajaxStart(function() {
            $("#loading").show();
            $("#loading1").show();
        }).ajaxStop(function() {
            $("#loading").hide();
            $("#loading1").hide();
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/admin/brands/brand-controll.blade.php ENDPATH**/ ?>