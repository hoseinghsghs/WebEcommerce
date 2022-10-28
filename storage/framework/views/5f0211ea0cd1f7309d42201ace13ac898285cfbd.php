<?php $__env->startSection('title', "پرداخت "); ?>
<?php $__env->startSection('content'); ?>
<!-- checkout------------------------------>
<div class="container-main">
    <div class="d-block">
        <div class="col-12">
            <section class="blog-checkout d-block order-1">
                <div class="checkout woocommerce-checkout">
                    <div class="content-checkout">
                        <div class="middle-container">
                            <form class="form form-checkout" id="checkout" action="<?php echo e(route('home.payment')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="col2-set" id="customer-details">
                                    <div class="billing-fields">
                                        <h4>جزئیات صورتحساب</h4>
                                        <div class="form-checkout-row">
                                            <div class="Order-another-shipping-address mt-2 mb-2">
                                                <div class="col-md-4 mb-3">
                                                    <label>انتخاب آدرس</label>
                                                    <select class="form-control form-control-md mb-0 text-center" name="address_id" id="address-option">
                                                        <option value="new">آدرس جدید</option>
                                                        <?php if($addresses->count() > 0): ?>
                                                        <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($address->id); ?>">
                                                            <?php echo e($address->title); ?>

                                                        </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                    <?php $__errorArgs = ['address_id'];
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
                                                <?php if($addresses->count() > 0): ?>
                                                <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div id="dchange">
                                                    <div class="row mx-0 Order-another-shipping-address mt-2 checkout-address" style="display: none" id="<?php echo e($address->id); ?>">
                                                        <div class="col-md-6 col-12">
                                                            <div class="box-header">
                                                                <span class="box-title">اطلاعات آدرس</span>
                                                            </div>
                                                            <table class="table table-borderless">
                                                                <tfoot>
                                                                    <tr>
                                                                        <th scope="row">عنوان:</th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                <?php echo e($address->title); ?>

                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">نام تحویل گیرنده:</th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                <?php echo e($address->name); ?>

                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">استان:</th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                <?php echo e(province_name($address->province_id)); ?>

                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">شهر: </th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                <?php echo e(city_name($address->city_id)); ?>

                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">تلفن همراه:</th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                <?php echo e($address->cellphone); ?>

                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">تلفن ثابت:</th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                <?php echo e($address->cellphone2); ?>

                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">کد پستی:</th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                <?php echo e($address->postal_code); ?>

                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="h-50">
                                                                <div class="box-header">
                                                                    <span class="box-title">آدرس اصلی</span>
                                                                </div>
                                                                <tr>
                                                                    <td><?php echo e($address->address); ?></td>
                                                                </tr>
                                                            </div>
                                                            <div class="h-50">
                                                                <div class="box-header">
                                                                    <span class="box-title">آدرس جایگزین</span>
                                                                </div>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo e($address->lastaddress); ?>

                                                                    </td>
                                                                </tr>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-12 mt-3 mb-4">
                                                            <tr>
                                                                <td>
                                                                    <a href="<?php echo e(route('home.addreses.edit', ['address' => $address->id])); ?>" class="edit-address-link btn-Order btn btn-warning btn-sm">ویرایش
                                                                        آدرس</a>
                                                                </td>
                                                            </tr>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <!-- new address form -->
                                                <div class="shipping-address checkout-address" id="new-address">
                                                    <div>
                                                        <div class="middle-container">
                                                            <form class="form-checkout">
                                                                <div class="row form-checkout-row">
                                                                    <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                        <label for="name">عنوان آدرس<abbr class="required" title="ضروری" style="color:red;">*</abbr></span></label>
                                                                        <input type="text" id="name" name="title" value="<?php echo e(old('title')); ?>" class="input-name-checkout form-control m-0">
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
                                                                        <label for="name">نام تحویل گیرنده <abbr class="required" title="ضروری" style="color:red;">*</abbr></span></label>
                                                                        <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" class="input-name-checkout form-control m-0">
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
                                                                        <label for="phone-number">شماره موبایل <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                                        <input type="number" dir="ltr" id="phone-number" name="cellphone" value="<?php echo e(old('cellphone')); ?>" class="input-name-checkout form-control m-0 text-left">
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
                                                                        <label for="fixed-number">شماره تلفن ثابت
                                                                            <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                                        <input type="number" dir="ltr" id="fixed-number" name="cellphone2" value="<?php echo e(old('cellphone2')); ?>" class="input-name-checkout form-control m-0 text-left">
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
                                                                                <abbr class="required" title="ضروری" style="color:red;">*</abbr>
                                                                            </label>
                                                                            <select id="province_id" name="province_id" class="form-control m-0 province-select">
                                                                                <option selected="selected" disabled>
                                                                                    استان
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
                                                                                <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                                            <select name="city_id" id="city" class="city-select form-control m-0">
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
                                                                                <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                                            </label>
                                                                            <input type="text" id="apt-id" name="unit" value="<?php echo e(old('unit')); ?>" class="input-name-checkout js-input-apt-id form-control m-0">
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
                                                                        <label for="post-code">کد پستی<abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                                        <input type="number" dir="ltr" id="post-code" name="postal_code" class="input-name-checkout form-control m-0" value="<?php echo e(old('postal_code')); ?>" placeholder="کد پستی را بدون خط تیره بنویسید">
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
                                                                    <div class="col-md-6 col-12 mb-3">
                                                                        <label for="address">آدرس
                                                                            <abbr class="required" title="ضروری" style="color:red;">*</abbr>
                                                                        </label>
                                                                        <textarea rows="5" cols="30" id="address" name="address" class="textarea-name-checkout form-control m-0 "><?php echo e(old('address')); ?></textarea>
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
                                                                    <div class="col-md-6 col-12 mb-3">
                                                                        <label for="address">آدرس جایگزین
                                                                            <abbr class="required" title="ضروری" style="color:red;">*</abbr>
                                                                        </label>
                                                                        <textarea rows="5" cols="30" id="address" name="lastaddress" class="textarea-name-checkout form-control mb-0" placeholder="آدرس جایگزین در صورت ضرورت..."><?php echo e(old('lastaddress')); ?></textarea>
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
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="address">توضیحات سفارش
                                                <span class="optional">(اختیاری)</span>
                                            </label>
                                            <textarea rows="5" cols="30" name="description" class="textarea-name-checkout form-control mb-0" style="border-radius: 1rem;" value="<?php echo e(old('description')); ?>" placeholder="توضیحات ضروری دریافت محصول"></textarea>
                                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger mb-2"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="checkout-review-order">
                                <div class="row">
                                    <div class="col-lg-6  mt-4">
                                        <h3 class="order-review-heading mt-0">سفارش شما</h3>
                                        <table class="checkout-review-order-table table table-borderless revieworder mb-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="product-name">محصول</th>
                                                    <th scope="col" class="product-price">قیمت کل</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = \Cart::getContent(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="checkout-cart-item">
                                                    <td class="product-name"> <span><?php echo e($item->name); ?></span>
                                                        *
                                                        <strong><?php echo e($item->quantity); ?>

                                                        </strong>
                                                    </td>
                                                    <td class="product-price text-info">
                                                        <span class="amount"><?php echo e(number_format($item->price*$item->quantity)); ?>

                                                            <span>تومان</span>
                                                        </span>
                                                        <?php if($item->attributes->is_sale): ?>
                                                        <span style="font-size: 12px ; color:red">
                                                            ( <?php echo e($item->attributes->percent_sale); ?>%
                                                            تخفیف)
                                                        </span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                        <table class="checkout-review-order-table table table-borderless revieworder mb-3">
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>مجموع</th>
                                                    <td>
                                                        <span class="amount"><?php echo e(number_format( \Cart::getTotal() + cartTotalSaleAmount() )); ?>

                                                            <span>تومان</span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>حمل ونقل</th>
                                                    <td>
                                                        <div class="shipping-totals-item">
                                                            <span><?php if(cartTotalDeliveryAmount() == 0): ?>
                                                                <span style="color: red">
                                                                    رایگان
                                                                </span>
                                                                <?php else: ?>
                                                                <span>
                                                                    <?php echo e(number_format( cartTotalDeliveryAmount() )); ?>

                                                                    تومان
                                                                </span>
                                                                <?php endif; ?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php if(number_format( cartTotalSaleAmount() )): ?>
                                                <tr class="cart-discount">
                                                    <th>تخفیف شما از این خرید</th>
                                                    <td data-title=" تخفیف شما از این خرید ">
                                                        <div class="price">
                                                            <?php echo e(number_format( cartTotalSaleAmount() )); ?>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                                <tr class="cart-discount">
                                                    <th>مبلغ کسر شده کد تخفیف</th>
                                                    <td data-title="مبلغ کسر شده کد تخفیف">
                                                        <div class="price">
                                                            <span class="inc-coupon text-success">
                                                                <?php echo e(number_format( session()->get('coupon.amount') )); ?>

                                                                تومان
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="cart-discount">
                                                    <th><strong>مبلغ قابل پرداخت</strong></th>
                                                    <td data-title="مبلغ قابل پرداخت">
                                                        <div class="price">
                                                            <strong id="final-amounts">
                                                                <?php echo e(number_format( cartTotalAmount() )); ?>

                                                                تومان
                                                            </strong>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>

                                        </table>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <?php if(!session()->has('coupon')): ?>
                                        <div class="content-checkout" id="coupon-box">
                                            <div class="notices-wrapper">
                                                <div class="form-coupon-toggle">
                                                    <div class="info">
                                                        کد تخفیف دارید؟
                                                        <a href="javascript:void(0);" class="showcoupon">برای نوشتن کد
                                                            اینجا کلیک کنید</a>
                                                    </div>
                                                    <div class="checkout-coupon">
                                                        <p class="mr-4">اگر کد تخفیف دارید، لطفا وارد کنید.</p>
                                                        <form class="form-coupon col-md-7">
                                                            <div class="form-row d-flex">
                                                                <input type="text" name="coupon-code" class="checkout-discount-code" placeholder="کد تخفیف">
                                                                <div class="append pl">
                                                                    <button class="btn-append btn btn-info bg-info border-info" type="submit">اعمال
                                                                        تخفیف</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <thead>
                                            <h5 class="my-3"> انتخاب درگاه پرداخت</h5>
                                        </thead>
                                        <ul class="checkout-payment-methods">
                                            <li class="checkout-payment-method-item d-block">
                                                <label for="#" class="outline-radio">
                                                    <input form="checkout" type="radio" name="payment_method" value="zarinpal" id="payment-option-online" checked>
                                                    <span class="outline-radio-check"></span>
                                                </label>
                                                <label for="#" class="shipping-totals-title-row">
                                                    <div class="shipping-totals-title">درگاه پرداخت زرین پال
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="checkout-payment-method-item d-block">
                                                <label for="#" class="outline-radio">
                                                    <input form="checkout" type="radio" name="payment_method" value="paypal" id="payment-option-online">
                                                    <span class="outline-radio-check"></span>
                                                </label>
                                                <label for="#" class="shipping-totals-title-row">
                                                    <div class="shipping-totals-title">درگاه پرداخت پی پال</div>
                                                </label>
                                            </li>
                                        </ul>
                                        <div class="form-auth-row">

                                            <label for="#" class="ui-checkbox mt-1">
                                                <input type="checkbox" value="1" oninvalid="this.setCustomValidity('تیک قوانین و حریم خصوصی را پس از مطالعه بزنید')" oninput="this.setCustomValidity('')" required form="checkout" id="remember">
                                                <span class="ui-checkbox-check"></span>
                                            </label>
                                            <label for="remember" class="remember-me mr-0"><a href="<?php echo e(route('privacy')); ?>">حریم خصوصی</a> و
                                                <a href="<?php echo e(route('ruls')); ?>">شرایط قوانین </a>استفاده از سرویس های سایت
                                                را
                                                مطالعه نموده و با کلیه موارد آن موافقم <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                        </div>
                                        <button form="checkout" class="btn-Order btn btn-primary mt-4 mb-3" type="submit"> <i class="fa fa-shopping-cart fa-flip-horizontal fa-lg"></i>
                                            ثبت سفارش</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- checkout------------------------------>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<script>
    var previous;
    $('#address-option').on('focus', function() {

        previous = $(this).val();
    }).change(function() {

        let categoryId = $(this).val();

        if (categoryId == "new") {
            $('#new-address').show();
        } else {
            $('#new-address').hide();
        }

        $("#" + previous + "").hide();
        $("#" + categoryId + "").show();

        Swal.fire({
            text: 'آدرس ارسال محصول تغییر کرد',
            icon: "success",
            timer: 1500,
            confirmButtonText: 'تایید',
            timerProgressBar: true
        });


    })
</script>

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
<script>
    $('#address-checkout').click(function() {
        $('#address-form').toggle();

    })
</script>

<script>
    $(document).ready(function(e) {

        if ($('#zarinpal').hasClass('collapse')) {
            $('#pay-methode').val('zarinpal');
        }
        if ($('#paypal-1').hasClass('collapse')) {
            $('#pay-methode').val('pay');
        }

        let categoryId = $('#address-option').val();
        if (categoryId == "new") {

            $('#sub-address').show();
        } else {
            $('#sub-address').hide();
        }


    })

    $('#zarinpal').click(function() {
        $('#pay-methode').val('zarinpal');
    })

    $('#paypal-1').click(function() {
        $('#pay-methode').val('pay');
    })
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/cart/checkout.blade.php ENDPATH**/ ?>