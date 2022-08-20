@extends('home.layout.MasterHome')
@section('title', "پرداخت ")
@section('content')
<!-- checkout------------------------------>
<div class="container-main">
    <div class="d-block">
        <section class="blog-checkout d-block order-1">
            <div class="col-lg">
                <div class="checkout woocommerce-checkout">
                    <div class="content-checkout container">
                        @if (!session()->has('coupon'))
                        <div class="notices-wrapper">
                            <div class="col-12">
                                <div class="form-coupon-toggle">
                                    <div class="info">
                                        کد تخفیف دارید؟
                                        <a class="showcoupon">برای نوشتن کد اینجا کلیک کنید</a>
                                    </div>
                                    <div class="checkout-coupon form-coupon">
                                        <p>اگر کد تخفیف دارید، لطفا وارد کنید.</p>
                                        <div class="form-row">
                                            <input type="text" name="coupon-code" class="checkout-discount-code"
                                                placeholder="کد تخفیف" id="coupon_code">
                                            <div class="append pl">
                                                <button class="btn-append btn btn-primary btn-coupon"
                                                    name="apply_coupon" type="submit">اعمال
                                                    تخفیف</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="middle-container">

                            <form class="form form-checkout" id="checkout" action="{{route('home.payment')}}"
                                method="POST">
                                @csrf
                                <div class="col2-set" id="customer-details">
                                    <div class="col-12">
                                        <div class="billing-fields mt-4">
                                            <h4>جزئیات صورتحساب</h4>
                                            <div class="form-checkout-row">

                                                @if ($addresses ->count() > 0)
                                                <div class="validate-required">
                                                    <label>انتخاب آدرس</label>
                                                    <select class="form-control form-control-md" name="address_id">
                                                        @foreach ($addresses as $address)
                                                        <option value="{{$address->id}}">
                                                            {{$address->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif

                                                <div class="validate-required">
                                                    <label for="name">نام تحویل گیرنده <abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></span></label>
                                                    <input type="text" id="name" name="firstname"
                                                        class="input-name-checkout form-control">
                                                </div>

                                                <div class="validate-required">
                                                    <label for="phone-number">نام خانوادگی<abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></label>
                                                    <input type="text" id="phone-number" name="lastname"
                                                        class="input-name-checkout form-control text-left">
                                                </div>
                                                @if ($addresses ->count() > 0)
                                                <div class="validate-required">
                                                    <select class="form-control form-control-md" name="address_id">
                                                        @foreach ($addresses as $address)
                                                        <option value="{{$address->id}}">
                                                            {{$address->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="Order-another-shipping-address mt-5">
                                                    <div class="Order-address d-inline-block">
                                                        <a class="btn btn-block text-right collapsed"
                                                            data-toggle="collapse" href="#collapseExample" role="button"
                                                            aria-expanded="false" aria-controls="collapseExample">
                                                            <span>سفارش به آدرس دیگری حمل شود؟</span>
                                                        </a>
                                                    </div>
                                                    <div class="shipping-address">
                                                        <div id="collapseExample" class="collapse">
                                                            <div class="middle-container">
                                                                <form class="form-checkout">
                                                                    <div class="form-checkout-row">
                                                                        <label for="name">نام تحویل گیرنده <abbr
                                                                                class="required" title="ضروری"
                                                                                style="color:red;">*</abbr></span></label>
                                                                        <input type="text" id="name"
                                                                            class="input-name-checkout form-control">
                                                                        <label for="phone-number">شماره موبایل <abbr
                                                                                class="required" title="ضروری"
                                                                                style="color:red;">*</abbr></label>
                                                                        <input type="text" id="phone-number"
                                                                            class="input-name-checkout form-control text-left">
                                                                        <label for="fixed-number">شماره تلفن ثابت
                                                                            <abbr class="required" title="ضروری"
                                                                                style="color:red;">*</abbr></label>
                                                                        <input type="text" id="fixed-number"
                                                                            class="input-name-checkout form-control text-left">

                                                                        <div class="form-checkout-valid-row">
                                                                            <label for="province">استان
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr>
                                                                            </label>
                                                                            <select name="" id="province"
                                                                                class="form-control">
                                                                                <option value="date-desc"
                                                                                    selected="selected">استان مورد
                                                                                    نظر خود را انتخاب کنید </option>
                                                                                <option value="date-asc">تهران
                                                                                </option>
                                                                                <option value="rate">مشهد</option>
                                                                                <option value="views">اصفهان
                                                                                </option>
                                                                                <option value="comments">شیراز
                                                                                </option>
                                                                            </select>
                                                                            <label for="bld-num">پلاک
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr>
                                                                            </label>
                                                                            <input type="text" id="bld-num"
                                                                                class="input-name-checkout js-input-bld-num form-control">

                                                                        </div>

                                                                        <div class="form-checkout-valid-row">
                                                                            <label for="city">شهر
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></label>
                                                                            <select name="" id="city"
                                                                                class="form-control">
                                                                                <option value="date-desc"
                                                                                    selected="selected">شهر مورد نظر
                                                                                    خود را انتخاب کنید</option>
                                                                                <option value="date-asc">آشخانه
                                                                                </option>
                                                                                <option value="rate">شیروان</option>
                                                                                <option value="views">اسفراین
                                                                                </option>
                                                                                <option value="comments">جاجرم
                                                                                </option>
                                                                            </select>
                                                                            <label for="apt-id">واحد</label>
                                                                            <input type="text" id="apt-id"
                                                                                class="input-name-checkout js-input-apt-id form-control">
                                                                        </div>

                                                                        <label for="post-code">کد پستی<abbr
                                                                                class="required" title="ضروری"
                                                                                style="color:red;">*</abbr></label>
                                                                        <input type="text" id="post-code"
                                                                            class="input-name-checkout form-control"
                                                                            placeholder="کد پستی را بدون خط تیره بنویسید">

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="Order-another-shipping-address mt-5">
                                                    <div class="shipping-address">
                                                        <div>
                                                            <div class="middle-container">
                                                                <form class="form-checkout">
                                                                    <div class="form-checkout-row">
                                                                        <label for="name">نام تحویل گیرنده <abbr
                                                                                class="required" title="ضروری"
                                                                                style="color:red;">*</abbr></span></label>
                                                                        <input type="text" id="name"
                                                                            class="input-name-checkout form-control">
                                                                        <label for="phone-number">شماره موبایل <abbr
                                                                                class="required" title="ضروری"
                                                                                style="color:red;">*</abbr></label>
                                                                        <input type="text" id="phone-number"
                                                                            class="input-name-checkout form-control text-left">
                                                                        <label for="fixed-number">شماره تلفن ثابت
                                                                            <abbr class="required" title="ضروری"
                                                                                style="color:red;">*</abbr></label>
                                                                        <input type="text" id="fixed-number"
                                                                            class="input-name-checkout form-control text-left">

                                                                        <div class="form-checkout-valid-row">
                                                                            <label for="province">استان
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr>
                                                                            </label>
                                                                            <select name="" id="province"
                                                                                class="form-control">
                                                                                <option value="date-desc"
                                                                                    selected="selected">استان مورد
                                                                                    نظر خود را انتخاب کنید </option>
                                                                                <option value="date-asc">تهران
                                                                                </option>
                                                                                <option value="rate">مشهد</option>
                                                                                <option value="views">اصفهان
                                                                                </option>
                                                                                <option value="comments">شیراز
                                                                                </option>
                                                                            </select>
                                                                            <label for="bld-num">پلاک
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr>
                                                                            </label>
                                                                            <input type="text" id="bld-num"
                                                                                class="input-name-checkout js-input-bld-num form-control">

                                                                        </div>

                                                                        <div class="form-checkout-valid-row">
                                                                            <label for="city">شهر
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></label>
                                                                            <select name="" id="city"
                                                                                class="form-control">
                                                                                <option value="date-desc"
                                                                                    selected="selected">شهر مورد نظر
                                                                                    خود را انتخاب کنید</option>
                                                                                <option value="date-asc">آشخانه
                                                                                </option>
                                                                                <option value="rate">شیروان</option>
                                                                                <option value="views">اسفراین
                                                                                </option>
                                                                                <option value="comments">جاجرم
                                                                                </option>
                                                                            </select>
                                                                            <label for="apt-id">واحد</label>
                                                                            <input type="text" id="apt-id"
                                                                                class="input-name-checkout js-input-apt-id form-control">
                                                                        </div>

                                                                        <label for="post-code">کد پستی<abbr
                                                                                class="required" title="ضروری"
                                                                                style="color:red;">*</abbr></label>
                                                                        <input type="text" id="post-code"
                                                                            class="input-name-checkout form-control"
                                                                            placeholder="کد پستی را بدون خط تیره بنویسید">

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                <label for="address">توضیحات سفارش
                                                    <span class="optional">(اختیاری)</span>
                                                </label>
                                                <textarea rows="5" cols="30" id="address"
                                                    class="textarea-name-checkout form-control"
                                                    placeholder="یادداشت ها درباره سفارش شما ، برای مثال نکات مهم برای تحویل بار "></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="order-review-heading">سفارش شما</h3>
                                <div class="checkout-review-order">
                                    <table class="checkout-review-order-table table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="product-name">محصول</th>
                                                <th scope="col" class="product-price">قیمت کل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="checkout-cart-item">
                                                <td class="product-name">تی شرت به رسم طرح دریم کچر کد 558</td>
                                                <td class="product-price text-info">
                                                    <span class="amount">32,000
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>مجموع</th>
                                                <td>
                                                    <span class="amount">32,000
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>حمل ونقل</th>
                                                <td>
                                                    <div class="shipping-totals-item">
                                                        <span class="shipping-destination">حمل و نقل به خراسان
                                                            شمالی</span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="cart-discount">
                                                <th>تخفیف شما از این خرید</th>
                                                <td data-title=" تخفیف شما از این خرید ">
                                                    <div class="price">
                                                        <del>
                                                            <span>32,000
                                                                <span>تومان</span>
                                                            </span>
                                                        </del>
                                                        <ins>
                                                            <span class="amount">25,000
                                                                <span>تومان</span>
                                                            </span>
                                                        </ins>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <ul class="checkout-payment-methods">
                                        <li class="checkout-payment-method-item d-block">
                                            <label for="#" class="outline-radio">
                                                <input type="radio" name="payment_method" id="payment-option-online"
                                                    checked>
                                                <span class="outline-radio-check"></span>
                                            </label>
                                            <label for="#" class="shipping-totals-title-row">
                                                <div class="shipping-totals-title">افزایش اعتبار و پرداخت از کیف پول
                                                </div>
                                            </label>
                                        </li>
                                        <li class="checkout-payment-method-item d-block">
                                            <label for="#" class="outline-radio">
                                                <input type="radio" name="payment_method" id="payment-option-online">
                                                <span class="outline-radio-check"></span>
                                            </label>
                                            <label for="#" class="shipping-totals-title-row">
                                                <div class="shipping-totals-title">پرداخت اینترنتی هوشمند</div>
                                            </label>
                                        </li>
                                        <li class="checkout-payment-method-item d-block">
                                            <label for="#" class="outline-radio">
                                                <input type="radio" name="payment_method" id="payment-option-online">
                                                <span class="outline-radio-check"></span>
                                            </label>
                                            <label for="#" class="shipping-totals-title-row">
                                                <div class="shipping-totals-title">پرداخت هنگام دریافت</div>
                                            </label>
                                        </li>
                                    </ul>
                                    <div class="form-auth-row">
                                        <label for="#" class="ui-checkbox mt-1">
                                            <input type="checkbox" value="1" name="login" id="remember">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="remember" class="remember-me mr-0"><a href="#">حریم خصوصی</a> و
                                            <a href="#">شرایط قوانین </a>استفاده از سرویس های سایت دیجی‌اسمارت را
                                            مطالعه نموده و با کلیه موارد آن موافقم <abbr class="required" title="ضروری"
                                                style="color:red;">*</abbr></label>
                                    </div>
                                    <button class="btn-Order btn btn-primary mt-4 mb-3" type="submit">ثبت
                                        سفارش</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- checkout------------------------------>
@endsection
@push('scripts')
<script>
$('.province-select').change(function() {

    var provinceID = $(this).val();
    if (provinceID) {
        $.ajax({
            type: "GET",
            url: "{{ url('/get-province-cities-list') }}?province_id=" + provinceID,
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

})

$('#zarinpal').click(function() {
    $('#pay-methode').val('zarinpal');
})

$('#paypal-1').click(function() {
    $('#pay-methode').val('pay');
})
</script>

@endpush