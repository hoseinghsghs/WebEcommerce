<?php $__env->startSection('title','مشاهده سفارش'); ?>
<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>نمایش سفارش</h2>
                    <br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);"><a
                                    href=<?php echo e(route('admin.orders.index')); ?>>لیست سفارشات</a></li>
                        <li class="breadcrumb-item active">نمایش سفارش</li>
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
            <a class="btn btn-warning  mb-4" style="color:white" onclick="printDiv()">چاپ سفارش</a>

            <a href="<?php echo e(route('admin.transactions.edit', $order->transaction->id)); ?>"
                class="btn btn-raised btn-warning waves-effect mb-4">
                تراکنش
            </a>
            <a href="<?php echo e(route('admin.users.show', $order->user->id)); ?>"
                class="btn btn-raised btn-warning waves-effect mb-4">
                کاربر
            </a>

            <div class="row clearfix">

                <div class="form-group col-md-3">
                    <label>شماره تراکنش</label>
                    <input class="form-control" type="text" value="<?php echo e($order->id); ?>" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>نام کاربر</label>
                    <input class="form-control" type="text"
                        value="<?php echo e($order->user->name == null ? $order->user->cellphone : $order->user->name); ?>"
                        disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>کد کوپن</label>
                    <input class="form-control" type="text"
                        value="<?php echo e($order->coupon_id == null ? 'استفاده نشده' : $order->coupon->name); ?>" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>وضعیت</label>
                    <input class="form-control" type="text" value="<?php echo e($order->status); ?>" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>مبلغ</label>
                    <input class="form-control" type="text" value="<?php echo e(number_format($order->total_amount)); ?> تومان"
                        disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>هزینه ارسال</label>
                    <input class="form-control" type="text" value="<?php echo e(number_format($order->delivery_amount )); ?> تومان"
                        disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>مبلغ کد تخفیف</label>
                    <input class="form-control" type="text" value="<?php echo e(number_format($order->coupon_amount)); ?> تومان"
                        disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>مبلغ پرداختی</label>
                    <input class="form-control" type="text" value="<?php echo e(number_format($order->paying_amount)); ?> تومان"
                        disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>نوع پرداخت</label>
                    <input class="form-control" type="text" value="<?php echo e($order->payment_type); ?>" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>وضعیت پرداخت</label>
                    <input class="form-control" type="text" value="<?php echo e($order->payment_status); ?>" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>تاریخ ایجاد</label>
                    <input class="form-control" type="text" value="<?php echo e(verta($order->created_at)); ?>" disabled>
                </div>

                <div class="form-group col-md-12">
                    <label>آدرس (<?php echo e($order->address->title); ?>)</label>
                    <textarea class="form-control" rows="6" disabled>استان :<?php echo e(province_name($order->address->province_id)); ?> 
شهر : <?php echo e(city_name($order->address->city_id)); ?>

آدرس دقیق : <?php echo e($order->address->address); ?>

کد پستی : <?php echo e($order->address->postal_code); ?>

شماره تماس : <?php echo e($order->address->cellphone); ?>

                        </textarea>
                </div>
                <?php if($order->description_error): ?>
                <div class="form-group col-md-12">
                    <label>ارور ها</label>
                    <?php echo e($order->description_error); ?>

                </div>
                <?php endif; ?>

                <div class="col-md-12">
                    <hr>
                    <h5>محصولات</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th> تصویر محصول </th>
                                    <th> نام محصول </th>
                                    <th> فی </th>
                                    <th> تعداد </th>
                                    <th> قیمت کل </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="<?php echo e(route('admin.products.show', ['product' => $item->product->id])); ?>">
                                            <img width="70"
                                                src="<?php echo e(asset(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH') . $item->product->primary_image)); ?>"
                                                alt="">
                                        </a>
                                    </td>
                                    <td class="product-name"><a
                                            href="<?php echo e(route('admin.products.show', ['product' => $item->product->id])); ?>">
                                            <?php echo e($item->product->name); ?>

                                            <?php
                                            $varition=\App\Models\ProductVariation::find($item->product_variation_id)->value;
                                            ?>
                                            </br>
                                            </br>
                                            (<?php echo e($varition); ?>)

                                        </a></td>
                                    <td class="product-price-cart"><span class="amount">
                                            <?php echo e(number_format($item->price)); ?>

                                            تومان
                                        </span></td>
                                    <td class="product-quantity">
                                        <?php echo e($item->quantity); ?>

                                    </td>
                                    <td class="product-subtotal">
                                        <?php echo e(number_format($item->subtotal)); ?>

                                        تومان
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</section>
<!-- فاکتور -->
<div class="container-xl mt-4" style="margin-top: 100px; display:none ">
    <div class="row mt-4">
        <div class="col-3 text-center"><img src="<?php echo e(asset('storage/logo/'.$setting->logo)); ?>" alt="logo" /></div>
        <div class="col-6 text-center">
            <h5 class="font-weight-bold">صورتحساب فروش </h5>
        </div>
        <div class="col-3 text-right">
            <h6>شماره سفارش: <?php echo e($order->id); ?></h6>
            <h6>تاریخ سفارش: <?php echo e(Hekmatinasser\Verta\Verta::instance($order->created_at)->format('Y/n/j')); ?></h6>
        </div>
    </div>
    <div class="row m-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="11">مشخصات فروشنده</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="11" class="text-right">
                        <div class="row">
                            <div class="col-4">
                                <p>نام شخص حقیق / حقوقی:<?php echo e(env('APP_NAME')); ?></p>
                                <p>آدرس کامل: <?php echo e(province_name($order->address->province_id)); ?>، شهر
                                    <?php echo e(city_name($order->address->city_id)); ?>، <?php echo e($order->address->address); ?></p>
                            </div>
                            <div class="col-4">
                                <p>شماره اقتصادی:</p>
                                <p>کد پستی:</p>
                            </div>
                            <div class="col-4">
                                <p>شماره ثبت / شناسه ملی:</p>
                                <p>تلفن / نمابر:</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th class="text-center" colspan="11">مشخصات خریدار</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="11" class="text-right">
                        <div class="row">
                            <div class="col-4">
                                <p>نام شخص حقیق / حقوقی: <?php echo e($order->address->name); ?></p>
                                <p>آدرس کامل:<?php echo e(province_name($order->address->province_id)); ?>، شهر
                                    <?php echo e(city_name($order->address->city_id)); ?>، <?php echo e($order->address->address); ?></p>
                            </div>
                            <div class="col-4">
                                <p>کد پستی:<?php echo e($order->address->postal_code); ?></p>
                            </div>
                            <div class="col-4">
                                <p>تلفن / نمابر:<?php echo e($order->address->cellphone); ?> , <?php echo e($order->address->cellphone2); ?></p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th class="text-center" colspan="11">مشخصات کالا یا خدمات مورد معامله</th>
                </tr>
            </thead>
            <thead>
                <tr class="text-center">
                    <th>ردیف</th>
                    <th>کد کالا</th>
                    <th>شرح کالا یا خدمات</th>
                    <th>تعداد / مقدار</th>
                    <th>واحد انداز گیری</th>
                    <th>مبلغ واحد (ریال)</th>
                    <th>مبلغ کل (ریال)</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $sku=App\Models\ProductVariation::find($item->product_variation_id);
                ?>
                <tr class="text-center">
                    <td>۱</td>
                    <td><?php echo e($sku->sku); ?></td>
                    <td><?php echo e($item->product->name); ?></td>
                    <td><?php echo e($item->quantity); ?></td>
                    <td>عدد</td>
                    <td class="text-center"><?php echo e(number_format($item->price)); ?></td>
                    <td class="text-center"><?php echo e(number_format($item->subtotal)); ?></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <th colspan="6" class="text-center">جمع کل</th>

                    <th class="text-center" colspan="2"><?php echo e(number_format($order->total_amount)); ?></th>

                </tr>
                <tr>
                    <th colspan="6" class="text-center">هزینه ارسال</th>

                    <th class="text-center" colspan="2"><?php echo e(number_format($order->delivery_amount )); ?></th>

                </tr>
                <tr>
                    <th colspan="6" class="text-center">کد تخفیف</th>

                    <th class="text-center" colspan="2"><?php echo e(number_format($order->coupon_amount )); ?></th>

                </tr>
                <tr>
                    <th colspan="6" class="text-center">مبلغ قابل پرداخت</th>

                    <th class="text-center" colspan="2"><?php echo e(number_format($order->paying_amount )); ?></th>

                </tr>
                <tr>
                    <th colspan="5" class="text-right">شرایط و نحوه فروش: <?php echo e($order->payment_type); ?> </th>
                    <th colspan="6" class="text-right">توضیحات: <?php echo e($order->description); ?> </th>
                </tr>
                <tr style="padding: 60px 0;">
                    <td colspan="5" class="text-right">مهر و امضا فروشنده</td>
                    <td colspan="6" class="text-right">مهر و امضا خریدار</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function printDiv() {

    var divContents = $(".container-xl").html();
    let url = window.location.origin + "/css/home.css";
    var a = window.open('', '', 'height=768px, width=1366px');
    a.document.write('<html><body style="background-color: white !important">');
    a.document.write('<head><title></title>');
    a.document.write('<link rel="stylesheet" href="' + url + '" type="text/css" />');
    a.document.write('</head>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.focus();
    setTimeout(function() {
        a.print();
    }, 1000);


    return true;

}
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/orders/show.blade.php ENDPATH**/ ?>