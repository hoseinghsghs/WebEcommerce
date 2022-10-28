<?php $__env->startSection('title', "سفارشات"); ?>
<?php $__env->startSection('content'); ?>
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    <?php echo $__env->make('home.page.users_profile.partial.right_side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <div
                        class="col-lg-9 col-md-9 col-xs-12 pl content-pro">
                        <a class="btn btn-warning m-3" style="color:white" onclick="printDiv()">چاپ سفارش</a>
                        <div class="table-order-view row"> <?php if(URL::previous() !=
                            route('home.user_profile.ordersList')): ?>
                            <div class="p-5">
                                <?php if($order->status == "آماده برای ارسال"): ?>
                                <p class="p-3 mb-2 bg-success text-white">
                                    پرداخت با موفقیت انجام شد. سفارش شما با موفقیت ثبت شد و در زمان تعیین شده
                                    برای
                                    شما
                                    ارسال خواهد شد. از اینکه <?php echo e(env('APP_NAME')); ?> را برای خرید انتخاب کردید از
                                    شما
                                    سپاسگزاریم.</p>
                                <?php endif; ?>
                                <?php if($order->status == "در انتظار پرداخت"): ?>
                                <p class="p-3 mb-2 bg-danger text-white">
                                    سفارش دریافت نشد
                                    پرداخت ناموفق. برای جلوگیری از لغو سیستمی سفارش،تا 24 ساعت آینده
                                    پرداخت را انجام دهید. چنانچه طی این فرایند مبلغی از حساب شما کسر شده است،طی
                                    72 ساعت آینده به حساب شما باز خواهد گشت.
                                    </br>
                                    کد سفارش برای پیگیری : <?php echo e($order->id); ?>

                                </p>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?> <div class="col-lg-6 col-12 mt-3 ">
                                <div class="profile-content">
                                    <div class="profile-stats">
                                        <div class="box-header">
                                            <span class="box-title">جزئیات سفارش محصول</span>
                                        </div>
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">نام محصول</th>
                                                    <th scope="col">جمع</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="product-name">
                                                        <a
                                                            href="<?php echo e(route('home.products.show' , ['product' => $item->product->slug])); ?>">
                                                            (<?php echo e($item->product->name); ?>)
                                                            <?php echo e($item->quantity); ?> عدد
                                                            * <?php echo e(number_format($item->price)); ?> تومان
                                                        </a>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">
                                                            <span>تومان</span>
                                                            <?php echo e(number_format($item->subtotal)); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tfoot> </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="profile-content">
                                        <div class="profile-stats p-3 p-3">
                                            <div class="box-header">
                                                <span class="box-title">جمع هزینه و تخفیف</span>
                                            </div>
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">مجموع:</th>
                                                        <td>
                                                            <span class="amount">
                                                                <?php echo e(number_format($order->total_amount)); ?>

                                                                <span>تومان</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">حمل و نقل:</th>
                                                        <td><?php echo e(number_format($order->delivery_amount )); ?>

                                                            <span>تومان</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">کد تخفیف:</th>
                                                        <td><?php echo e(number_format($order->coupon_amount )); ?>

                                                            <span>تومان</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">روش پرداخت:</th>
                                                        <td><?php echo e($order->payment_type); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">قیمت نهایی:</th>
                                                        <td>
                                                            <span class="amount">
                                                                <?php echo e(number_format($order->paying_amount )); ?>

                                                                <span>تومان</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-lg-6 col-12 mt-3 ">
                                <div class="profile-content">
                                    <div class="profile-stats p-3">
                                        <div class="box-header">
                                            <span class="box-title">آدرس ارسال محصول</span>
                                        </div>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">عنوان:</th>
                                                    <td>
                                                        <span class="amount"> <?php echo e($order->address->title); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">نام تحویل گیرنده:</th>
                                                    <td>
                                                        <span class="amount"> <?php echo e($order->address->name); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        روش پرداخت:
                                                    </th>
                                                    <td><?php echo e($order->payment_type); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">استان:</th>
                                                    <td>
                                                        <span class="amount">
                                                            <?php echo e(province_name($order->address->province_id)); ?> </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">شهر: </th>
                                                    <td>
                                                        <span class="amount">
                                                            <?php echo e(city_name($order->address->city_id)); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">استان:</th>
                                                    <td>
                                                        <span class="amount">
                                                            <?php echo e(province_name($order->address->province_id)); ?> </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> شماره 1: </th>
                                                    <td>
                                                        <span class="amount">
                                                            <?php echo e($order->address->cellphone); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> شماره 2: </th>
                                                    <td>
                                                        <span class="amount">
                                                            <?php echo e($order->address->cellphone2); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> کد پستی: </th>
                                                    <td>
                                                        <span class="amount">
                                                            <?php echo e($order->address->postal_code); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-lg-12 col-12 mt-3 ">
                                <div class="profile-content">
                                    <div class="profile-stats p-3">
                                        <div class="box-header">
                                            <span class="box-title">آدرس اول</span>
                                        </div>
                                        <tr>
                                            <td><?php echo e($order->address->address); ?>

                                            </td>
                                        </tr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12 mt-3 mb-4">
                                <div class="profile-content">
                                    <div class="profile-stats p-3">
                                        <div class="box-header">
                                            <span class="box-title">آدرس جایگزین</span>
                                        </div>
                                        <tr>
                                            <td>
                                                <?php echo e($order->address->lastaddress); ?>

                                            </td>
                                        </tr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div><!-- فاکتور -->
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
                                    <?php echo e(city_name($order->address->city_id)); ?>، <?php echo e($order->address->address); ?>

                                </p>
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
                                    <?php echo e(city_name($order->address->city_id)); ?>، <?php echo e($order->address->address); ?>

                                </p>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <tr>
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
</div><?php $__env->startPush('scripts'); ?>
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
<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/users_profile/order/show.blade.php ENDPATH**/ ?>