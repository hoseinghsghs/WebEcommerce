<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <div class="row clearfix mt-1 align-items-center">
                    <div class="col-md-auto"><label>جستجو :</label></div>
                    <div class="col-md-4">
                        <div class="inner-addon left-addon">
                            <i class="zmdi zmdi-hc-fw input-icon" wire:target="search" wire:loading.remove></i>
                            <i class="zmdi zmdi-hc-fw zmdi-hc-spin input-icon" wire:loading wire:target="search"></i>
                            <input type="text" name="search" class="form-control <?php $__errorArgs = ['search'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model.debounce.500ms="search" placeholder=" نام، ایمیل، تلفن">
                        </div>
                        <?php $__errorArgs = ['search'];
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
            </div>
            <div class="table-responsive">
                <table class="table table-hover footable c_table theme-color">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>شماره تلفن</th>
                            <th>تاریخ ایجاد حساب</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td scope="row"><?php echo e($users->firstItem() + $key); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->cellphone); ?></td>
                            <td><?php echo e(verta($user->created_at)->format('H:i Y/n/j')); ?></td>
                            <td class="text-center js-sweetalert">
                                <a onclick="loadbtn(event)" href="<?php echo e(route('admin.users.show',$user->id)); ?>" class="btn btn-light waves-effect waves-float btn-sm waves-green">
                                    <i class="zmdi zmdi-eye"></i>
                                </a>
                                <a href="<?php echo e(route('admin.users.edit',$user->id)); ?>" class="btn btn-light waves-effect waves-float btn-sm waves-green" onclick="loadbtn(event)">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5">
                                <p class="text-center text-muted">هیچ رکوردی یافت نشد!</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo e($users->onEachSide(1)->links()); ?>

    </div>
</div>
<?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/admin/users/users-list.blade.php ENDPATH**/ ?>