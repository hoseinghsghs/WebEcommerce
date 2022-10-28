<?php $__env->startSection('title','ویرایش تراکنش'); ?>
<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش تراکنش</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i
                                    class="zmdi zmdi-home"></i>خانه</a></li>
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.transactions.index')); ?>>لیست تراکنش ها</a>
                        </li>
                        <li class="breadcrumb-item active">ویرایش تراکنش</li>
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
                                action="<?php echo e(route('admin.transactions.update',$transaction->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">قیمت پرداختی</label>
                                        <input type="text" name="amount" class="form-control" id="amount" minlength="3"
                                            required value="<?php echo e(old('amount')?? $transaction->amount); ?>">
                                        <span id="amount_1"></span>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">شماره تراکنش</label>
                                        <input type="text" name="ref_id" class="form-control" minlength="3" required
                                            value="<?php echo e(old('ref_id')?? $transaction->ref_id); ?>">
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label for="gateway_name_id">درگاه *</label>
                                    <select id="gateway_nameSelect" name="gateway_name" data-placeholder="انتخاب محل"
                                        class="form-control ms select2">
                                        <option></option>
                                        <option <?php echo e($transaction->gateway_name == 'zarinpal' ? 'selected' : ''); ?>>zarinpal
                                        </option>
                                        <option <?php echo e($transaction->gateway_name == 'pay' ? 'selected' : ''); ?>>pay</option>
                                        <option <?php echo e($transaction->gateway_name == 'پرداخت دستی' ? 'selected' : ''); ?>>پرداخت
                                            دستی
                                        </option>
                                        <option <?php echo e($transaction->gateway_name == 'سایر' ? 'selected' : ''); ?>>سایر
                                        </option>
                                    </select>
                                    <?php $__errorArgs = ['gateway_name'];
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

                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="checkbox">
                                            <input id="chec" type="checkbox"
                                                <?php echo e($transaction->status== 'موفق' ? 'checked' : ''); ?> name="status" />
                                            <label for="chec">انتشار </label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-raised btn-primary waves-effect"
                                    onclick="loadbtn(event)">
                                    بروزرسانی
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- #END# Hover Rows -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
$('#amount').on('keyup keypress focus change', function(e) {
    Number = $(this).val()
    Number += '';
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    x = Number.split('.');
    y = x[0];
    z = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y = y.replace(rgx, '$1' + ',' + '$2');
    output = y + z;
    if (output != "") {
        document.getElementById("amount_1").innerHTML = output + 'تومان';
    } else {
        document.getElementById("amount_1").innerHTML = '';
    }
});
</script>
</script>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/transactions/edit.blade.php ENDPATH**/ ?>