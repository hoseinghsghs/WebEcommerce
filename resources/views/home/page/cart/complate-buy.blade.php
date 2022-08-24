@extends('home.layout.MasterHome')
@section('title', "پرداخت ")
@section('content')

<div class="container-main">
    <div class="d-block">
        <section class="blog-checkout d-block order-1">
            <div class="col-lg">
                <div class="checkout woocommerce-checkout">
                    <div class="content-checkout">
                        <div class="middle-container">
                            <form action="#" class="form-checkout">
                                <div class="col2-set" id="customer-details">
                                    <div class="col-12">
                                        <div class="billing-fields mt-4">
                                            <h4 class="text-success">سفارش دریافت شد</h4>
                                            <p class="thankyou-order-received">پرداخت با موفقیت انجام شد. سفارش شما
                                                با موفقیت ثبت شد و در زمان تعیین شده برای شما ارسال خواهد شد.
                                                از اینکه دیجی استور را برای خرید انتخاب کردید از شما سپاسگزاریم.</p>
                                            <ul class="order-overview">
                                                <li class="order-overview-item">
                                                    کد سفارش :
                                                    <span>DKC-57262900</span>
                                                </li>
                                                <li class="order-overview-item">
                                                    تاریخ :
                                                    <span>17 فروردین 1399</span>
                                                </li>
                                                <li class="order-overview-item">
                                                    روش پرداخت :
                                                    <span>پرداخت اینترنتی هوشمند</span>
                                                </li>
                                                <li class="order-overview-item">
                                                    قیمت نهایی :
                                                    <span class="amount">25,000
                                                        <span>تومان</span>
                                                    </span>
                                                </li>
                                            </ul>
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
                                                        <span class="shipping-destination"> تومان 20,000 به وسیله
                                                            حمل و نقل معمولی</span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>روش پرداخت</th>
                                                <td>
                                                    <div class="shipping-totals-item">
                                                        <span class="shipping-destination"> پرداخت اینترنتی
                                                            هوشمند</span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="cart-discount">
                                                <th>تخفیف شما از این خرید</th>
                                                <td data-title=" تخفیف شما از این خرید ">
                                                    <div class="price">
                                                        <span class="amount">25,000
                                                            <span>تومان</span>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="profile-address pr-3 pl-3 mt-5">
                                        <div class="box-header">
                                            <span class="box-title">نشانی ما</span>
                                        </div>
                                        <div class="profile-address-item">
                                            <div class="profile-address-item-top">
                                                <div class="profile-address-item-title">خراسان شمالی ، بجنورد</div>
                                            </div>

                                            <div class="profile-address-content">
                                                <ul class="profile-address-info">
                                                    <li>
                                                        <div class="profile-address-info-item location">
                                                            <i class="mdi mdi-map-outline"></i>
                                                            خراسان شمالی، بجنورد
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="profile-address-info-item location">
                                                            <i class="mdi mdi-email-outline"></i>
                                                            945789651235
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="profile-address-info-item location">
                                                            <i class="mdi mdi-phone"></i>
                                                            0991*******
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="profile-address-info-item location">
                                                            <i class="mdi mdi-account"></i>
                                                            خراسان شمالی، بجنورد
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection