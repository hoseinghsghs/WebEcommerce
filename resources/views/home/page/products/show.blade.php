@extends('home.layout.MasterHome')
@section('title', "خانه -". $product->slug)
@section('content')
<div class="container-main">
    <div class="d-block">
        <div class="page-content page-row">
            <div class="main-row">
                <div id="breadcrumb">
                    <i class="mdi mdi-home"></i>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="#">{{$product->category->parent->name}}</a></li>
                            <li class="breadcrumb-item"><a href="#"> {{$product->category->name}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg">
                    <div class="product type-product">
                        <div class="col-lg-5 col-xs-12 pr d-block" style="padding: 0;">
                            <section class="product-gallery">
                                <div class="gallery">
                                    <div class="gallery-item">
                                        <div>
                                            <ul class="gallery-actions">
                                                <li>
                                                    @if (Auth::check())
                                                    @if ($product->checkUserWishlist(1))
                                                    <a href="#" data-product="{{$product->id}}"
                                                        class="btn-option add-product-wishes active">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                        <span>محبوب</span>
                                                    </a>
                                                    @else
                                                    <a href="#" data-product="{{$product->id}}"
                                                        class="btn-option add-product-wishes ">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                        <span>محبوب</span>
                                                    </a>
                                                    @endif
                                                    @else
                                                    <a href="#" data-product="{{$product->id}}"
                                                        class="btn-option add-product-wishes ">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                        <span>محبوب</span>
                                                    </a>
                                                    @endif

                                                </li>
                                                <li class="option-social">
                                                    <a href="#" class="btn-option btn-option-social" data-toggle="modal"
                                                        data-target="#option-social">
                                                        <i class="mdi mdi-share"></i>
                                                        <span>اشتراک</span>
                                                    </a>
                                                    <!-- Modal-option-social -->
                                                    <div class="modal fade" id="option-social" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalCenterTitle">اشتراک گذاری
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="title">با استفاده از روش‌های زیر
                                                                        می‌توانید این صفحه را با دوستان خود به
                                                                        اشتراک بگذارید.</div>
                                                                    <form action="#" class="email-sharing">
                                                                        <h5 class="share-title">ارسال از طریق ایمیل
                                                                        </h5>
                                                                        <div class="input-group-sharing">
                                                                            <input type="email"
                                                                                class="share-email-address form-control"
                                                                                id="share-email">
                                                                            <button
                                                                                class="btn-send-email btn btn-primary"
                                                                                type="submit">ارسال ایمیل</button>
                                                                        </div>
                                                                    </form>
                                                                    <div class="share-options">
                                                                        <div class="share-social-buttons text-center">
                                                                            <a href="#"
                                                                                class="share-social share-social-twitter">
                                                                                <i class="mdi mdi-twitter"></i>
                                                                            </a>
                                                                            <a href="#"
                                                                                class="share-social share-social-facebook">
                                                                                <i class="mdi mdi-facebook"></i>
                                                                            </a>
                                                                            <a href="#"
                                                                                class="share-social share-social-whatsapp">
                                                                                <i class="mdi mdi-whatsapp"></i>
                                                                            </a>
                                                                            <a href="#"
                                                                                class="share-social share-social-email-outline">
                                                                                <i class="mdi mdi-email-outline"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-share-col">
                                                                        <input class="ui-url-field" type="url"
                                                                            value="https://www.digikala.com/product/dkp-1672478"
                                                                            readonly="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="option-alarm">
                                                    <a href="#" class="btn-option btn-option-alarm" data-toggle="modal"
                                                        data-target="#btn-option-alarm">
                                                        <i class="mdi mdi-bell-outline"></i>
                                                        <span>اطلاع‌رسانی</span>
                                                    </a>
                                                    <!-- Modal-option-alarm -->
                                                    <div class="modal fade" id="btn-option-alarm" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalCenterTitle">به من اطلاع بده
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-notification-title">از طریق:
                                                                    </div>
                                                                    <div class="form-auth-row">
                                                                        <label for="#" class="ui-checkbox mt-1">
                                                                            <input type="checkbox" value="1"
                                                                                name="login" id="remember">
                                                                            <span class="ui-checkbox-check"></span>
                                                                        </label>
                                                                        <label for="remember"
                                                                            class="remember-me mr-0">ایمیل به
                                                                            info@digismart.com</label>
                                                                    </div>
                                                                    <div class="form-auth-row">
                                                                        <label for="#" class="ui-checkbox mt-1">
                                                                            <input type="checkbox" value="1"
                                                                                name="login" id="remember">
                                                                            <span class="ui-checkbox-check"></span>
                                                                        </label>
                                                                        <label for="remember"
                                                                            class="remember-me mr-0">پیامک به
                                                                            *******0991</label>
                                                                    </div>
                                                                    <div class="form-auth-row">
                                                                        <label for="#" class="ui-checkbox mt-1">
                                                                            <input type="checkbox" value="1"
                                                                                name="login" id="remember">
                                                                            <span class="ui-checkbox-check"></span>
                                                                        </label>
                                                                        <label for="remember"
                                                                            class="remember-me mr-0">سیستم پیام شخصی
                                                                            دیجی اسمارت</label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-primary ml-2">ثبت</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">بازگشت</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="Three-dimensional">
                                                    <a href="#" class="btn-option btn-Three-dimensional"
                                                        data-toggle="modal" data-target="#more-product">
                                                        <i class="mdi mdi-more"></i>
                                                        <span>نمایش بیشتر</span>
                                                    </a>
                                                    <div class="modal fade" id="more-product" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered more-product"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div id="custom-events">
                                                                        <a
                                                                            href="/assets/home/images/page-single-product/product-img/product-img-note10.jpg">
                                                                            <img
                                                                                src="/assets/home/images/page-single-product/product-img/product-img-note10.jpg" />
                                                                        </a>
                                                                        <a
                                                                            href="/assets/home/images/page-single-product/product-img/product-img-note10-big-1.jpg">
                                                                            <img
                                                                                src="/assets/home/images/page-single-product/product-img/product-img-note10-big-1.jpg" />
                                                                        </a>
                                                                        <a
                                                                            href="/assets/home/images/page-single-product/product-img/product-img-note10-big-2.jpg">
                                                                            <img
                                                                                src="/assets/home/images/page-single-product/product-img/product-img-note10-big-2.jpg" />
                                                                        </a>
                                                                        <a
                                                                            href="/assets/home/images/page-single-product/product-img/product-img-note10-big-3.jpg">
                                                                            <img
                                                                                src="/assets/home/images/page-single-product/product-img/product-img-note10-big-3.jpg" />
                                                                        </a>
                                                                        <a
                                                                            href="/assets/home/images/page-single-product/product-img/product-img-note10-big-4.jpg">
                                                                            <img
                                                                                src="/assets/home/images/page-single-product/product-img/product-img-note10-big-4.jpg" />
                                                                        </a>
                                                                        <a
                                                                            href="/assets/home/images/page-single-product/product-img/product-img-note10-big-5.jpg">
                                                                            <img
                                                                                src="/assets/home/images/page-single-product/product-img/product-img-note10-big-5.jpg" />
                                                                        </a>
                                                                        <a
                                                                            href="/assets/home/images/page-single-product/product-img/product-img-note10-big-6.jpg">
                                                                            <img
                                                                                src="/assets/home/images/page-single-product/product-img/product-img-note10-big-6.jpg" />
                                                                        </a>
                                                                        <a
                                                                            href="/assets/home/images/page-single-product/product-img/product-img-note10-big-7.jpg">
                                                                            <img
                                                                                src="/assets/home/images/page-single-product/product-img/product-img-note10-big-7.jpg" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="Three-dimensional">

                                                    @if (session()->has('compareProducts'))

                                                    @if (in_array($product->id,
                                                    session()->get('compareProducts')) )
                                                    <a href="product-comparison.html" data-product="{{$product->id}}"
                                                        class="btn-option btn-compare" style="color: #651fff;">
                                                        <i class="mdi mdi-compare"></i>
                                                        <span>مقایسه</span>
                                                    </a>

                                                    @else
                                                    <a href="product-comparison.html" data-product="{{$product->id}}"
                                                        class="btn-option btn-compare">
                                                        <i class="mdi mdi-compare"></i>
                                                        <span>مقایسه</span>
                                                    </a>
                                                    @endif

                                                    @else
                                                    <a href="product-comparison.html" data-product="{{$product->id}}"
                                                        class="btn-option btn-compare">
                                                        <i class="mdi mdi-compare"></i>
                                                        <span>مقایسه</span>
                                                    </a>
                                                    @endif

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="gallery-item">
                                        <div class="gallery-img">
                                            <a href="#">
                                                <img class="zoom-img" id="img-product-zoom"
                                                    src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)}}"
                                                    data-zoom-image="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)}}"
                                                    width="411" />
                                                <div id="gallery_01f" style="width:420px;float:right;">
                                            </a>
                                            <ul class="gallery-items owl-carousel owl-theme" id="gallery-slider">
                                                @foreach ($product->images as $image_value )
                                                <li class="item">
                                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                                        data-image="{{url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value->image)}}"
                                                        data-zoom-image="{{url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value->image)}}">
                                                        <img src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value->image)}}"
                                                            width="100" /></a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </section>
                    </div>
                    <div class="col-lg-7 col-xs-12 pl mt-5 d-block">
                        <section class="product-info">
                            <div class="product-headline">
                                <h1 class="product-title">
                                    {{$product->name}}
                                </h1>
                                <!-- <div class="product-guaranteed text-success">
                                    12
                                    <span>فروش موفق</span>
                                </div> -->
                            </div>
                            <div class="product-attributes">
                                <div class="product-config">

                                    <span>امتیاز :</span>

                                    <span data-rating-stars="5" data-rating-readonly="true"
                                        data-rating-value="{{ceil($product->rates->avg('rate'))}}">
                                    </span>
                                    <span class="product-title-en">کد محصول: </span><span
                                        class="sku product-title-en"></span>



                                </div>
                            </div>
                            <div class="product-config-wrapper">
                                <div class="product-directory">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fa fa-archive"></i> دسته:
                                            </span>
                                            <a href="#"
                                                class="product-link product-cat-title">{{$product->category->name}}</a>
                                            ,
                                            <a href="#"
                                                class="product-link product-cat-title">{{$product->category->parent->name}}</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fa fa-tags"></i> برچسب:
                                            </span>
                                            @foreach ($product->tags as $tag )

                                            <a href="#" class="product-link product-tag-title">{{$tag->name}} ،</a>
                                            @endforeach

                                        </li>
                                        <li>
                                            <span>
                                                برند:
                                            </span>
                                            <a href="#"
                                                class="product-link product-tag-title">{{$product->brand->slug}}</a>
                                        </li>
                                        <li>
                                            <span>
                                                ({{$product->approvedComments()->count()}}) نظر
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                @php
                                if($product->sale_check)
                                {
                                $variationProductSelected = $product->sale_check;
                                }else{
                                $variationProductSelected = $product->price_check;
                                }
                                @endphp
                                <div class="col=lg-6 col-md-6 col-xs-12 pr">
                                    <div class="product-variants mb-2">

                                    </div>
                                    <div class="product-params pt-3">
                                        <ul data-title="ویژگی‌های محصول">
                                            @foreach ($product->attributes()->with('attribute')->get() as $attribute )
                                            <li>
                                                <span>{{$attribute->attribute->name}}:</span>
                                                <span>{{$attribute->value}}</span>
                                            </li>
                                            @endforeach
                                        </ul>

                                        <ul
                                            data-title="{{App\Models\Attribute::find($product->variations->first()->attribute_id)->name}}:">

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-xs-12 pr">


                                                        <select name="variation" id="var-select"
                                                            style="display: inline; width: 75%;"
                                                            class="select-var form-control form-control-sm"
                                                            id="varition">
                                                            @foreach ($product->variations()->where('quantity', '>'
                                                            ,
                                                            0)->get()
                                                            as
                                                            $variation )
                                                            <option
                                                                value="{{ json_encode($variation->only(['id' , 'sku' , 'quantity','is_sale' , 'sale_price' , 'price'])) }}"
                                                                {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                {{$variation->value}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col=lg-6 col-md-6 col-xs-12 pr">
                                    <div class="product-seller-info">
                                        <div class="seller-info-changable">
                                            <div class="product-seller-row vendor">
                                                <span class="title"> فروشنده:</span>
                                                <a href="#" class="product-name">{{env('APP_NAME')}}</a>
                                            </div>
                                            <div class="product-seller-row guarantee">
                                                <span class="title"> گارانتی:</span>
                                                <a href="#" class="product-name">۱۸ ماهه دیجی اسمارت</a>
                                            </div>
                                            <div class="product-seller-row price">
                                                <span class="title"> قیمت:</span>
                                                <a href="#" class="product-name variation-price">
                                                    @if ($product->quantity_check)

                                                    @if ($product->sale_check)

                                                    <span
                                                        class="amount">{{number_format($product->sale_check->sale_price)}}
                                                        تومان</span>

                                                    <del>{{number_format($product->sale_check->price)}}
                                                        تومان</del>
                                                    @else
                                                    <span
                                                        class="amount">{{ number_format($product->price_check->price) }}
                                                        تومان</span>
                                                    @endif
                                                    @else
                                                    <span class="amount">نا موجود</span>

                                                    @endif

                                                </a>
                                            </div>
                                            <div class="product-seller-row guarantee">
                                                <span class="title mt-3"> تعداد:</span>
                                                <div class="quantity pl">
                                                    <input type="number" class="numberstyle" min="1" step="1"
                                                        name="qtybutton" id="qtybutton" readonly value="1">
                                                    <div class="quantity-nav">
                                                        <div class="quantity-button quantity-up">+</div>
                                                        <div class="quantity-button quantity-down">-</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="product_id" name="product"
                                                value="{{$product->id}}">
                                            <div class="product-seller-row add-to-cart">
                                                <a href="#" class="btn-add-to-cart btn btn-primary" data-ishome="0">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <span class="btn-add-to-cart-txt">افزودن به سبد خرید</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabs">
            <div class="tab-box">
                <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ count($errors) > 0 ? '' : 'active' }}" id="Review-tab" data-toggle="tab"
                            href="#Review" role="tab" aria-controls="Review" aria-selected="true">
                            <i class="mdi mdi-glasses"></i>
                            نقد و بررسی
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Specifications-tab" data-toggle="tab" href="#Specifications" role="tab"
                            aria-controls="Specifications" aria-selected="false">
                            <i class="mdi mdi-format-list-checks"></i>
                            مشخصات
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="User-comments-tab" data-toggle="tab" href="#User-comments" role="tab"
                            aria-controls="User-comments" aria-selected="false">
                            <i class="mdi mdi-comment-text-multiple-outline"></i>
                            نظرات کاربران
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ count($errors) > 0 ? 'active' : '' }}" id="question-and-answer-tab"
                            data-toggle="tab" href="#question-and-answer" role="tab" aria-controls="question-and-answer"
                            aria-selected="false">
                            <i class="mdi mdi-comment-question-outline"></i>
                            پرسش و پاسخ
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg">
                <div class="tabs-content">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Review" role="tabpanel" aria-labelledby="Review-tab">
                            <h2 class="params-headline">نقد و بررسی اجمالی</h2>
                            <section class="content-expert-summary">
                                <div class="mask pm-3">
                                    <div class="mask-text">
                                        <p>
                                            {{$product->description}}
                                        </p>
                                    </div>
                                    <a href="#" class="mask-handler">
                                        <span class="show-more">+ ادامه مطلب</span>
                                        <span class="show-less">- بستن</span>
                                    </a>
                                    <div class="shadow-box"></div>
                                </div>
                            </section>

                        </div>
                        <div class="tab-pane fade" id="Specifications" role="tabpanel"
                            aria-labelledby="Specifications-tab">
                            <article>
                                <h2 class="params-headline">مشخصات فنی
                                    <span>Samsung Galaxy Note 10 Dual SIM 256GB Mobile Phone</span>
                                </h2>
                                <section>
                                    <ul class="params-list">
                                        @foreach ($product->attributes()->with('attribute')->get() as $attribute )
                                        <li class="params-list-item">
                                            <div class="params-list-key">
                                                <span class="block">{{$attribute->attribute->name}}</span>
                                            </div>
                                            <div class="params-list-value">
                                                <span class="block">
                                                    {{$attribute->value}}
                                                </span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </section>

                            </article>
                        </div>
                        <div class="tab-pane fade" id="User-comments" role="tabpanel"
                            aria-labelledby="User-comments-tab">
                            <div class="comments">
                                <h2 class="params-headline">امتیاز کاربران به
                                    <span>Samsung Galaxy Note 10 Dual SIM 256GB Mobile Phone</span>
                                </h2>
                                <div class="comments-summary">
                                    <div class="col-lg-6 col-md-6 col-xs-12 pr">
                                        <div class="comments-summary-box">
                                            <ul class="comments-item-rating">
                                                <li>
                                                    <span class="cell-title">کیفیت ساخت:</span>
                                                    <span class="cell-value">خوب</span>
                                                    <div class="rating-general">
                                                        <div class="rating-value"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="cell-title">ارزش خرید به نسبت قیمت:</span>
                                                    <span class="cell-value">خوب</span>
                                                    <div class="rating-general">
                                                        <div class="rating-value"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="cell-title">نوآوری:</span>
                                                    <span class="cell-value">خوب</span>
                                                    <div class="rating-general">
                                                        <div class="rating-value" style="width: 70%;"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="cell-title">امکانات و قابلیت ها:</span>
                                                    <span class="cell-value">متوسط</span>
                                                    <div class="rating-general">
                                                        <div class="rating-value" style="width: 65%;"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="cell-title">سهولت استفاده:</span>
                                                    <span class="cell-value">خوب</span>
                                                    <div class="rating-general">
                                                        <div class="rating-value" style="width: 75%;"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="cell-title">طراحی و ظاهر:</span>
                                                    <span class="cell-value">خوب</span>
                                                    <div class="rating-general">
                                                        <div class="rating-value"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12 pr">
                                        <div class="comments-summary-note">
                                            <h6>شما هم می‌توانید در مورد این کالا نظر بدهید.</h6>
                                            <p>
                                                برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود شوید. اگر این
                                                محصول را قبلا از دیجی‌کالا خریده باشید،
                                                نظر
                                                شما به عنوان مالک محصول ثبت خواهد شد.
                                            </p>
                                            <a href="#" class="btn-add-comment btn btn-secondary">افزودن نظر
                                                جدید</a>
                                        </div>
                                    </div>
                                    <div class="product-comment-list">
                                        <ul class="comment-list">
                                            <li>
                                                <div class="col-lg-3 pr">
                                                    <section>
                                                        <div class="comments-user-shopping">حسن شجاعی
                                                            <div class="cell-date">
                                                                در تاریخ ۱۸ فروردین ۱۳۹۹
                                                            </div>
                                                            <div class="message-light"><i
                                                                    class="fa fa-thumbs-o-up"></i>خرید این محصول را
                                                                توصیه می‌کنم</div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div class="col-lg-9 pl">
                                                    <div class="article">
                                                        <ul class="comment-text">
                                                            <div class="header">
                                                                <div>بهتر از آیفون</div>
                                                                <div class="product-rate pl">
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                </div>
                                                                <p>در کل سامسونگ کاربردی تر از آیفون هست ولی از نظر
                                                                    کیفیت تصویر و سرعت آیفون بهتره و کلاس!</p>
                                                            </div>
                                                            <div class="comments-evaluation">
                                                                <div class="comments-evaluation-positive">
                                                                    <span>نقاط قوت</span>
                                                                    <ul>
                                                                        <li>
                                                                            سبک
                                                                        </li>
                                                                        <li>
                                                                            سرعت پردازش بالا
                                                                        </li>
                                                                        <li>
                                                                            خوش دست
                                                                        </li>
                                                                        <li>
                                                                            صفحه نمایش عالی
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="comments-evaluation-negative">
                                                                    <span>نقاط قوت</span>
                                                                    <ul>
                                                                        <li>
                                                                            قیمت زیاد
                                                                        </li>
                                                                        <li>
                                                                            باطری ضعیف
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="footer">
                                                                    <div class="comments-likes">آیا این نظر برایتان
                                                                        مفید بود؟
                                                                        <button class="btn-like js-comment-like"
                                                                            type="submit">بله
                                                                            <span class="count">8</span>
                                                                        </button>
                                                                        <button class="btn-like js-comment-dislike"
                                                                            type="submit">خیر
                                                                            <span class="count">4</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col-lg-3 pr">
                                                    <section>
                                                        <div class="comments-user-shopping">جلال بهرامی راد
                                                            <div class="cell-date">
                                                                در تاریخ ۱۹ فروردین ۱۳۹۹
                                                            </div>
                                                            <div class="message-light"><i
                                                                    class="fa fa-thumbs-o-up"></i>خرید این محصول را
                                                                توصیه می‌کنم</div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div class="col-lg-9 pl">
                                                    <div class="article">
                                                        <ul class="comment-text">
                                                            <div class="header">
                                                                <div>عالی و صدرصد بهتر از اپل</div>
                                                                <div class="product-rate pl">
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                </div>
                                                                <p>عالییه بنظرمن اونایی که میرن پول گوشی های ایفون
                                                                    با اون قیمت رو میدن با استفاده از این گوشی باید
                                                                    نظرشونو عوض کنن</p>
                                                            </div>
                                                            <div class="comments-evaluation">
                                                                <div class="comments-evaluation-positive">
                                                                    <span>نقاط قوت</span>
                                                                    <ul>
                                                                        <li>
                                                                            سبک
                                                                        </li>
                                                                        <li>
                                                                            سرعت پردازش بالا
                                                                        </li>
                                                                        <li>
                                                                            خوش دست
                                                                        </li>
                                                                        <li>
                                                                            صفحه نمایش عالی
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="comments-evaluation-negative">
                                                                    <span>نقاط قوت</span>
                                                                    <ul>
                                                                        <li>
                                                                            قیمت زیاد
                                                                        </li>
                                                                        <li>
                                                                            باطری ضعیف
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="footer">
                                                                    <div class="comments-likes">آیا این نظر برایتان
                                                                        مفید بود؟
                                                                        <button class="btn-like js-comment-like"
                                                                            type="submit">بله
                                                                            <span class="count">8</span>
                                                                        </button>
                                                                        <button class="btn-like js-comment-dislike"
                                                                            type="submit">خیر
                                                                            <span class="count">4</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="question-and-answer" role="tabpanel"
                            aria-labelledby="question-and-answer-tab">
                            <div class="faq">
                                <h2 class="params-headline">پرسش و پاسخ
                                    <span>پرسش خود را در مورد محصول مطرح نمایید</span>
                                </h2>
                                <form action="#" class="form-faq">
                                    <div class="form-faq-row mt-4">
                                        <div class="form-faq-col">
                                            <div class="ui-textarea">
                                                <textarea name="qa" title="متن سوال"
                                                    class="ui-textarea-field"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-faq-row mt-4">
                                        <div class="form-faq-col form-faq-col-submit">
                                            <button class="btn-tertiary btn btn-secondary" type="submit">ثبت
                                                پرسش</button>
                                            <div class="form-faq-col-agreement d-inline-block mr-5">
                                                <div class="form-auth-row">
                                                    <label for="#" class="ui-checkbox mt-1">
                                                        <input type="checkbox" value="1" name="login" id="remember">
                                                        <span class="ui-checkbox-check"></span>
                                                    </label>
                                                    <label for="remember" class="remember-me mr-0">اولین پاسخی که به
                                                        پرسش من داده شد، از طریق ایمیل به من اطلاع دهید. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div id="product-questions-list">
                                    <div class="questions-list">
                                        <ul class="faq-list">
                                            <li class="is-question">
                                                <div class="section">
                                                    <div class="faq-header">
                                                        <span class="icon-faq">?</span>
                                                        <p class="h5">
                                                            پرسش :
                                                            <span>جلال</span>
                                                        </p>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                        با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
                                                        و مجله در ستون و سطرآنچنان که لازم است</p>
                                                    <div class="faq-date">
                                                        <em>۱۴ فروردین ۱۳۹۹</em>
                                                    </div>
                                                    <a href="#" class="js-add-answer-btn">به این پرسش پاسخ
                                                        دهید </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="questions-list answer-questions">
                                        <ul class="faq-list">
                                            <li class="is-question">
                                                <div class="section">
                                                    <div class="faq-header">
                                                        <span class="icon-faq"><i class="mdi mdi-storefront"></i></span>
                                                        <p class="h5">
                                                            پاسخ فروشنده :
                                                            <span>حسن</span>
                                                        </p>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                        با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
                                                        و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                        تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                        کاربردی می باشد.</p>
                                                    <div class="faq-date">
                                                        <em>۱۴ فروردین ۱۳۹۹</em>
                                                    </div>
                                                    <a href="#" class="js-add-answer-btn">به این پرسش پاسخ
                                                        دهید </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="questions-list">
                                        <ul class="faq-list">
                                            <li class="is-question">
                                                <div class="section">
                                                    <div class="faq-header">
                                                        <span class="icon-faq">?</span>
                                                        <p class="h5">
                                                            پرسش :
                                                            <span>اشکان</span>
                                                        </p>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                        با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
                                                        و مجله در ستون و سطرآنچنان که لازم است</p>
                                                    <div class="faq-date">
                                                        <em>۱۴ فروردین ۱۳۹۹</em>
                                                    </div>
                                                    <a href="#" class="js-add-answer-btn">به این پرسش پاسخ
                                                        دهید </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="questions-list answer-questions">
                                        <ul class="faq-list">
                                            <li class="is-question">
                                                <div class="section">
                                                    <div class="faq-header">
                                                        <span class="icon-faq"><i class="mdi mdi-storefront"></i></span>
                                                        <p class="h5">
                                                            پاسخ فروشنده :
                                                            <span>جواد</span>
                                                        </p>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                        با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
                                                        و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                        تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                        کاربردی می باشد.</p>
                                                    <div class="faq-date">
                                                        <em>۱۴ فروردین ۱۳۹۹</em>
                                                    </div>
                                                    <a href="#" class="js-add-answer-btn">به این پرسش پاسخ
                                                        دهید </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="questions-list">
                                        <ul class="faq-list">
                                            <li class="is-question">
                                                <div class="section">
                                                    <div class="faq-header">
                                                        <span class="icon-faq">?</span>
                                                        <p class="h5">
                                                            پرسش :
                                                            <span>رضا</span>
                                                        </p>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                        با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
                                                        و مجله در ستون و سطرآنچنان که لازم است</p>
                                                    <div class="faq-date">
                                                        <em>۱۴ فروردین ۱۳۹۹</em>
                                                    </div>
                                                    <a href="#" class="js-add-answer-btn">به این پرسش پاسخ
                                                        دهید </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')

<script>
$(document).ready(function(e) {

    let variation = JSON.parse($('#var-select').val());
    let variationPriceDiv = $('.variation-price');
    variationPriceDiv.empty();
    $('.sku').html(variation.sku)

    if (variation.is_sale) {
        let spanSale = $('<span />', {
            class: 'amount',
            text: number_format(variation.sale_price) + ' تومان'
        });
        let spanPrice = $('<del />', {
            class: 'amount',
            text: number_format(variation.price) + ' تومان'
        });

        variationPriceDiv.append(spanSale);
        variationPriceDiv.append(spanPrice);
    } else {
        let spanPrice = $('<span />', {
            class: 'amount',
            text: number_format(variation.price) + ' تومان'
        });
        variationPriceDiv.append(spanPrice);
    }

    $('.numberstyle').attr('max', variation.quantity);
    $('.numberstyle').val(1);

});

$('#var-select').on('change', function() {

    let variation = JSON.parse(this.value);
    let variationPriceDiv = $('.variation-price');
    variationPriceDiv.empty();

    $('.sku').html(variation.sku)

    if (variation.is_sale) {
        let spanSale = $('<span />', {
            class: 'amount',
            text: number_format(variation.sale_price) + ' تومان'
        });
        let spanPrice = $('<del />', {
            class: 'amount',
            text: number_format(variation.price) + ' تومان'
        });

        variationPriceDiv.append(spanSale);
        variationPriceDiv.append(spanPrice);
    } else {
        let spanPrice = $('<span />', {
            class: 'amount',
            text: number_format(variation.price) + ' تومان'
        });
        variationPriceDiv.append(spanPrice);
    }



    $('.numberstyle').attr('max', variation.quantity);
    $('.numberstyle').val(1);



})

function reply(id) {

    let sid = 'reply-form-' + id;
    console.log(sid);
    $('#' + sid).toggle();
}
</script>
<script>
(function($) {

    $.fn.numberstyle = function(options) {

        /*
         * Default settings
         */
        var settings = $.extend({
            value: 0,
            step: undefined,
            min: undefined,
            max: undefined
        }, options);

        /*
         * Init every element
         */
        return this.each(function(i) {

            /*
             * Base options
             */
            var input = $(this);

            /*
             * Add new DOM
             */

            /*
             * Attach events
             */
            // use .off() to prevent triggering twice
            $(document).off('click', '.qty-btn').on('click', '.qty-btn', function(e) {

                var input = $(this).siblings('input'),
                    sibBtn = $(this).siblings('.qty-btn'),
                    step = (settings.step) ? parseFloat(settings.step) : parseFloat(input.attr(
                        'step')),
                    min = (settings.min) ? settings.min : (input.attr('min')) ? input.attr(
                        'min') : undefined,
                    max = (settings.max) ? settings.max : (input.attr('max')) ? input.attr(
                        'max') : undefined,
                    oldValue = parseFloat(input.val()),
                    newVal;

                //Add value
                if ($(this).hasClass('qty-add')) {

                    newVal = (oldValue >= max) ? oldValue : oldValue + step,
                        newVal = (newVal > max) ? max : newVal;

                    if (newVal == max) {
                        $(this).addClass('disabled');
                    }
                    sibBtn.removeClass('disabled');

                    //Remove value
                } else {

                    newVal = (oldValue <= min) ? oldValue : oldValue - step,
                        newVal = (newVal < min) ? min : newVal;

                    if (newVal == min) {
                        $(this).addClass('disabled');
                    }
                    sibBtn.removeClass('disabled');

                }

                //Update value
                input.val(newVal).trigger('change');

            });

            input.on('change', function() {

                const val = parseFloat(input.val()),
                    min = (settings.min) ? settings.min : (input.attr('min')) ? input.attr(
                        'min') : undefined,
                    max = (settings.max) ? settings.max : (input.attr('max')) ? input.attr(
                        'max') : undefined;

                if (val > max) {
                    input.val(max);
                }

                if (val < min) {
                    input.val(min);
                }
            });

        });
    };
    $('.numberstyle').numberstyle();

}(jQuery));
</script>

@endpush
@push('styles')

<link rel="stylesheet" type="text/css" href="{{asset('/assets/home/css/number.css')}}" />
<style>
.owl-carousel {
    touch-action: manipulation;
}
</style>


@endpush
@endsection