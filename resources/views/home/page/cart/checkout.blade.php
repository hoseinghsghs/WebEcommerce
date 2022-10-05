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
                        <div class="middle-container">
                            <form class="form form-checkout" id="checkout" action="{{route('home.payment')}}"
                                method="POST">
                                @csrf
                                <div class="col2-set" id="customer-details">
                                    <div class="col-12">
                                        <div class="billing-fields mt-4">
                                            <h4>جزئیات صورتحساب</h4>
                                            <div class="form-checkout-row">
                                                @if (!$addresses ->count() > 0)
                                                <div class="Order-another-shipping-address mt-2 mb-2">
                                                    <div class="validate-required mb-3">
                                                        <label>انتخاب آدرس</label>
                                                        <select class="form-control form-control-md mb-0"
                                                            name="address_id" id="address-option">
                                                            <option value="new">آدرس جدید</option>
                                                        </select>
                                                        @error('address_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="shipping-address">
                                                        <div>
                                                            <div class="middle-container">
                                                                <form class="form-checkout">
                                                                    <div class="row form-checkout-row">

                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <label for="name">عنوان آدرس<abbr
                                                                                    class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></span></label>
                                                                            <input type="text" id="name" name="title"
                                                                                value="{{ old('title') }}"
                                                                                class="input-name-checkout form-control m-0">
                                                                            @error('title')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <label for="name">نام تحویل گیرنده <abbr
                                                                                    class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></span></label>
                                                                            <input type="text" id="name" name="name"
                                                                                value="{{ old('name') }}"
                                                                                class="input-name-checkout form-control m-0">
                                                                            @error('name')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror


                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <label for="phone-number">شماره موبایل <abbr
                                                                                    class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></label>
                                                                            <input type="text" id="phone-number"
                                                                                name="cellphone"
                                                                                value="{{ old('cellphone') }}"
                                                                                class="input-name-checkout form-control m-0 text-left">
                                                                            @error('cellphone')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <label for="fixed-number">شماره تلفن ثابت
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></label>
                                                                            <input type="text" id="fixed-number"
                                                                                name="cellphone2"
                                                                                value="{{ old('cellphone2') }}"
                                                                                class="input-name-checkout form-control m-0 text-left">
                                                                            @error('cellphone2')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <div class="form-checkout-valid-row">
                                                                                <label for="province">استان
                                                                                    <abbr class="required" title="ضروری"
                                                                                        style="color:red;">*</abbr>
                                                                                </label>
                                                                                <select id="province_id"
                                                                                    name="province_id"
                                                                                    class="form-control m-0 province-select">
                                                                                    <option selected="selected"
                                                                                        disabled>استان
                                                                                        مورد
                                                                                        نظر خود را انتخاب کنید </option>
                                                                                    @foreach ($provinces as $province)
                                                                                    <option value="{{ $province->id }}">
                                                                                        {{ $province->name }}
                                                                                    </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('province_id')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
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
                                                                                @error('city_id')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <div class="form-checkout-valid-row">
                                                                                <label for="apt-id">واحد
                                                                                    <span class="optional"> (اختیاری)
                                                                                    </span>
                                                                                </label>
                                                                                <input type="text" id="apt-id"
                                                                                    name="unit"
                                                                                    value="{{ old('unit') }}"
                                                                                    class="input-name-checkout js-input-apt-id form-control m-0">
                                                                                @error('unit')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <label for="post-code">کد پستی<abbr
                                                                                    class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></label>
                                                                            <input type="text" id="post-code"
                                                                                name="postal_code"
                                                                                class="input-name-checkout form-control m-0"
                                                                                value="{{ old('postal_code') }}"
                                                                                placeholder="کد پستی را بدون خط تیره بنویسید">
                                                                            @error('postal_code')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                                            <label for="address">آدرس
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr>
                                                                            </label>
                                                                            <textarea rows="5" cols="30" id="address"
                                                                                name="address"
                                                                                class="textarea-name-checkout form-control m-0 ">{{ old('address') }}</textarea>
                                                                            @error('address')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                                            <label for="address">آدرس اضطراری
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr>
                                                                            </label>
                                                                            <textarea rows="5" cols="30" id="address"
                                                                                name="lastaddress"
                                                                                class="textarea-name-checkout form-control mb-0"
                                                                                placeholder="آدرس اضطراری در صورت بروز مشکل...">{{ old('lastaddress') }}</textarea>
                                                                            @error('lastaddress')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="validate-required mb-3">
                                                    <label>انتخاب آدرس</label>
                                                    <select class="form-control form-control-md mb-0" name="address_id"
                                                        id="address-option">
                                                        <option value="new">آدرس جدید</option>
                                                        @foreach ($addresses as $address)
                                                        <option value="{{$address->id}}">
                                                            {{$address->title}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('address_id')
                                                    <span class="text-danger mb-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                @foreach ($addresses as $address)
                                                <div id="dchange">
                                                    <div class="Order-another-shipping-address mt-2"
                                                        style="display: none" ; id="{{$address->id}}">
                                                        <div class="col-lg-12 col-12 mt-3 ">
                                                            <div class="box-header">
                                                                <span class="box-title">آدرس ارسال محصول</span>
                                                            </div>
                                                            <table class="table table-borderless">

                                                                <tfoot>
                                                                    <tr>
                                                                        <th scope="row">عنوان:</th>
                                                                        <td>
                                                                            <span class="amount">

                                                                                {{ $address->title }}
                                                                            </span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row">نام تحویل گیرنده:</th>
                                                                        <td>
                                                                            <span class="amount">

                                                                                {{ $address->name }}
                                                                            </span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row">استان:</th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                {{ province_name($address->province_id) }}

                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">شهر: </th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                {{ city_name($address->city_id) }}
                                                                            </span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row"> شماره 1: </th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                {{ $address->cellphone }}
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"> شماره 2: </th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                {{ $address->cellphone2 }}
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"> کد پستی: </th>
                                                                        <td>
                                                                            <span class="amount">
                                                                                {{ $address->postal_code }}
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                        <div class="col-lg-12 col-12 mt-3 ">
                                                            <div class="box-header">
                                                                <span class="box-title">آدرس اول</span>
                                                            </div>
                                                            <tr>
                                                                <td>{{ $address->address }}
                                                                </td>
                                                            </tr>
                                                        </div>
                                                        <div class="col-lg-12 col-12 mt-3 mb-2">
                                                            <div class="box-header">
                                                                <span class="box-title">آدرس
                                                                    جایگزین</span>
                                                            </div>
                                                            <tr>
                                                                <td>
                                                                    {{ $address->lastaddress }}
                                                                </td>
                                                            </tr>
                                                        </div>
                                                        <div class="col-lg-12 col-12 mt-3 mb-4">
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ route('home.addreses.edit', ['address' => $address->id]) }}"
                                                                        class="edit-address-link btn-Order btn btn-warning btn-sm mb-3">ویرایش
                                                                        آدرس</a>
                                                                </td>
                                                            </tr>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class=" Order-another-shipping-address mt-2 " id="sub-address"
                                                    style="display: none;">
                                                    <div class="shipping-address">
                                                        <div>
                                                            <div class="middle-container">
                                                                <form class="form-checkout">
                                                                    <div class="row form-checkout-row">

                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <label for="name">عنوان آدرس<abbr
                                                                                    class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></span></label>
                                                                            <input type="text" id="title" name="title"
                                                                                value="{{old('title')}}"
                                                                                class="input-name-checkout form-control m-0">
                                                                            @error('title')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <label for="name">نام تحویل گیرنده <abbr
                                                                                    class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></span></label>
                                                                            <input type="text" id="name" name="name"
                                                                                value="{{old('name')}}"
                                                                                class="input-name-checkout form-control m-0">
                                                                            @error('name')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <label for="phone-number">شماره موبایل <abbr
                                                                                    class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></label>
                                                                            <input type="text" id="phone-number"
                                                                                name="cellphone"
                                                                                value="{{old('cellphone')}}"
                                                                                class="input-name-checkout form-control m-0 text-left">
                                                                            @error('cellphone')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <label for="fixed-number">شماره تلفن ثابت
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></label>
                                                                            <input type="text" id="fixed-number"
                                                                                name="cellphone2"
                                                                                value="{{old('cellphone2')}}"
                                                                                class="input-name-checkout form-control m-0 text-left">
                                                                            @error('cellphone2')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <div class="form-checkout-valid-row">
                                                                                <label for="province">استان
                                                                                    <abbr class="required" title="ضروری"
                                                                                        style="color:red;">*</abbr>
                                                                                </label>
                                                                                <select id="province_id"
                                                                                    name="province_id"
                                                                                    class="form-control m-0 province-select">
                                                                                    <option selected="selected"
                                                                                        disabled>استان
                                                                                        مورد
                                                                                        نظر خود را انتخاب کنید </option>
                                                                                    @foreach ($provinces as $province)
                                                                                    <option value="{{ $province->id }}">
                                                                                        {{ $province->name }}
                                                                                    </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('province_id')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
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
                                                                                @error('city_id')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <div class="form-checkout-valid-row">
                                                                                <label for="apt-id">واحد
                                                                                    <span class="optional"> (اختیاری)
                                                                                    </span>
                                                                                </label>
                                                                                <input type="text" id="apt-id"
                                                                                    name="unit" value="{{old('unit')}}"
                                                                                    class="input-name-checkout js-input-apt-id form-control m-0">
                                                                                @error('unit')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                                            <label for="post-code">کد پستی<abbr
                                                                                    class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr></label>
                                                                            <input type="text" id="post-code"
                                                                                name="postal_code"
                                                                                value="{{old('postal_code')}}"
                                                                                class="input-name-checkout form-control m-0"
                                                                                placeholder="کد پستی را بدون خط تیره بنویسید">
                                                                            @error('postal_code')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                                            <label for="address">آدرس
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr>
                                                                            </label>
                                                                            <textarea rows="5" cols="30" id="address"
                                                                                name="address"
                                                                                class="textarea-name-checkout form-control m-0 ">{{old('address')}}</textarea>
                                                                            @error('address')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                                            <label for="address">آدرس اضطراری
                                                                                <abbr class="required" title="ضروری"
                                                                                    style="color:red;">*</abbr>
                                                                            </label>
                                                                            <textarea rows="5" cols="30" id="address"
                                                                                name="lastaddress"
                                                                                class="textarea-name-checkout form-control mb-0"
                                                                                placeholder="آدرس اضطراری در صورت بروز مشکل...">{{old('lastaddress')}}</textarea>
                                                                            @error('lastaddress')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            @endif
                                            <div class="row mr-0">
                                                <label for="address">توضیحات سفارش
                                                    <span class="optional">(اختیاری)</span>
                                                </label>
                                                <textarea rows="5" cols="30" id="address" name="description"
                                                    class="textarea-name-checkout form-control mb-0"
                                                    style="border-radius: 1rem;" value="{{old('description')}}"
                                                    placeholder="توضیحات ضروری دریافت محصول"></textarea>
                                                @error('description')
                                                <span class="text-danger mb-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="checkout-review-order">
                            <div class="row">
                                <div class="col-lg-6 order-2 mt-4">
                                    <h3 class="order-review-heading mt-0">سفارش شما</h3>

                                    <table class="checkout-review-order-table table table-borderless revieworder mb-3">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="product-name">محصول</th>
                                                <th scope="col" class="product-price">قیمت کل</th>
                                            </tr>

                                        </thead>

                                        <tbody>
                                            @foreach(\Cart::getContent() as $item)
                                            <tr class="checkout-cart-item">
                                                <td class="product-name"> <span>{{$item->name}}</span>
                                                    *
                                                    <strong>{{$item->quantity}}
                                                    </strong>
                                                </td>
                                                <td class="product-price text-info">
                                                    <span class="amount">{{number_format($item->price*$item->quantity)}}
                                                        <span>تومان</span>
                                                    </span>
                                                    @if($item->attributes->is_sale)
                                                    <span style="font-size: 12px ; color:red">
                                                        ( {{ $item->attributes->percent_sale }}%
                                                        تخفیف)
                                                    </span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table class="checkout-review-order-table table table-borderless revieworder mb-3">


                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>مجموع</th>
                                                <td>
                                                    <span
                                                        class="amount">{{ number_format( \Cart::getTotal() + cartTotalSaleAmount() ) }}
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>حمل ونقل</th>
                                                <td>
                                                    <div class="shipping-totals-item">
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
                                                </td>
                                            </tr>

                                            @if (number_format( cartTotalSaleAmount() ))
                                            <tr class="cart-discount">
                                                <th>تخفیف شما از این خرید</th>
                                                <td data-title=" تخفیف شما از این خرید ">
                                                    <div class="price">
                                                        {{ number_format( cartTotalSaleAmount() ) }}
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif


                                            <tr class="cart-discount">
                                                <th>مبلغ کسر شده کد تخفیف</th>
                                                <td data-title=" تخفیف شما از این خرید ">
                                                    <div class="price">
                                                        <span class="inc-coupon text-success">
                                                            {{ number_format( session()->get('coupon.amount') ) }} تومان
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr class="cart-discount">
                                                <th>مبلغ قابل پرداخت</th>
                                                <td data-title=" تخفیف شما از این خرید ">
                                                    <div class="price">
                                                        {{ number_format( cartTotalAmount() ) }}
                                                        تومان
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>

                                <div class="col-lg-6 order-3 mt-4">

                                    <thead>
                                        <h5 class="mb-3"> انتخاب درگاه پرداخت</h5>
                                    </thead>
                                    <ul class="checkout-payment-methods">
                                        <li class="checkout-payment-method-item d-block">
                                            <label for="#" class="outline-radio">
                                                <input type="radio" name="payment_method" value="zarinpal"
                                                    id="payment-option-online" checked>
                                                <span class="outline-radio-check"></span>
                                            </label>
                                            <label for="#" class="shipping-totals-title-row">
                                                <div class="shipping-totals-title">درگاه پرداخت زرین پال
                                                </div>
                                            </label>
                                        </li>
                                        <li class="checkout-payment-method-item d-block">
                                            <label for="#" class="outline-radio">
                                                <input type="radio" name="payment_method" value="paypal"
                                                    id="payment-option-online">
                                                <span class="outline-radio-check"></span>
                                            </label>
                                            <label for="#" class="shipping-totals-title-row">
                                                <div class="shipping-totals-title">درگاه پرداخت پی پال</div>
                                            </label>
                                        </li>
                                    </ul>
                                    <div class="form-auth-row">
                                        <label for="#" class="ui-checkbox mt-1">
                                            <input type="checkbox" value="1"
                                                oninvalid="this.setCustomValidity('تیک قوانین و حریم خصوصی را پس از مطالعه بزنید')"
                                                oninput="this.setCustomValidity('')" required id="remember">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="remember" class="remember-me mr-0"><a
                                                href="{{route('privacy')}}">حریم خصوصی</a> و
                                            <a href="{{route('ruls')}}">شرایط قوانین </a>استفاده از سرویس های سایت
                                            را
                                            مطالعه نموده و با کلیه موارد آن موافقم <abbr class="required" title="ضروری"
                                                style="color:red;">*</abbr></label>
                                    </div>

                                    <button class="btn-Order btn btn-primary mt-4 mb-3" type="submit">ثبت
                                        سفارش</button>
                                </div>


                                </form>
                                @if (!session()->has('coupon'))
                                <div class="col-lg-12 mb-4">
                                    <form class="mt-5 mr-3 showcoupon">
                                        <div class="row">
                                            <div class="col-7">
                                                <label for="fixed-number">اعمال کد تخفیف
                                                </label>
                                                <input type="text" id="fixed-coupon" name="code"
                                                    style="border-radius: 1rem;"
                                                    class="input-name-checkout form-control m-0 text-left mb-3">
                                                @error('code')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="append pl pr-0 col-5" style="margin-top: 1.7rem;">
                                                <button class="btn-Order btn btn-primary">اعمال
                                                    تخفیف</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endif



                            </div>
                        </div>
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
var previous;
$('#address-option').on('focus', function() {

    previous = $(this).val();
}).change(function() {

    let categoryId = $(this).val();

    if (categoryId == "new") {
        $('#sub-address').show();
    } else {
        $('#sub-address').hide();
    }

    $("#" + previous + "").hide();
    $("#" + categoryId + "").show();

    Swal.fire({
        text: 'آدرس ارسال محصول تغییر کرد',
        icon: "success",
        timer: 1500,
    });


})
</script>

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

@endpush