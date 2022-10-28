<?php $__env->startSection('title','ایجاد بنر'); ?>

<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ایجاد بنر</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.banners.index')); ?>">بنر ها</a></li>
                        <li class="breadcrumb-item active">ایجاد بنر</li>
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
                                action=<?php echo e(route('admin.banners.update',$banner->id)); ?> method="POST"
                                enctype="multipart/form-data">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <label for="title">عنوان بنر</label>
                                        <div class="form-group">
                                            <input type="text" name="title" id="title"
                                                class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('title') ?? $banner->title); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="text">متن</label>
                                        <div class="form-group">
                                            <input id="text" name="text" class="form-control"
                                                value="<?php echo e(old('text') ?? $banner->text); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="type">محل قرار گیری *</label>
                                        <select id="positionSelect" name="type" data-placeholder="انتخاب محل"
                                            class="form-control ms select2">
                                            <option></option>
                                            <option <?php echo e($banner->type == 'اسلایدر' ? 'selected' : ''); ?>>اسلایدر</option>
                                            <option <?php echo e($banner->type == 'هدر' ? 'selected' : ''); ?>>هدر
                                            </option>
                                            <option <?php echo e($banner->type == 'وسط' ? 'selected' : ''); ?>>وسط
                                            </option>
                                            <option <?php echo e($banner->type == 'منو' ? 'selected' : ''); ?>>منو
                                            </option>
                                            <option <?php echo e($banner->type == 'هدر-چپ-بالا' ? 'selected' : ''); ?> disabled>
                                                هدر-چپ-بالا
                                            </option>
                                            <option <?php echo e($banner->type == 'هدر-چپ-پایین' ? 'selected' : ''); ?> disabled>
                                                هدر-چپ-پایین
                                            </option>
                                            <option <?php echo e($banner->type == 'راست-دسته بندی' ? 'selected' : ''); ?> disabled>
                                                راست-دسته
                                                بندی
                                            </option>
                                            <option <?php echo e($banner->type == 'چپ-دسته بندی' ? 'selected' : ''); ?> disabled>
                                                چپ-دسته بندی
                                            </option>
                                            <option <?php echo e($banner->type == 'عرضی' ? 'selected' : ''); ?> disabled>عرضی</option>
                                            <option <?php echo e($banner->type == 'آخر-راست' ? 'selected' : ''); ?> disabled>آخر-راست
                                            </option>
                                            <option <?php echo e($banner->type == 'آخر-چپ-بالا' ? 'selected' : ''); ?> disabled>
                                                آخر-چپ-بالا
                                            </option>
                                            <option <?php echo e($banner->type == 'آخر-چپ-پایین-1' ? 'selected' : ''); ?> disabled>
                                                آخر-چپ-پایین-1</option>
                                            <option <?php echo e($banner->type == 'آخر-چپ-پایین-2' ? 'selected' : ''); ?> disabled>
                                                آخر-چپ-پایین-2</option>
                                            <option <?php echo e($banner->type == 'محصول' ? 'selected' : ''); ?> disabled>محصول
                                            </option>

                                        </select>
                                        <?php $__errorArgs = ['position'];
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
                                    <div class="col-md-3">
                                        <label for="switch">وضعیت</label>
                                        <div class="switchToggle">
                                            <input type="checkbox" name="is_active" id="switch"
                                                <?php echo e(old('is_active') || !$banner->is_active ? 'checked': null); ?>>
                                            <label for="switch">Toggle</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="priority"> اولویت</label>
                                        <div class="form-group">
                                            <input type="number" name="priority" id="priority"
                                                class="form-control <?php $__errorArgs = ['priority'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('priority') ?? $banner->priority); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="button_text">متن دکمه</label>
                                        <div class="form-group">
                                            <input type="text" name="button_text" id="button_text"
                                                class="form-control <?php $__errorArgs = ['button_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('button_text') ?? $banner->button_text); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="button_link">لینک دکمه</label>
                                        <div class="form-group">
                                            <input type="text" name="button_link" id="button_link"
                                                class="form-control <?php $__errorArgs = ['button_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('button_link') ?? $banner->button_link); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="button_icon">آیکون دکمه</label>
                                        <div class="form-group">
                                            <input type="text" name="button_icon" id="button_icon" class="form-control"
                                                value="<?php echo e(old('button_icon') ?? $banner->button_icon); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image">تصویر</label>
                                        <span class="position_message" id="position_message"></span>

                                        <div class="form-group">
                                            <input name="image" id="image" type="file" class="dropify form-controll"
                                                data-show-remove="false"
                                                data-default-file="<?php echo e(asset('storage/banners/'.$banner->image)); ?>"
                                                data-allowed-file-extensions="jpg png jpeg svg"
                                                data-max-file-size="1024K">
                                            <?php $__errorArgs = ['image'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <img class="bone mt-5" />
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
$(document).ready(function(e) {

    if ($('#positionSelect').val() == 'اسلایدر') {
        $('.position_message').html('(سایز تصویر 509*730)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/top/1.png");
    }
    if ($('#positionSelect').val() == 'هدر') {
        $('.position_message').html('(سایز تصویر 300*400)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/1.png");
    }
    if ($('#positionSelect').val() == 'وسط') {
        $('.position_message').html('(سایز تصویر 300*820)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/2.png");
    }
    if ($('#positionSelect').val() == 'منو') {
        $('.position_message').html('(سایز تصویر 325*350)').css('color', 'red');
    }
    if ($('#positionSelect').val() == 'هدر-چپ-بالا') {
        $('.position_message').html('(سایز تصویر 239*330)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/top/2.png");
    }
    if ($('#positionSelect').val() == 'هدر-چپ-پایین') {
        $('.position_message').html('(سایز تصویر 239*330)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/top/3.png");
    }

    if ($('#positionSelect').val() == 'راست-دسته بندی') {
        $('.position_message').html('(سایز تصویر 180*680)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/category/01.png");
    }
    if ($('#positionSelect').val() == 'چپ-دسته بندی') {
        $('.position_message').html('(سایز تصویر 180*680)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/category/02.png");
    }

    if ($('#positionSelect').val() == 'عرضی') {
        $('.position_message').html('(سایز تصویر 260*1380)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/width/01.png");
    }

    if ($('#positionSelect').val() == 'عرضی') {
        $('.position_message').html('(سایز تصویر 260*1380)').css('color', 'red');
    }
    if ($('#positionSelect').val() == 'آخر-راست') {
        $('.position_message').html('(سایز تصویر 240*680)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/end/01.png");
    }
    if ($('#positionSelect').val() == 'آخر-چپ-بالا') {
        $('.position_message').html('(سایز تصویر 200*680)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/end/02.png");

    }
    if ($('#positionSelect').val() == 'آخر-چپ-پایین-1') {
        $('.position_message').html('(سایز تصویر 200*330)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/end/04.png");

    }
    if ($('#positionSelect').val() == 'آخر-چپ-پایین-2') {
        $('.position_message').html('(سایز تصویر 200*330)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/end/03.png");

    }
    if ($('#positionSelect').val() == 'محصول') {
        $('.position_message').html('(سایز تصویر 220*266)').css('color', 'red');


    }


    $("#positionSelect").on('change onload', function() {

        if ($(this).val() == 'اسلایدر') {
            $('.position_message').html('(سایز تصویر 509*730)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/top/1.png");
        }
        if ($(this).val() == 'هدر') {
            $('.position_message').html('(سایز تصویر 300*400)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/1.png");
        }
        if ($(this).val() == 'وسط') {
            $('.position_message').html('(سایز تصویر 300*820)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/2.png");
        }
        if ($(this).val() == 'منو') {
            $('.position_message').html('(سایز تصویر 325*350)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/2.png");
        }
        if ($(this).val() == 'هدر-چپ-بالا') {
            $('.position_message').html('(سایز تصویر 239*330)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/top/2.png");
        }
        if ($(this).val() == 'هدر-چپ-پایین') {
            $('.position_message').html('(سایز تصویر 239*330)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/top/3.png");
        }

        if ($(this).val() == 'راست-دسته بندی') {
            $('.position_message').html('(سایز تصویر 180*680)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/category/01.png");
        }
        if ($(this).val() == 'چپ-دسته بندی') {
            $('.position_message').html('(سایز تصویر 180*680)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/category/02.png");
        }

        if ($(this).val() == 'عرضی') {
            $('.position_message').html('(سایز تصویر 260*1380)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/width/01.png");
        }

        if ($(this).val() == 'عرضی') {
            $('.position_message').html('(سایز تصویر 260*1380)').css('color', 'red');
        }
        if ($(this).val() == 'آخر-راست') {
            $('.position_message').html('(سایز تصویر 240*680)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/end/01.png");
        }
        if ($(this).val() == 'آخر-چپ-بالا') {
            $('.position_message').html('(سایز تصویر 200*680)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/end/02.png");

        }
        if ($(this).val() == 'آخر-چپ-پایین-1') {
            $('.position_message').html('(سایز تصویر 200*330)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/end/04.png");

        }
        if ($(this).val() == 'آخر-چپ-پایین-2') {
            $('.position_message').html('(سایز تصویر 200*330)').css('color', 'red');
            $(".bone").attr("src", "/assets/images/position/end/03.png");

        }
        if ($(this).val() == 'محصول') {
            $('.position_message').html('(سایز تصویر 220*266)').css('color', 'red');

        }


    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/banners/edit.blade.php ENDPATH**/ ?>