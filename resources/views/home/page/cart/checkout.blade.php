@extends('home.layout.MasterHome')
@section('title', "پرداخت ")
@section('content')
<main class="main checkout">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="{{route('home.cart.index')}}">سبد خرید فروشگاه </a></li>
                <li class="active"><a href="{{route('home.orders.checkout')}}">پرداخت </a></li>
                <li><a href="order.html">سفارش کامل شد</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->


    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">

            @if (!session()->has('coupon'))
            <div class="coupon-toggle">
                کوپن دارید؟ <a href="#" class="show-coupon font-weight-bold text-uppercase text-dark">کد را وارد
                    کنید</a>
            </div>
            <div class="coupon-content mb-4">
                <p>اگر کد کوپن دارید ، لطفاً آن را در زیر اعمال کنید.</p>
                <div class="input-wrapper-inline">
                    <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2"
                        placeholder="کد تخفیف" id="coupon_code">
                    <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon"
                        value="اعمال کد">اعمال کد</button>
                </div>
            </div>
            @endif


            <div>
                <div class="row mb-9">
                    <div class="col-lg-7 pr-lg-4 mb-4">
                        @if (auth()->check())
                        <button id='address-checkout' class="btn btn-primary btn-car mb-4">ایجاد آدرس جدید</button>
                        <form class="form account-details-form"
                            style={{$addresses ->count() > 0 ? 'display:none' : '' }} id="address-form"
                            action="{{route('home.addreses.store')}}" method="POST">
                            @csrf
                            <div class="row gutter-sm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">عنوان *
                                                @error('title')
                                                <strong style="color: red; margin-right: 1rem;">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <input type="text" id="firstname" name="title" value="{{old('title')}}"
                                                class="form-control form-control-md">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cellphone">شماره تماس *
                                                @error('cellphone')
                                                <strong style="color: red;margin-right: 1rem">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <input type="text" id="cellphone" name="cellphone"
                                                value="{{old('cellphone')}}" class="form-control form-control-md">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">استان *
                                                @error('province_id')
                                                <strong style="color: red; margin-right: 1rem;">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <select name="province_id"
                                                class="form-control form-control-md province-select" id="province_id">
                                                <option></option>
                                                @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">شهر *
                                                @error('city_id')
                                                <strong style="color: red; margin-right: 1rem;">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <select class="form-control form-control-md city-select" name="city_id">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postal_code">کد پستی *
                                                @error('postal_code')
                                                <strong style="color: red;margin-right: 1rem">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <input type="text" id="postal_code" name="postal_code"
                                                value="{{old('postal_code')}}" class="form-control form-control-md">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="display-name">آدرس *
                                        @error('address')
                                        <strong style="color: red; margin-right: 1rem;">{{ $message }}</strong>
                                        @enderror
                                    </label>


                                    <textarea name="address" id="address" cols="30" rows="6"
                                        class="form-control form-control-md mb-0">{{old('cellphone')}}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary btn-car mb-4">ایجاد </button>

                            </div>
                        </form>

                        @else
                        <div>
                            <a href="#login-popup" class="d-lg-show login sign-in">برای ادامه خرید باید وارد حساب کاربری
                                خود شوید.
                            </a>
                        </div>
                        @endif


                        <form class="form checkout-form" id="checkout" action="{{route('home.payment')}}" method="POST">
                            @csrf
                            @if ($addresses ->count() > 0)
                            <div class="row gutter-sm">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>انتخاب آدرس</label>
                                        <select class="form-control form-control-md" name="address_id">
                                            @foreach ($addresses as $address)
                                            <option value="{{$address->id}}">
                                                {{$address->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>نام کوچک *</label>
                                        <input type="text" class="form-control form-control-md" name="firstname"
                                            required>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>نام خانوادگی *</label>
                                        <input type="text" class="form-control form-control-md" name="lastname"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="payment_method" id="pay-methode">
                            @else
                            ابتدا باید آدرس خود را ایجاد کنید
                            @endif

                        </form>
                    </div>

                    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                        <div class="order-summary-wrapper sticky-sidebar">
                            <div class="order-summary">
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                <b>محصول </b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(\Cart::getContent() as $item)
                                        <tr class="bb-no">
                                            <td class="product-name">{{$item->name}} <i style=" font-size: 12px;"
                                                    class="fas fa-times">{{$item->quantity}} </i>

                                            </td>

                                            <td> {{ \App\Models\Attribute::find($item->attributes->attribute_id)->name }}
                                            </td>
                                            <td>:{{ $item->attributes->value }}</td>


                                            </td>

                                            <td class="product-total">{{number_format($item->price*$item->quantity)}}
                                                تومان
                                                @if($item->attributes->is_sale)
                                                <span style="font-size: 12px ; color:red">
                                                    ( {{ $item->attributes->percent_sale }}%
                                                    تخفیف)
                                                </span>
                                                @endif
                                            </td>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                    <tfoot>
                                        <tr class="shipping-methods">
                                            <div class="cart-summary mb-4">
                                                <center>
                                                    <h3 class="cart-title text-uppercase">سفارش شما</h3>
                                                </center>
                                                <div
                                                    class="cart-subtotal d-flex align-items-center justify-content-between">
                                                    <label class="ls-25">مبلغ سفارش</label>
                                                    <span>{{ number_format( \Cart::getTotal() + cartTotalSaleAmount() ) }}
                                                        تومان</span>
                                                </div>

                                                <hr class="divider">

                                                <div
                                                    class="cart-subtotal d-flex align-items-center justify-content-between">
                                                    <label class="ls-25">مبلع تخفیف کالا ها</label>
                                                    <span>{{ number_format( cartTotalSaleAmount() ) }}
                                                        تومان</span>
                                                </div>

                                                <hr class="divider">

                                                <div
                                                    class="cart-subtotal d-flex align-items-center justify-content-between">
                                                    <label class="ls-25">کد تخیف</label>
                                                    <span>{{ number_format( session()->get('coupon.amount') ) }}
                                                        تومان</span>
                                                </div>

                                                <hr class="divider">
                                                <div
                                                    class="cart-subtotal d-flex align-items-center justify-content-between">
                                                    <label class="ls-25">هزینه ارسال</label>
                                                    <span>@if(cartTotalDeliveryAmount() == 0)
                                                        <span style="color: red">
                                                            رایگان
                                                        </span>
                                                        @else
                                                        <span>
                                                            {{ number_format( cartTotalDeliveryAmount() ) }}
                                                            تومان
                                                        </span>
                                                        @endif</span>
                                                </div>


                                                <ul class="shipping-methods mb-2">

                                                </ul>

                                                <hr class="divider mb-6">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label style="font-size: 25px; color:#336699">مجموع خرید</label>
                                                    <span
                                                        style="font-size: 25px; color:#336699">{{ number_format( cartTotalAmount() ) }}
                                                        تومان</span>
                                                </div>
                                            </div>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="payment-methods" id="payment_method">
                                    <h4 class="title font-weight-bold ls-25 pb-0 mb-1">روشهای پرداخت </h4>
                                    <div class="accordion payment-accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#cash-on-delivery" id="zarinpal" class="collapse">زرین پال</a>
                                            </div>
                                            <div id="cash-on-delivery" class="card-body expanded">
                                                <p class="mb-0">
                                                    زرین پال برای انتقال به حساب شما استفاده میشود
                                                </p>
                                            </div>
                                        </div>

                                        <div class="card p-relative">
                                            <div class="card-header">
                                                <a href="#paypal" id="paypal-1" class="expand">پی پال </a>
                                            </div>
                                            <a href="https://www.paypal.com/us/webapps/mpp/paypal-popup"
                                                class="text-primary paypal-que" onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal',
                                                        'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); 
                                                        return false;">PayPal چیست؟
                                            </a>
                                            <div id="paypal" class="card-body collapsed">
                                                <p class="mb-0">
                                                    پرداخت از طریق PayPal ، اگر حساب PayPal ندارید می توانید با کارت
                                                    اعتباری خود پرداخت کنید.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group place-order pt-6">
                                <button type="submit" form="checkout" class="btn btn-dark btn-block btn-rounded">ثبت
                                    سفارش</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End of PageContent -->
</main>

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

@endsection