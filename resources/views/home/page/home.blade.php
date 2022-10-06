@extends('home.layout.MasterHome')
@section('title','فروشگاه اینترنتی کالا مارکت')

@section('content')
@include('home.partial.SliderMain')
@include('home.partial.Adplacement')

<!-- slidre-product------------------------>
<!-- فروش ویژه -->
@if ($Products_special->count())
<section class="section-slider amazing-section pt-0">
    <div class="container-amazing col-12">
        <div class="col-lg-3 display-md-none pull-right">
            <div class="amazing-product text-center">
                <a href="#">
                    <img src="assets/home/images/slider-amazing/shopping-cart.svg" alt="special">
                </a>
                <h3 class="amazing-heading-title amazing-size-default">فروش ویژه</h3>

            </div>
        </div>


        <div class="col-lg-9 col-md-12 pull-left pr-1">
            <div class="slider-widget-products mb-0">
                <div class="widget widget-product card" style="padding:32px ;">
                    <header class="card-header">
                        <span class="title-one">فروش ویژه</span>
                        <h3 class="card-title">مشاهده همه</h3>
                    </header>
                    <div class="product-carousel productcar owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 827px;">

                                @each('home.components.ProductCart2', $Products_special,
                                'Product_special')

                            </div>
                        </div>
                        <div class="owl-nav">
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endif
<!--  پایان محصولات ویژه -->

<!-- پیشنهاد ما -->
<div class="container-main">
    <div class="d-block">
        @if ($Products_our_suggestion->count())
        <div
            class="{{$Products_our_suggestion_units->count() ? 'col-lg-9 col-md-9 col-xs-12 pr order-1 d-block' : 'col-lg-12 col-md-12 col-xs-12 pr order-1 d-block'}}">
            <div class="slider-widget-products">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">پیشنهاد ما</span>
                        <h3 class="card-title"></h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @each('home.components.ProductCart1', $Products_our_suggestion,
                                'Product_special')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- پایان پیشنهاد ما -->
        <input type="hidden" value="1" id="qtybutton">
        <!-- slider-moment پیشنهاد لحظه ای------------------------->
        @if ($Products_our_suggestion_units->count())
        <div class="col-lg-3 col-md-3 col-xs-12 pl order-1 d-block">
            <div class="slider-moments">
                <div class="widget-suggestion widget card">
                    <header class="card-header promo-single-headline">
                        <h3 class="card-title float-none">پیشنهاد لحظه‌ای</h3>
                    </header>
                    <div id="suggestion-slider" class="owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(1369px, 0px, 0px); transition: all 0.25s ease 0s; width: 2190px;">

                                @each('home.components.ProductSuggestion', $Products_our_suggestion_units,
                                'Products_our_suggestion_unit')


                            </div>
                        </div>
                    </div>

                    <div id="progressBar">
                        <div class="slide-progress" style="width: 100%; transition: width 5000ms ease 0s;"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- پایان پیشنهاد لحظه ای -->
        <!-- بنر های دوتایی وسط -->
        <div class="container-main">
            <div class="adplacement-container-row">
                @foreach ($centers as $center)
                <div class="col-12 col-lg-6 col-md-6 pr">
                    <a href="{{$center->link}}" class="adplacement-item">
                        <div class="adplacement-sponsored_box">
                            <img src="{{url(env('BANNER_IMAGES_PATCH').$center->image)}}">
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <!--پایان بنر های دوتایی وسط -->
        <!-- slider-product------------------------------->
        @foreach ($products_is_show as $product_is_show )
        <div class="col-lg-12 col-md-12 col-xs-12 pr order-1 d-block">
            <div class="slider-widget-products">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">{{$product_is_show->name}}</span>
                        <h3 class="card-title"></h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @each('home.components.ProductCart1', $product_is_show->products,
                                'Product_special')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- slider-product end------------------------------->


        <!-- brand--------------------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pr order-1 d-block">
            <div class="slider-widget-products">
                <div class="widget widget-product card mb-0">
                    <div class="product-carousel-brand owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @foreach ( $brands as $brand )
                                <div class="owl-item active" style="width: 190.75px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="{{$brand->link}}" class="d-block hover-img-link">
                                            <img src="{{url(env('BRAND_IMAGES_PATCH').$brand->image)}}"
                                                class="img-fluid img-brand" alt="{{$brand->slug}}">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand end----------------------------------------->
    </div>
</div>
<!-- footer------------------------------------------->

@push('styles')
<style>
.owl-carousel {
    touch-action: manipulation;
}
</style>

@endpush
@push('scripts')


@endpush

@endsection