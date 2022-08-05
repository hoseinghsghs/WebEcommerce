<div class="owl-item active" style="width: 155.25px; margin-left: 10px;">
    <div class="item">
        <a href="{{route('home.products.show' , ['product' => $Product_special->slug])}}" class="d-block hover-img-link"
            data-toggle="modal" data-target="#exampleModal">
            <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$Product_special->primary_image)}}"
                class="img-fluid" alt="">
            <span class="icon-view">
                <strong><i class="fa fa-eye"></i></strong>
            </span>
        </a>
        <h2 class="post-title pt-4">
            <a href="{{route('home.products.show' , ['product' => $Product_special->slug])}}">
                {{$Product_special->name}}
            </a>
        </h2>
        <div class="price">
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
        <div class="actions">
            <ul>
                <!-- علاقه مندی -->
                @if ($Product_special->checkUserWishlist(1))
                <li class="action-item like">
                    <button data-product="{{$Product_special->id}}" class="btn btn-light add-product-wishes active"
                        type="submit">
                        <i class="fa fa-heart-o"></i>
                    </button>
                </li>

                @else
                <li class="action-item like">
                    <button data-product="{{$Product_special->id}}" class="btn btn-light add-product-wishes"
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
                    <button data-product="{{$Product_special->id}}" class="btn btn-light btn-compare added"
                        type="submit">
                        <i class="fa fa-random"></i>
                    </button>
                </li>
                @else
                <li class="action-item compare">
                    <button data-product="{{$Product_special->id}}" class="btn btn-light btn-compare" type="submit">
                        <i class="fa fa-random"></i>
                    </button>
                </li>
                @endif

                @else
                <li class="action-item compare">
                    <button data-product="{{$Product_special->id}}" class="btn btn-light btn-compare" type="submit">
                        <i class="fa fa-random"></i>
                    </button>
                </li>
                @endif
                <!-- پایان علاقه مندی ها -->

                <li class="action-item add-to-cart">
                    <button class="btn btn-light btn-add-to-cart" type="submit">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>