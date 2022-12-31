<div class="col-lg-3 col-md-4 col-sm-6 col-6 p-1 order-1 d-block mb-3">
    <section class="product-box product product-type-simple h-100 ">
        <div class="thumb">
            <a href="{{route('home.products.show' , ['product' => $product->slug])}}" class="d-block">
              
                <div class="position-relative d-inline-block">
                   
                    <a href="{{route('home.products.show' , ['product' => $product->slug])}}">
                        <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)}}"
                             alt="{{$product->slug}}"  width="100%" class="pr-2">
                    </a>
                </div>
            </a>
        </div>
        <div class="title">
            <a href="{{route('home.products.show' , ['product' => $product->slug])}}">{{$product->name}}</a>
        </div>
        <div class="price">
            @if ($product->quantity_check)
                @if ($product->sale_check)
                        @php
                            $percents=$product->discountPercent();
                        @endphp
                        @if ($product->quantity_check && $product->sale_check && $percents)
                            <div class="discount-d">
                                @if (count($percents)==1)
                                    <span>{{$percents[0]}}٪</span>
                                @else
                                    <span>{{end($percents)}}٪</span>
                                @endif
                            </div>
                        @endif
                            <ins><span
                            class="amount">{{number_format($product->sale_check->sale_price)}}<span>تومان</span></span>
                            </ins>
                    <del><span>{{number_format($product->sale_check->price)}} تومان </span></del> 
                @else
                    <ins><span class="amount">{{ number_format($product->price_check->price) }}<span>تومان</span></span>
                    </ins>
                @endif
            @else
                <ins><span>ناموجود</span></ins>
            @endif
        </div>
         <div >
                        <ul class="d-flex justify-content-center">
                            <!-- علاقه مندی -->
                            @if (Auth::check())
                                @if ($product->checkUserWishlist(1))
                                    <li class="action-item like" style="display: inline-block">
                                        <button data-product="{{$product->id}}"
                                                class="btn btn-link add-product-wishes active"
                                                type="submit">
                                            <i class="fa fa-heart-o"></i>
                                        </button>
                                    </li>

                                @else
                                    <li class="action-item like" style="display: inline-block">
                                        <button data-product="{{$product->id}}" class="btn btn-link add-product-wishes"
                                                type="submit">
                                            <i class="fa fa-heart-o"></i>
                                        </button>
                                    </li>
                                @endif
                            @else
                                <li class="action-item like" style="display: inline-block">
                                    <button data-product="{{$product->id}}" class="btn btn-link add-product-wishes"
                                            type="submit">
                                        <i class="fa fa-heart-o"></i>
                                    </button>
                                </li>
                            @endif
                            <!-- پایان علاقه مندی -->
                            <!-- مقایسه -->
                            @if (session()->has('compareProducts'))
                                @if (in_array($product->id, session()->get('compareProducts')) )
                                    <li class="action-item compare">
                                        <button data-product="{{$product->id}}" id="compare"
                                                class="btn btn-link btn-compare"
                                                style="color: #651fff;" type="submit">
                                            <i class="fa fa-random"></i>
                                        </button>
                                    </li>
                                @else
                                    <li class="action-item compare">
                                        <button data-product="{{$product->id}}" id="compare"
                                                class="btn btn-link btn-compare"
                                                type="submit">
                                            <i class="fa fa-random"></i>
                                        </button>
                                    </li>
                                @endif

                            @else
                                <li class="action-item compare">
                                    <button data-product="{{$product->id}}" class="btn btn-link btn-compare"
                                            type="submit">
                                        <i class="fa fa-random"></i>
                                    </button>
                                </li>
                            @endif
                            <!-- پایان علاقه مندی ها -->
                            @if($product->variations()->where('quantity', '>' , 0)->get()->count() == 1)
                                @php
                                    $variation=$product->variations()->where('quantity', '>' , 0)->first();
                                    $rowId = $product->id . '-' . $variation->id;
                                @endphp

                                <form class="cart-form" style="display:inline">
                                    <input type="hidden" id="product_id" name="productid">
                                    <input type="hidden" id="variation_value" name="productvar">
                                    <input type="hidden" value="1" id="qtybutton">

                                    <li class="action-item add-to-cart">
                                        <button class="btn btn-link btn-add-to-cart" data-ishome="1"
                                                data-product="{{$product->id}}"
                                                data-varition="{{ json_encode($variation->only(['id' , 'sku' , 'quantity','is_sale' , 'sale_price' , 'price'])) }}"
                                                type="submit">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>

                                    </li>
                                </form>

                            @endif
                        </ul>
                    </div>
    </section>
</div>
