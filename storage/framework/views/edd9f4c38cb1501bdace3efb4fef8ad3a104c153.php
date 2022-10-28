<?php $__env->startSection('title' , 'ایجاد آدرس'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block"> <?php echo $__env->make('home.page.users_profile.partial.right_side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="profile-address">
                                    <div class="middle-container">
                                        <form class="form-checkout" action="<?php echo e(route('home.addreses.store')); ?>"
                                            method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="row form-checkout-row">
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="name">عنوان آدرس<abbr class="required" title="ضروری"
                                                            style="color:red;">*</abbr></span></label>
                                                    <input type="text" id="name" name="title"
                                                        class="input-name-checkout form-control m-0">
                                                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="name">نام تحویل گیرنده <abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></span></label>
                                                    <input type="text" id="name" name="name"
                                                        class="input-name-checkout form-control m-0">
                                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="phone-number">شماره موبایل <abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></label>
                                                    <input dir="ltr" type="number" id="phone-number" name="cellphone"
                                                        class="input-name-checkout form-control m-0 text-left">
                                                    <?php $__errorArgs = ['cellphone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="fixed-number">شماره تلفن ثابت(با پیش شماره)
                                                        <abbr class="required" title="ضروری"
                                                            style="color:red;">*</abbr></label>
                                                    <input dir="ltr" type="number" id="fixed-number" name="cellphone2"
                                                        class="input-name-checkout form-control m-0 text-left">
                                                    <?php $__errorArgs = ['cellphone2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <div class="form-checkout-valid-row">
                                                        <label for="province">استان
                                                            <abbr class="required" title="ضروری"
                                                                style="color:red;">*</abbr>
                                                        </label>
                                                        <select id="province_id" name="province_id"
                                                            class="form-control m-0 province-select">
                                                            <option selected="selected" disabled>استان
                                                                مورد
                                                                نظر خود را انتخاب کنید </option>
                                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($province->id); ?>">
                                                                <?php echo e($province->name); ?>

                                                            </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <div class="form-checkout-valid-row">
                                                        <label for="city">شهر
                                                            <abbr class="required" title="ضروری"
                                                                style="color:red;">*</abbr></label>
                                                        <select name="city_id" id="city"
                                                            class="city-select form-control m-0">
                                                        </select>
                                                        <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <div class="form-checkout-valid-row">
                                                        <label for="apt-id">واحد
                                                            <span class="optional"> (اختیاری)
                                                            </span>
                                                        </label>
                                                        <input type="text" id="apt-id" name="unit"
                                                            class="input-name-checkout js-input-apt-id form-control m-0">
                                                        <?php $__errorArgs = ['unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="post-code">کد پستی<abbr class="required" title="ضروری"
                                                            style="color:red;">*</abbr></label>
                                                    <input dir="ltr" type="number" id="post-code" name="postal_code"
                                                        class="input-name-checkout form-control m-0">
                                                    <?php $__errorArgs = ['postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                    <label for="address">آدرس
                                                        <abbr class="required" title="ضروری" style="color:red;">*</abbr>
                                                    </label>
                                                    <textarea rows="5" cols="30" id="address" name="address"
                                                        class="textarea-name-checkout form-control m-0 "></textarea>
                                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                    <label for="address">آدرس جایگزین
                                                        <abbr class="required" title="ضروری" style="color:red;">*</abbr>
                                                    </label>
                                                    <textarea rows="5" cols="30" id="address" name="lastaddress"
                                                        class="textarea-name-checkout form-control mb-0"
                                                        placeholder="آدرس جایگزین در صورت ضرورت..."></textarea>
                                                    <?php $__errorArgs = ['lastaddress'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn-registrar" type="submit"> ثبت آدرس</button>
                                                    <a href="<?php echo e(route('home.addreses.index')); ?>" class="cancel-edit-address mt-0" aria-label="Close">بازگشت</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<?php if($errors->any()): ?>
<script>
Swal.fire({
    text: "لطفا خطاها را رفع نمایید",
    icon: 'warning',
    showConfirmButton: false,
    toast: true,
    position: 'top-right',
    timer: 5000,
    timerProgressBar: true,
})
</script>

<?php endif; ?>
<script>
$('.province-select').change(function() {
    var provinceID = $(this).val();
    if (provinceID) {
        $.ajax({
            type: "GET",
            url: "<?php echo e(url('/get-province-cities-list')); ?>?province_id=" + provinceID,
            success: function(res) {
                if (res) {
                    $(".city-select").empty();
                    $.each(res, function(key, city) {
                        $(".city-select").append('<option value="' + city.id + '">' +
                            city.name + '</option>');
                    });
                } else {
                    $(".city-select").empty();
                }
            }
        });
    } else {
        $(".city-select").empty();
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/users_profile/create_address.blade.php ENDPATH**/ ?>