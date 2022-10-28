<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ایجاد پست</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.posts.index')); ?>>لیست پست ها</a></li>
                        <li class="breadcrumb-item active">ایجاد پست</li>
                    </ul>
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
                            <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <form id="form_advanced_validation" class="needs-validation"
                                action=<?php echo e(route('admin.posts.store')); ?> method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">عنوان</label>
                                        <input type="text" name="title" class="form-control" maxlength="100"
                                            minlength="3" value="<?php echo e(old('title')); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label for="categoryposition_id">دسته بندی</label>
                                    <select id="categorySelect" name="category" data-placeholder="انتخاب محل"
                                        class="form-control ms select2">
                                        <option>بدون دسته بندی</option>
                                        <option>سئو</option>
                                        <option>دیجیتال مارکتینگ</option>
                                        <option>تکنولوژی</option>
                                        <option>محبوب ها</option>
                                    </select>
                                    <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger m-0"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>



                                <div class="body">
                                    <textarea id="summernote" name="body" rows="8" style="z-index:1000 ;" required>
                                    <?php echo e(old('body')); ?>

                                    </textarea>
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">آپلود عکس</label>
                                    <div class="col-lg-12 px-0">
                                        <input name="image" type="file" class="dropify"
                                            data-allowed-file-extensions="jpg png jpeg" data-max-file-size="1024K"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="switch">وضعیت</label>
                                    <div class="switchToggle">
                                        <input type="checkbox" name="status" id="switch"
                                            <?php echo e(old('is_active') ? 'checked' : null); ?>>
                                        <label for="switch">Toggle</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-raised btn-primary waves-effect">
                                    ذخیره
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $('#summernote').summernote();
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/posts/create.blade.php ENDPATH**/ ?>