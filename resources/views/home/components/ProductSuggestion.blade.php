<div class="owl-item cloned" style="width: 273.75px;">
    <div class="item">
        <a href="{{route('home.products.show' , ['product' => $Products_our_suggestion_unit->slug])}}">
            <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$Products_our_suggestion_unit->primary_image)}}"
                class="w-100" alt="">
        </a>
        <h3 class="product-title">
            <a
                href="{{route('home.products.show' , ['product' => $Products_our_suggestion_unit->slug])}}">{{$Products_our_suggestion_unit->name}}</a>
        </h3>
        <div class="price">
            @if ($Products_our_suggestion_unit->quantity_check)
            @if ($Products_our_suggestion_unit->sale_check)
            <span class="amount">{{number_format($Products_our_suggestion_unit->sale_check->sale_price)}}<span> تومان
                </span></span>

            <del><span class="amount">{{number_format($Products_our_suggestion_unit->sale_check->price)}}<span> تومان
                    </span></span></del>




            @else

            <span class="amount">{{ number_format($Products_our_suggestion_unit->price_check->price) }}<span> تومان
                </span></span>
            @endif
            @else
            <span class="amount">ناموجود</span>

            @endif

        </div>
    </div>
</div>