<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <?php if(count($banners)===0): ?>
                <p>هیچ رکوردی وجود ندارد</p>
                <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover c_table theme-color">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>تصویر</th>
                                <th>عنوان</th>
                                <th>نوع</th>
                                <th>اولویت</th>
                                <th>وضعیت</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr >
                                <td scope="row"><?php echo e($banners->firstItem() + $key); ?></td>
                                <td><a href="<?php echo e(asset('storage/banners/'.$banner->image)); ?>" data-lightbox="<?php echo e('banner-'.$banner->id); ?>" data-title="<?php echo e($banner->title); ?>"><img class="rounded avatar" src="<?php echo e(asset('storage/banners/'.$banner->image)); ?>" width="55" alt="<?php echo e($banner->title); ?>"></a></td>
                                <td><?php echo e($banner->title); ?></td>
                                <td><?php echo e($banner->type); ?></td>
                                <td><?php echo e($banner->priority); ?></td>
                                <td><?php if($banner->is_active): ?>
                                    <span class="badge badge-success p-2">فعال</span>
                                    <?php else: ?>
                                    <span class="badge badge-warning p-2">غیرفعال</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center js-sweetalert">
                                    <a href="<?php echo e(route('admin.banners.edit',$banner->id)); ?>" wire:loading.attr="disabled" class="btn btn-raised btn-info waves-effect">
                                        <i class="zmdi zmdi-edit"></i>
                                        <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="edit_banner(<?php echo e($banner->id); ?>) "></span>
                                    </a>

                                    <button class="btn btn-raised btn-danger waves-effect" wire:loading.attr="disabled" wire:click="del_banner(<?php echo e($banner->id); ?>)">
                                        <i class="zmdi zmdi-delete"></i>
                                        <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="del_banner(<?php echo e($banner->id); ?>)"></span>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php echo e($banners->onEachSide(1)->links()); ?>

    </div>
</div>
<?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/admin/banners/banner-list.blade.php ENDPATH**/ ?>