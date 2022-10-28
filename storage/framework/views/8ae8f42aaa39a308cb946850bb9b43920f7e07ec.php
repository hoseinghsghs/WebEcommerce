<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong><?php echo e($is_edit ? ' ویرایش ' : 'افزودن'); ?> ویژگی </strong></h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-4 col-sm-6">
                            <input type="text" name="name" class="form-control <?php $__errorArgs = ['attribute_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="عنوان" wire:model.defer="attribute_name">
                            <?php $__errorArgs = ['attribute_name'];
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
                        <div class="col-auto">
                            <button wire:click="addAttribute" wire:loading.attr="disabled" class="btn btn-raised <?php echo e($is_edit ? 'btn-warning' : 'btn-primary'); ?>  waves-effect">
                                <?php echo e($is_edit ? 'ویرایش' : 'اضافه کردن'); ?>

                                <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="addAttribute"></span>
                            </button>
                            <?php if($is_edit): ?>
                            <button class="btn btn-raised btn-info waves-effect" wire:loading.attr="disabled" wire:click="ref">صرف نظر
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
                    <h2><strong>لیست ویژگی ها </strong>( <?php echo e($attributes->total()); ?> )</h2>
                </div>
                <div class="body">
                    <?php if(count($attributes)===0): ?>
                    <p>هیچ رکوردی وجود ندارد</p>
                    <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th class="text-center">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr wire:key="attribute-field-<?php echo e($attribute->id); ?>">
                                    <td scope="row"><?php echo e($attributes->firstItem() + $key); ?></td>
                                    <td><?php echo e($attribute->name); ?></td>
                                    <td class="text-center">
                                        <button wire:click="edit_attribute(<?php echo e($attribute->id); ?>)" wire:loading.attr="disabled" <?php echo e($display); ?> class="btn btn-raised btn-info waves-effect scroll">
                                            <i class="zmdi zmdi-edit"></i>
                                            <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="edit_attribute(<?php echo e($attribute->id); ?>) "></span>
                                        </button>

                                        <button class="btn btn-raised btn-danger waves-effect" wire:loading.attr="disabled" wire:click="del_attribute(<?php echo e($attribute->id); ?>)" <?php echo e($display); ?>>
                                            <i class="zmdi zmdi-delete"></i>
                                            <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="del_attribute(<?php echo e($attribute->id); ?>)"></span>
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
            <?php echo e($attributes->onEachSide(1)->links()); ?>

        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
    $('.scroll').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/admin/attributes/attribute-list.blade.php ENDPATH**/ ?>