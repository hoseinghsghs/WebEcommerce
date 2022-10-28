<div>
    <!-- Hover Rows -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-4 col-sm-6">
                            <input type="text" placeholder="عنوان" name="name" wire:model.defer="tag_name" class="form-control">
                            <?php $__errorArgs = ['tag_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-auto">
                            <button wire:click="addTag" wire:loading.attr="disabled" class="btn btn-raised <?php echo e($is_edit ? 'btn-warning' : 'btn-primary'); ?>  waves-effect">
                                <?php echo e($is_edit ? 'ویرایش' : 'افزودن'); ?>

                                <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="addTag"></span>
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
    <!-- #END# Hover Rows -->
    <!-- لیست -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>لیست تگ ها </strong>( <?php echo e($tags->total()); ?> )</h2>
                </div>
                <div class="body">
                    <?php if(count($tags)===0): ?>
                    <p>هیچ رکوردی وجود ندارد</p>
                    <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th class="text-center js-sweetalert">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr wire:key="<?php echo e($tag->name); ?> <?php echo e($tag->id); ?>" wire:loading.attr="disabled">
                                    <td scope="row"><?php echo e($tag->id); ?></td>
                                    <td><?php echo e($tag->name); ?></td>
                                    <td class="text-center js-sweetalert">

                                        <button wire:click="edit_tag(<?php echo e($tag->id); ?>)" wire:loading.attr="disabled" <?php echo e($display); ?> class="btn btn-raised btn-info waves-effect scroll">
                                            <i class="zmdi zmdi-edit"></i>
                                            <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="edit_tag(<?php echo e($tag->id); ?>) "></span>
                                        </button>

                                        <button class="btn btn-raised btn-danger waves-effect" wire:loading.attr="disabled" wire:click="del_tag(<?php echo e($tag->id); ?>)" <?php echo e($display); ?>>
                                            <i class="zmdi zmdi-delete"></i>

                                            <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="del_tag(<?php echo e($tag->id); ?>)"></span>
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

        </div>
    </div>
    <!-- پایان لیست -->
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
<?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/admin/tags/tag-controll.blade.php ENDPATH**/ ?>