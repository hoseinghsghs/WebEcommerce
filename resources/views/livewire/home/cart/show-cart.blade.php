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
                                                            <a class="remove" wire:click="delete('{{$item->id}}')">
                                                                <i class="mdi mdi-close" wire:loading.remove
                                                                    wire:target="delete('{{$item->id}}')"></i>
                                                                <i class="fa fa-circle-o-notch fa-spin" wire:loading
                                                                    wire:target="delete('{{$item->id}}')"></i>

                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-title">
                                                        <a
                                                            href="{{route('home.products.show',['product'=>$item->associatedModel->slug])}}">
                                                            {{$item->name}}
                                                        </a>
                                                        <div class="variation">

                                                            <span class="variant-color-title">
                                                                {{ \App\Models\Attribute::find($item->attributes->attribute_id)->name }}
                                                                :
                                                                {{ $item->attributes->value }}</span>
                                                            <div class="variant-shape"></div>

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

                                                            <div class="quantity-nav">
                                                                <div class="quantity-button quantity-up"
                                                                    wire:loading.attr="disabled"
                                                                    wire:click="increment('{{$item->id}}')"
                                                                    wire:touchstart="increment('{{$item->id}}')">+</div>
                                                                <div class="quantity-button quantity-down"
                                                                    wire:loading.attr="disabled"
                                                                    wire:click="decrement('{{$item->id}}')"
                                                                    wire:touchstart="decrement('{{$item->id}}')">-</div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="product-cart-Total product-subtotal">
                                                    <span class="loader" wire:loading.flex>
                                                        <i class="fa fa-circle-o-notch fa-spin"></i>
                                                    </span>
                                                    <span class="amount" id="product-subtotal" wire:loading.remove>
                                                        {{number_format($item->price*$item->quantity)}}
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
                                            <ul class="checkout-summary-summary" wire:loading.remove>

                                                <li class="cart-subtotal">
                                                    <span class="amount">مبلغ سفارش</span>
                                                    <span>
                                                        {{ number_format( \Cart::getTotal() + cartTotalSaleAmount() ) }}
                                                        تومان</span>
                                                </li>
                                                @if (cartTotalSaleAmount())
                                                <li class="cart-subtotal">
                                                    <span class="amount text-success">مبلغ تخفیف کالا</span>
                                                    <span class="text-success">
                                                        {{ number_format( cartTotalSaleAmount() ) }}
                                                        تومان</span>
                                                </li>
                                                @endif

                                                <li class="shipping-totals">
                                                    <span class="amount">حمل و نقل</span>
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
                                                </li>
                                                @if (session()->get('coupon.amount') )
                                                <li>
                                                    <span class="amount text-success">کد تخفیف</span>
                                                    <span
                                                        class="text-success">{{ number_format( session()->get('coupon.amount') ) }}
                                                        تومان</span>
                                                </li>
                                                @endif


                                                <li class=" order-total">
                                                    <span class="amount"> مجموع</span>
                                                    <span>{{ number_format( cartTotalAmount() ) }} تومان </span>
                                                </li>


                                                <li class="discount-code">
                                                    <div class=" align-items-center">
                                                        <div class="col-md-7 pr mt-5">
                                                            <div class="coupon">
                                                                <form class="coupon" wire:submit.prevent="checkCoupon">
                                                                    <input type="text" name="input-coupon"
                                                                        wire:model.defer="code"
                                                                        class="input-coupon-code"
                                                                        placeholder="كد تخفیف:">

                                                                    <button class="btn btn-coupon"
                                                                        type="submit">اعمال</button>

                                                                </form>
                                                                @error('code') <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 pl mt-5">
                                                            <div class="proceed-to-checkout">
                                                                <a href="{{route('home.orders.checkout')}}"
                                                                    class="checkout-button d-block">تسویه
                                                                    حساب</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li>
                                                    <span class="loader" wire:loading.flex>
                                                        <i class="fa fa-circle-o-notch fa-spin"></i>
                                                    </span>
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