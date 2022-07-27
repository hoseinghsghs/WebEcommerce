@extends('home.layout.MasterHome')
@section('title', "خانه - مقایسه")
@section('content')
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title">مقایسه کردن</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-2">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li>مقایسه کردن</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-10 pb-2">
        <div class="container">
            <div class="compare-table">
                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-products">
                    <div class="compare-col compare-field">محصول </div>
                    @foreach ($products as $product)
                    <div class="compare-col compare-product">
                        <a href="{{route('home.compare.remove' , ['product' => $product->id])}}"
                            class="btn remove-product"><i class="w-icon-times-solid"></i></a>
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{route('home.products.show' , ['product' => $product->slug])}}">
                                    <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)}}"
                                        alt="${$product->slug}}" width="228" height="257" />
                                </a>

                            </figure>
                            <div class="product-details">
                                <h3 class="product-name"><a
                                        href="{{route('home.products.show' , ['product' => $product->slug])}}">"{{$product->name}}"</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- End of مقایسه محصولات  -->
                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-price">
                    <div class="compare-col compare-field">قیمت</div>
                    @foreach ($products as $product)
                    @if ($product->quantity_check)
                    @if ($product->sale_check)
                    <div class="compare-col compare-value">
                        <div class="product-price">
                            <span class="new-price">{{number_format($product->sale_check->sale_price)}} تومان</span>
                            <span class="old-price">{{number_format($product->sale_check->price)}} تومان</span>
                        </div>
                    </div>
                    @else
                    <div class="compare-col compare-value">
                        <div class="product-price">
                            <span class="new-price">{{number_format($product->price_check->price)}} تومان</span>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="compare-col compare-value">
                        <div class="product-price">
                            <span class="new-price">نا موجود</span>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <!-- End of Compare Price -->
                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-availability">
                    <div class="compare-col compare-field">دسترسی </div>
                    @foreach ($products as $product)
                    @if ($product->quantity_check)
                    <div class="compare-col compare-value">موجود </div>
                    @else
                    <div class="compare-col compare-value">نا موجود </div>
                    @endif
                    @endforeach
                </div>
                <!-- End of Compare Availability -->
                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-description">
                    <div class="compare-col compare-field">توضیحات </div>

                    @foreach ($products as $product)
                    <div class="compare-col compare-value">
                        <ul class="list-style-none list-type-check">
                            <li>{{$product->description}}</li>
                        </ul>
                    </div>
                    @endforeach

                </div>
                <!-- End of Compare Description -->
                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-reviews">
                    <div class="compare-col compare-field">رتبه بندی ها و نظرات</div>
                    @foreach ($products as $product)
                    <div class="compare-col compare-rating">
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings"
                                    style="width: {{(ceil($product->rates->avg('rate'))*100)/5}}%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- End of Compare Reviews -->
                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-category">
                    <div class="compare-col compare-field">دسته </div>
                    @foreach ($products as $product)
                    <div class="compare-col compare-value">
                        {{$product->category->parent->name}} - {{$product->category->name}} </div>
                    @endforeach
                </div>
                <!-- End of Compare Category -->

                <!-- End of Compare Meta -->

                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-color">
                    <div class="compare-col compare-field">ویژگی</div>
                    @foreach ($products as $product)
                    <div class="compare-col compare-value">
                        @foreach ($product->attributes()->with('attribute')->get() as $attribute )

                        <div>
                            <label>{{$attribute->attribute->name}}:</label>
                            {{$attribute->value}}
                        </div>


                        @endforeach
                    </div>
                    @endforeach
                </div>

                <!-- End of Compare Color -->
                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-size">
                    <div class="compare-col compare-field">سایر ویژگی ها </div>
                    @foreach ($products as $product)


                    <div class="compare-col compare-value">
                        {{App\Models\Attribute::find($product->variations->first()->attribute_id)->name}} :
                        @foreach ($product->variations()->where('quantity', '>' , 0)->get() as
                        $variation )
                        <span> {{$variation->value}} / </span>
                        @endforeach
                    </div>


                    @endforeach
                </div>
            </div>
        </div>
        <!-- End of Compare Table -->
    </div>
    <!-- End of Page Content -->
</main>
@endsection