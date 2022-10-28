<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong><?php echo e($is_edit ? ' ویرایش ' : 'افزودن'); ?> مجوز </strong></h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="form-group">
                                <label>نام نمایشی</label>
                                <input type="text" name="display_name" class="form-control <?php $__errorArgs = ['display_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model.defer="display_name">
                                <?php $__errorArgs = ['display_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="form-group">
                                <label>عنوان مجوز</label>
                                <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model.defer="name">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col m-auto">
                            <button wire:click="addPermission" wire:loading.attr="disabled" class="mt-md-3 btn btn-raised <?php echo e($is_edit ? 'btn-warning' : 'btn-primary'); ?>  waves-effect">
                                <?php echo e($is_edit ? 'ویرایش' : 'افزودن'); ?>

                                <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="addPermission"></span>
                            </button>
                            <?php if($is_edit): ?>
                            <button class="btn btn-raised btn-info waves-effect mt-md-3" wire:loading.attr="disabled" wire:click="ref">صرف نظر
                                <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="ref"></span>
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>لیست مجوزها</strong></h2>
                </div>
                <?php if(count($permissions)===0): ?>
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
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr wire:key=<?php echo e($key); ?>>
                                <td scope="row"><?php echo e($permissions->firstItem() + $key); ?></td>
                                <td><?php echo e($permission->display_name); ?></td>
                                <td><?php echo e($permission->name); ?></td>
                                <td class="text-center">
                                    <button wire:click="edit_permission(<?php echo e($permission->id); ?>)" wire:loading.attr="disabled" <?php echo e($display); ?> class="btn btn-raised btn-info waves-effect scroll">
                                        <i class="zmdi zmdi-edit"></i>
                                        <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="edit_permission(<?php echo e($permission->id); ?>) "></span>
                                    </button>
                                    <button class="btn btn-raised btn-danger waves-effect" wire:loading.attr="disabled" wire:click="del_permission(<?php echo e($permission->id); ?>)" <?php echo e($display); ?>>
                                        <i class="zmdi zmdi-delete"></i>
                                        <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="del_permission(<?php echo e($permission->id); ?>)"></span>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <?php echo e($permissions->onEachSide(1)->links()); ?>

        </div>
    </div>
</div>
<?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/admin/permissions/permission-list.blade.php ENDPATH**/ ?>