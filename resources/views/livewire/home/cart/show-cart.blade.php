<div>
    @section('title', "سبد خرید")
    <main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active"><a href="{{route('home.cart.index')}}">سبد خرید فروشگاه </a></li>
                    <li><a href="{{route('home.orders.checkout')}}">پرداخت </a></li>
                    <li><a href="order.html">سفارش کامل شد</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    <div class="col-lg-8 pr-lg-4 mb-6">
                        <table class="shop-table cart-table">
                            <thead>
                                <tr>
                                    <th class="product-name"><span>محصول </span></th>
                                    <th></th>
                                    <th>ویژگی</th>
                                    <th class="product-price"><span>قیمت</span></th>
                                    <th class="product-quantity"><span>تعداد</span></th>
                                    <th class="product-subtotal"><span>جمع کل</span></th>
                                </tr>
                            </thead>
                            @if (\Cart::isEmpty())
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center">سبد خرید شما خالی است</td>
                                </tr>
                            </tbody>
                            @else
                            <tbody>


                                @foreach($cartitems->sort() as $item)

                                <tr wire:key="cart-'{{$item->id}}'">
                                    @php
                                    $quantity = $item->quantity;
                                    @endphp
                                    <td class="product-thumbnail">
                                        <div class="p-relative">
                                            <a
                                                href="{{route('home.products.show',['product'=>$item->associatedModel->slug])}}">
                                                <figure>
                                                    <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$item->associatedModel->primary_image)}}"
                                                        alt="product" width="300" height="338">
                                                </figure>
                                            </a>
                                            <button type="submit" class="btn btn-close"
                                                wire:click="delete('{{$item->id}}')"><i
                                                    class="fas fa-times"></i></button>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a
                                            href="{{route('home.products.show',['product'=>$item->associatedModel->slug])}}">
                                            {{$item->name}}
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        {{ \App\Models\Attribute::find($item->attributes->attribute_id)->name }}
                                        :
                                        {{ $item->attributes->value }}
                                    </td>
                                    <td class="product-price"><span class="amount"
                                            id="amount">{{ number_format($item->price) }}
                                            تومان
                                        </span>
                                        @if($item->attributes->is_sale)
                                        <p style="font-size: 12px ; color:red">
                                            {{ $item->attributes->percent_sale }}%
                                            تخفیف
                                        </p>
                                        @endif


                                    <td class="product-quantity">
                                        <div class="input-group">
                                            <input class="quantity form-control" readonly value="{{$item->quantity}}"
                                                type="number" min="1" max="{{$item->attributes->quantity}}">


                                            <button class="quantity-plus w-icon-plus" wire:loading.attr="disabled"
                                                wire:click="increment('{{$item->id}}')"
                                                wire:touchstart="increment('{{$item->id}}')"
                                                ></button>


                                            <button class="quantity-minus w-icon-minus" wire:loading.attr="disabled"
                                                wire:click="decrement('{{$item->id}}')"
                                                wire:touchstart="decrement('{{$item->id}}')"
                                                ></button>
                                        </div>
                                    </td>
                                    <div class="loader" wire:loading.flex>
                                        درحال بارگذاری ...
                                    </div>

                                    <td class="product-subtotal">
                                        <span class="amount" id="product-subtotal">
                                            {{number_format($item->price*$item->quantity)}}
                                            تومان
                                        </span>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            @endif

                        </table>

                        <div class="cart-action mb-6">
                            <a href="{{route('home')}}"
                                class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i
                                    class="w-icon-long-arrow-right"></i>ادامه خرید </a>
                            <button type="submit" class="btn btn-rounded btn-default btn-clear" wire:click="clearCart()"
                                name="clear_cart" value="پاک کردن سبد">پاک کردن سبد </button>

                        </div>

                        <form class="coupon" wire:submit.prevent="checkCoupon">
                            <h5 class="title coupon-title font-weight-bold text-uppercase">کد تخفیف </h5>
                            <input type="text" wire:model.defer="code" class="form-control mb-4"
                                placeholder="کد تخفیف را وارد کنید..." />

                            <button type="submit" class="btn btn-dark btn-outline btn-rounded">اعمال کد</button>
                            @error('code') <span class="error"
                                style="color: red; margin-right: 2rem;">{{ $message }}</span> @enderror

                        </form>

                    </div>
                    <div class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar">
                            <div class="cart-summary mb-4">
                                <center>
                                    <h3 class="cart-title text-uppercase">مجموع سبد خرید</h3>
                                </center>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">مبلغ سفارش</label>
                                    <span>{{ number_format( \Cart::getTotal() + cartTotalSaleAmount() ) }}
                                        تومان</span>
                                </div>

                                <hr class="divider">

                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">مبلع تخفیف کالا ها</label>
                                    <span>{{ number_format( cartTotalSaleAmount() ) }}
                                        تومان</span>
                                </div>

                                <hr class="divider">

                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">کد تخیف</label>
                                    <span>{{ number_format( session()->get('coupon.amount') ) }}
                                        تومان</span>
                                </div>

                                <hr class="divider">
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
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


                                <hr class="divider">
                                <ul class="shipping-methods mb-2">

                                </ul>

                                <hr class="divider mb-6">
                                <div class="order-total d-flex justify-content-between align-items-center">
                                    <label>مجموع خرید</label>
                                    <span class="ls-50"><span>{{ number_format( cartTotalAmount() ) }}
                                            تومان</span></span>
                                </div>
                                <a href="{{route('home.orders.checkout')}}"
                                    class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                    برای تسویه حساب ادامه دهید<i class="w-icon-long-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
</div>