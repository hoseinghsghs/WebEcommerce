<?php $__env->startSection('title','ایجاد دسته بندی'); ?>

<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ایجاد دسته بندی</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.categories.index')); ?>">دسته بندی ها</a></li>
                        <li class="breadcrumb-item active">ایجاد دسته بندی</li>
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
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger" role="alert">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="zmdi zmdi-block"></i>
                            </div>
                            <?php echo e($error); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <div class="body">
                            <form id="form_advanced_validation" class="needs-validation"
                                action=<?php echo e(route('admin.categories.store')); ?> method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <label for="name">عنوان دسته بندی</label>
                                        <div class="form-group">
                                            <input type="text" name="name" id="name"
                                                class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('name')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="slug">عنوان انگلیسی</label>
                                        <div class="form-group">
                                            <input type="text" name="slug" id="slug"
                                                class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('slug')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="parent_id">والد</label>
                                        <div class="form-group">
                                            <select id="parent_id" name="parent_id"
                                                class="form-control show-tick ms select2" required>
                                                <option value="0">بدون والد</option>
                                                <?php $__currentLoopData = $parentCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('parent_id') === $parentCategory->id ? "selected":null); ?>

                                                    value="<?php echo e($parentCategory->id); ?>"><?php echo e($parentCategory->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="switch">وضعیت</label>
                                        <div class="switchToggle">
                                            <input type="checkbox" name="is_active" id="switch"
                                                <?php echo e(old('is_active') ? 'checked' : null); ?>>
                                            <label for="switch">Toggle</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="attributesId">ویژگی‌ها</label>
                                        <div class="form-group">
                                            <select id="attributesId" name="attribute_ids[]"
                                                class="form-control show-tick ms select2"
                                                data-placeholder="انتخاب ویژگی" multiple data-close-on-select="false"
                                                required>
                                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($attribute->id); ?>" <?php if(old('attribute_ids')){
                                                    if(in_array($attribute->id, old('attribute_ids'))) echo "selected";
                                                    }
                                                    ?>
                                                    ><?php echo e($attribute->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="attributeIsFilter">انتخاب ویژگی های قابل فیلتر</label>
                                        <div class="form-group">
                                            <select id="attributeIsFilter" name="attribute_is_filter_ids[]"
                                                class="form-control show-tick ms select2" multiple
                                                data-close-on-select="false" data-placeholder="انتخاب فیلتر" required>
                                                <?php if(old('attribute_ids') && old('attribute_is_filter_ids')): ?>
                                                <?php $__currentLoopData = $attributes->only(old('attribute_ids')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected_attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($selected_attribute->id); ?>"
                                                    <?php echo e(in_array($selected_attribute->id, old('attribute_is_filter_ids'))? "selected":null); ?>>
                                                    <?php echo e($selected_attribute->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="attributeIsMain">انتخاب ویژگی های اصلی دسته</label>
                                        <div class="form-group">
                                            <select id="attributeIsMain" name="attribute_is_main_ids[]"
                                                class="form-control show-tick ms select2" multiple
                                                data-close-on-select="false" data-placeholder="انتخاب ویژگی">
                                                <?php if(old('attribute_ids') && old('attribute_is_main_ids')): ?>
                                                <?php $__currentLoopData = $attributes->only(old('attribute_ids')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected_attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($selected_attribute->id); ?>"
                                                    <?php echo e(in_array($selected_attribute->id, old('attribute_is_main_ids'))? "selected":null); ?>>
                                                    <?php echo e($selected_attribute->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="attributeVariation">انتخاب ویژگی متغیر</label>
                                        <div class="form-group">
                                            <select id="attributeVariation" name="variation_id"
                                                class="form-control show-tick ms select2" required>
                                                <?php if(old('attribute_ids') && old('variation_id')): ?>
                                                <?php $__currentLoopData = $attributes->only(old('attribute_ids')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected_attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($selected_attribute->id); ?>"
                                                    <?php echo e($selected_attribute->id == old('variation_id') ? "selected" : null); ?>>
                                                    <?php echo e($selected_attribute->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="icon">آیکون</label>
                                        <small> <a href="https://fontawesome.com/v3/icons/" target="_blank">
                                                انتخاب نام آیکن</a></small>
                                        <div class="form-group">
                                            <input type="text" name="icon" id="icon" class="form-control"
                                                value="<?php echo e(old('icon')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="decription">توضیحات</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" name="description" class="form-control no-resize"
                                                    placeholder="لطفا آنچه را که میخواهید تایپ کنید..."><?php echo e(old('description')); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="col-12">
                                        <div class="checkbox">
                                            <input id="chec" <?php echo e(old('is_show') ==='on' ? 'checked' : ''); ?>

                                                type="checkbox" name="is_show">
                                            <label for="chec"> نمایش در صفحه اصلی </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-raised btn-primary waves-effect">ذخیره</button>
                                </div>
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
$('#attributesId').on('change', function() {
    let selectedAttributes = $(this).select2('data');
    let options = ''

    selectedAttributes.forEach(element => {
        options += `<option value="${element.id}">${element.text}</option>`
    });
    $('#attributeIsFilter').html(options).trigger('change');
    $('#attributeIsMain').html(options).trigger('change');
    $('#attributeVariation').html(options).trigger('change');
})
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/categories/create.blade.php ENDPATH**/ ?>