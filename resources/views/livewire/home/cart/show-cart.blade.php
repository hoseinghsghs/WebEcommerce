<div>
    @section('title', "سبد خرید")
    <!-- cart---------------------------------->
    <div class="container-main">
        <div class="d-block">
            <div class="main-row p-0">
                <div id="breadcrumb">
                    <i class="mdi mdi-home"></i>
                    <nav aria-label="breadcrumb" class="p-1">
                        <ol class="breadcrumb m-0">
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
                                    <div class="return-to-shop">
                                        <a href="{{route('home')}}" class="backward btn btn-secondary">ادامه خرید</a>
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
                                                <th scope="col" class="product-cart-Total"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cartitems->sort() as $item)
                                            <tr wire:key="cart-'{{$item->id}}'"
                                                style="border-bottom: 1px solid #e1dfdf;">
                                                @php
                                                $quantity = $item->quantity;
                                                @endphp
                                                <td class="d-md-none">
                                                    <a class="remove" wire:click="delete('{{$item->id}}')">
                                                        <i class="mdi mdi-close" wire:loading.remove
                                                            wire:target="delete('{{$item->id}}')"></i>
                                                        <i class="fa fa-circle-o-notch fa-spin" wire:loading
                                                            wire:target="delete('{{$item->id}}')"></i> </a>
                                                </td>
                                                <th scope="row" class="product-cart-name">
                                                    <div class="product-thumbnail-img">
                                                        <a
                                                            href="{{route('home.products.show',['product'=>$item->associatedModel->slug])}}">
                                                            <img
                                                                src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$item->associatedModel->primary_image)}}">
                                                        </a>
                                                    </div>
                                                    <a
                                                        href="{{route('home.products.show',['product'=>$item->associatedModel->slug])}}">
                                                        {{$item->name}}
                                                    </a>
                                                    <div class="variation"> <span class="variant-color-title">
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
                                                    @endif </span>
                                                </td>
                                                <td class="product-cart-quantity">
                                                    <div class="required-number before">
                                                        <div class="quantity"> <input class="quantity form-control"
                                                                readonly value="{{$item->quantity}}" type="number"
                                                                min="1" step="1" max="{{$item->attributes->quantity}}">
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
                                                    <center class="amount" id="product-subtotal"
                                                        style="align-items: center;justify-content: center;"
                                                        wire:loading.flex>
                                                        <i class="fa fa-circle-o-notch fa-spin"></i>
                                                    </center>
                                                    <span class="amount" id="product-subtotal" wire:loading.remove>
                                                        {{number_format($item->price*$item->quantity)}}
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                                <td class="d-none d-md-block">
                                                    <a class="remove" wire:click="delete('{{$item->id}}')">
                                                        <i class="mdi mdi-close" wire:loading.remove
                                                            wire:target="delete('{{$item->id}}')"></i>
                                                        <i class="fa fa-circle-o-notch fa-spin" wire:loading
                                                            wire:target="delete('{{$item->id}}')"></i> </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                                <div class="cart-collaterals">
                                    <div class="totals d-block">
                                        <h3 class="Total-cart-total">مجموع کل سبد خرید</h3>
                                        <div class="checkout-summary row align-items-end">
                                            <ul class="checkout-summary-summary col-md-6" wire:loading.remove>
                                                <table
                                                    class="checkout-review-order-table table table-borderless revieworder mb-3">
                                                    <tfoot>
                                                        <tr class="cart-subtotal">
                                                            <th class="amount">مبلغ سفارش</th>
                                                            <td>
                                                                {{ number_format( \Cart::getTotal() + cartTotalSaleAmount() ) }}
                                                                تومان
                                                            </td>
                                                        </tr>
                                                        @if (cartTotalSaleAmount())
                                                        <tr class="cart-subtotal">
                                                            <td class="amount text-success">مبلغ تخفیف کالا</td>
                                                            <td class="text-success">
                                                                {{ number_format( cartTotalSaleAmount() ) }}
                                                                تومان
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <tr class="shipping-totals">
                                                            <td class="amount">حمل و نقل</td>
                                                            @if(cartTotalDeliveryAmount() == 0)
                                                            <td style="color: red">
                                                                رایگان
                                                            </td>
                                                            @else
                                                            <td>
                                                                {{ number_format( cartTotalDeliveryAmount() ) }}
                                                                تومان
                                                            </td>
                                                            @endif</td>
                                                        </tr>
                                                        @if (session()->get('coupon.amount') )
                                                        <tr>
                                                            <td class="amount text-success">کد تخفیف</td>
                                                            <td class="text-success">
                                                                {{ number_format( session()->get('coupon.amount') ) }}
                                                                تومان
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <tr class=" order-total">
                                                            <td class="amount"> مجموع</td>
                                                            <td>{{ number_format( cartTotalAmount() ) }} تومان </span>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </ul>
                                            <ul class="checkout-summary-summary col-md-6" wire:loading.remove>
                                                <li class="discount-code ">
                                                    <div class=" align-items-center">
                                                        <div class="col-md-6 pl mt-5">
                                                            <div class="proceed-to-checkout">
                                                                <a wire:click="clearCart()"
                                                                    class="checkout-button d-block">پاک کردن
                                                                    سبد</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl mt-5">
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
                                                    <span wire:loading.flex>
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