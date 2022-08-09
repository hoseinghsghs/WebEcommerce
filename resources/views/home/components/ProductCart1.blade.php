<div class="owl-item active" style="width: 100.25px; margin-left: 10px;">
    <div class="item">

        <div style="position: absolute;left:.2rem;top:.5rem">
            <ul>
                <!-- علاقه مندی -->
                @if (Auth::check())
                @if ($Product_special->checkUserWishlist(1))
                <li class="action-item like">
                    <button data-product="{{$Product_special->id}}" class="btn btn-link add-product-wishes active"
                        type="submit">
                        <i class="fa fa-heart-o"></i>
                    </button>
                </li>

                @else
                <li class="action-item like">
                    <button data-product="{{$Product_special->id}}" class="btn btn-link add-product-wishes"
                        type="submit">
                        <i class="fa fa-heart-o"></i>
                    </button>
                </li>
                @endif
                @else
                <li class="action-item like">
                    <button data-product="{{$Product_special->id}}" class="btn btn-link add-product-wishes"
                        type="submit">
                        <i class="fa fa-heart-o"></i>
                    </button>
                </li>
                @endif



                <!-- پایان علاقه مندی -->

                <!-- مقایسه -->
                @if (session()->has('compareProducts'))

                @if (in_array($Product_special->id, session()->get('compareProducts')) )
                <li class="action-item compare">
                    <button data-product="{{$Product_special->id}}" id="compare" class="btn btn-link btn-compare"
                        style="color: #651fff;" type="submit">
                        <i class="fa fa-random"></i>
                    </button>
                </li>
                @else
                <li class="action-item compare">
                    <button data-product="{{$Product_special->id}}" id="compare" class="btn btn-link btn-compare"
                        type="submit">
                        <i class="fa fa-random"></i>
                    </button>
                </li>
                @endif

                @else
                <li class="action-item compare">
                    <button data-product="{{$Product_special->id}}" class="btn btn-link btn-compare" type="submit">
                        <i class="fa fa-random"></i>
                    </button>
                </li>
                @endif
                <!-- پایان علاقه مندی ها -->
                @if($Product_special->variations()->where('quantity', '>' , 0)->get()->count() == 1)
                @php
                $variation=$Product_special->variations()->where('quantity', '>' , 0)->first();
                $rowId = $Product_special->id . '-' . $variation->id;
                @endphp

                <form class="cart-form" style="display:inline">
                    <input type="hidden" id="product_id" name="product" value="{{$Product_special->id}}">
                    <input type="hidden" id="variation_value" name="product"
                        value="{{ json_encode($variation->only(['id' , 'sku' , 'quantity','is_sale' , 'sale_price' , 'price'])) }}">

                    <li class="action-item add-to-cart">
                        @if (!\Cart::getContent($rowId)->count())
                        <button class="btn btn-link btn-add-to-cart" data-product="{{$Product_special->id}}"
                            data-varition="{{$Product_special->id}}" type="submit">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        @else
                        <button class="btn btn-link btn-add-to-cart" data-product="{{$Product_special->id}}"
                            data-varition="{{$Product_special->id}}" style="color: red;" type="submit">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        @endif
                    </li>
                </form>

                @endif
            </ul>
        </div>
        <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$Product_special->primary_image)}}"
            style="padding: 2rem;" class="img-fluid" alt="">


        <h2 class="post-title pt-0">
            <a href="{{route('home.products.show' , ['product' => $Product_special->slug])}}">
                {{$Product_special->name}}
            </a>
        </h2>
        <div class="price mt-0">
            @if ($Product_special->quantity_check)
            @if ($Product_special->sale_check)

            <del><span>{{number_format($Product_special->sale_check->price)}}<span>تومان</span></span></del>

            <ins><span>{{number_format($Product_special->sale_check->sale_price)}}<span>تومان</span></span>
            </ins>

            @else

            <ins><span>{{ number_format($Product_special->price_check->price) }}<span>تومان</span></span></ins>
            @endif
            @else
            <ins><span>ناموجود</span></ins>

            @endif

        </div>

    </div>
</div>