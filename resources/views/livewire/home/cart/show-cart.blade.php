<div>
    @section('title', "سبد خرید")
    <!-- cart---------------------------------->
    <div class="container-main">
        <div class="d-block">
            <div class="main-row">
                <div id="breadcrumb">
                    <i class="mdi mdi-home"></i>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
                            <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
                        </ol>
                    </nav>
                </div>
                <section class="cart-home">
                    <div class="post-item-cart d-block order-2">
                        <div class="content-page">
                            <div class="cart-form">
                                @if (\Cart::isEmpty())
                                <div class="cart-empty text-center d-block">
                                    <div class="cart-empty-img mb-4 mt-4">
                                        <img src="/assets/home/images/shopping-cart.png">
                                    </div>
                                    <p class="cart-empty-title">سبد خرید شما در حال حاضر خالی است.</p>
                                    <a href="#" class="btn account-btn btn-primary">ورود به حساب کاربری</a>
                                    <div class="return-to-shop">
                                        <a href="#" class="backward btn btn-secondary">بازگشت به صفحه اصلی</a>
                                    </div>
                                </div>
                                @else
                                <form action="#" class="c-form">
                                    <table class="table-cart cart table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="product-cart-name">نام محصول</th>
                                                <th scope="col" class="product-cart-price">قیمت</th>
                                                <th scope="col" class="product-cart-quantity">تعداد مورد نیاز</th>
                                                <th scope="col" class="product-cart-Total">مجموع</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cartitems->sort() as $item)
                                            <tr wire:key="cart-'{{$item->id}}'">
                                                @php
                                                $quantity = $item->quantity;
                                                @endphp

                                                <th scope="row" class="product-cart-name">
                                                    <div class="product-thumbnail-img">
                                                        <a
                                                            href="{{route('home.products.show',['product'=>$item->associatedModel->slug])}}">
                                                            <img
                                                                src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$item->associatedModel->primary_image)}}">
                                                        </a>
                                                        <div class="product-remove">
                                                            <a href="#" class="remove"
                                                                wire:click="delete('{{$item->id}}')">
                                                                <i class="mdi mdi-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-title">
                                                        <a
                                                            href="{{route('home.products.show',['product'=>$item->associatedModel->slug])}}">
                                                            {{$item->name}}
                                                        </a>
                                                        <div class="variation">
                                                            <div class="variant-color">
                                                                <span class="variant-color-title">
                                                                    {{ \App\Models\Attribute::find($item->attributes->attribute_id)->name }}
                                                                    :
                                                                    {{ $item->attributes->value }}</span>
                                                                <div class="variant-shape"></div>
                                                            </div>
                                                            <div class="seller">
                                                                <i class="mdi mdi-storefront"></i>
                                                                فروشنده :
                                                                <span>{{env('APP_NAME')}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="product-cart-price">
                                                    <span class="amount">
                                                        {{ number_format($item->price) }}
                                                        <span>تومان</span>
                                                    </span>
                                                    @if($item->attributes->is_sale)
                                                    <p class="text-danger">
                                                        {{ $item->attributes->percent_sale }}%
                                                        تخفیف
                                                    </p>
                                                    @endif

                                                    </span>
                                                </td>
                                                <td class="product-cart-quantity">
                                                    <div class="required-number before">
                                                        <div class="quantity">

                                                            <input class="quantity form-control" readonly
                                                                value="{{$item->quantity}}" type="number" min="1"
                                                                step="1" max="{{$item->attributes->quantity}}">


                                                            <button class="quantity-plus w-icon-plus"
                                                                wire:loading.attr="disabled"
                                                                wire:click="increment('{{$item->id}}')"
                                                                wire:touchstart="increment('{{$item->id}}')"></button>


                                                            <button class="quantity-minus w-icon-minus"
                                                                wire:loading.attr="disabled"
                                                                wire:click="decrement('{{$item->id}}')"
                                                                wire:touchstart="decrement('{{$item->id}}')"></button>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-cart-Total">
                                                    <span class="amount">6,000,000
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                                <div class="cart-collaterals">
                                    <div class="totals d-block">
                                        <h3 class="Total-cart-total">مجموع کل سبد خرید</h3>
                                        <div class="checkout-summary">
                                            <ul class="checkout-summary-summary">
                                                <li class="cart-subtotal">
                                                    <span class="amount">قیمت کل</span>
                                                    <span> 6,032,000 تومان</span>
                                                </li>
                                                <li class="shipping-totals">
                                                    <span class="amount">حمل و نقل</span>
                                                    <div class="shipping-totals-item">
                                                        <div class="shipping-totals-outline">
                                                            <label for="#" class="outline-radio">
                                                                <input type="radio" name="payment_method"
                                                                    id="payment-option-online" checked="checked">
                                                                <span class="outline-radio-check"></span>
                                                            </label>
                                                            <label for="#" class="shipping-totals-title-row">
                                                                <div class="shipping-totals-title">حمل و نقل رایگان
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="shipping-totals-outline">
                                                            <label for="#" class="outline-radio">
                                                                <input type="radio" name="payment_method"
                                                                    id="payment-option-online">
                                                                <span class="outline-radio-check"></span>
                                                            </label>
                                                            <label for="#" class="shipping-totals-title-row">
                                                                <div class="shipping-totals-title">حمل و نقل معمولی:
                                                                    20,000 تومان</div>
                                                            </label>
                                                        </div>
                                                        <span class="shipping-destination">حمل و نقل به خراسان
                                                            شمالی</span>
                                                    </div>
                                                </li>
                                                <li class="order-total">
                                                    <span class="amount"> مجموع</span>
                                                    <span> 6,032,000 تومان</span>
                                                </li>
                                                <li class="discount-code">
                                                    <div class=" align-items-center">
                                                        <div class="col-md-7 pr mt-5">
                                                            <div class="coupon">
                                                                <form action="#">
                                                                    <input type="text" name="input-coupon"
                                                                        class="input-coupon-code"
                                                                        placeholder="كد تخفیف:">
                                                                    <button class="btn btn-coupon"
                                                                        type="submit">اعمال</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 pl mt-5">
                                                            <div class="proceed-to-checkout">
                                                                <a href="#" class="checkout-button d-block">تسویه
                                                                    حساب</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- cart---------------------------------->
</div>