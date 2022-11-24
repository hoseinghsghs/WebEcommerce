<div class="owl-item active" style="width: 100.25px; margin-left: 10px;">
    <div class="item">
        <div style="position: absolute;left:.2rem;top:-.5rem">
        </div>
        <a href="{{route('home.products.show' , ['product' => $Product_special->slug])}}">
            <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$Product_special->primary_image)}}"
                 style="padding: 2rem;" class="img-fluid" alt="">
        </a>
        <h2 class="post-title pt-0">
            <a href="{{route('home.products.show' , ['product' => $Product_special->slug])}}">
                {{$Product_special->name}}
            </a>
        </h2>
        <div class="price mt-0">
            @if ($Product_special->quantity_check)
                @if ($Product_special->sale_check)
                    <ins><span>{{number_format($Product_special->sale_check->sale_price)}}<span> تومان </span></span>
                    </ins>
                    <del><span>{{number_format($Product_special->sale_check->price)}}<span> تومان </span></span></del>
                @else
                    <ins><span>{{ number_format($Product_special->price_check->price) }}<span> تومان </span></span>
                    </ins>
                @endif
            @else
                <ins><span>ناموجود</span></ins>
            @endif
        </div>

    </div>
</div>
