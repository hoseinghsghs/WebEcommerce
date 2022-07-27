@extends('home.layout.MasterHome')
@section('title', "خانه -". $product->slug)
@section('content')
<main class="main mb-10 pb-1">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no">
            <li><a href="{{route('home')}}">صفحه اصلی </a></li>
            <li><a href="{{route('home')}}">محصولات </a></li>
            <li>{{$product->name}} </li>
        </ul>
    </nav>
    <!-- End of Breadcrumb -->
    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="product product-single row">
                        <div class="col-md-6 mb-4 mb-md-8">
                            <div class="product-gallery product-gallery-sticky">
                                <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no"
                                    data-owl-options="{
                                            'nav': true,
                                            'dots': false,
                                            'rtl': true,
                                            'items': 1,
                                            'margin': 20
                                        }">
                                    <figure class="product-image">
                                        <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)}}"
                                            data-zoom-image="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)}}"
                                            alt="{{$product->slug}}" width="800" height="900">
                                    </figure>
                                    @foreach ($product->images as $image_value )
                                    <figure class="product-image">
                                        <img src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value->image)}}"
                                            data-zoom-image="{{url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value->image)}}"
                                            alt="{{$product->slug}}" width="800" height="900">
                                    </figure>
                                    @endforeach
                                </div>
                                <div class="product-thumbs-wrap">
                                    <div class="product-thumbs row cols-4 gutter-sm">
                                        <div class="product-thumb">
                                            <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)}}"
                                                alt="{{$product->slug}}" width="800" height="900">
                                        </div>
                                        @foreach ( $product->images as $image_value_second )
                                        <div class="product-thumb">
                                            <img src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value_second->image)}}"
                                                alt="{{$product->slug}}" width="800" height="900">
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                                    <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-6 mb-md-8">
                            <div class="product-details" data-sticky-options="{'minWidth': 767}">

                                <span>

                                    <div class="social-links-wrapper">
                                        <div class="product-link-wrapper d-flex">
                                            <div class="social-links" style="margin-left: 20px;">
                                                <div class="social-icons social-no-color border-thin">
                                                    <h1 class="product-title"> {{$product->name}} </h1>
                                                </div>
                                            </div>
                                            <span class="divider d-xs-show" style="margin-left: 20px;"></span>

                                            <a id='wished' data-product="{{$product->id}}"
                                                class='{{ $product->checkUserWishlist(1) ? "btn-product-icon btn-wishlist added w-icon-heart-full" : "btn-product-icon btn-wishlist w-icon-heart" }}'><span></span></a>

                                            @if (session()->has('compareProducts'))
                                            @if (in_array($product->id, session()->get('compareProducts')) )
                                            <a data-product="{{$product->id}}"
                                                class="btn-product-icon btn-compare added w-icon-check-solid"
                                                title="افزودن برای مقایسه"></a>
                                            @else
                                            <a data-product="{{$product->id}}"
                                                class="btn-product-icon btn-compare w-icon-compare"
                                                title="افزودن برای مقایسه"></a>
                                            @endif
                                            @else
                                            <a data-product="{{$product->id}}"
                                                class="btn-product-icon btn-compare w-icon-compare"
                                                title="افزودن برای مقایسه"></a>
                                            @endif
                                        </div>
                                    </div>
                                </span>

                                <div class="product-bm-wrapper">
                                    <figure class="brand">
                                        <img src="{{url(env('BRAND_IMAGES_PATCH').$product->brand->image)}}"
                                            alt="{{$product->brand->slug}}" width="105" height="48" />
                                    </figure>
                                    <div class="product-meta">
                                        <div class="product-categories">
                                            دسته بندی:
                                            <span class="product-category"><a
                                                    href="#">{{$product->category->parent->name}} /
                                                    {{$product->category->name}}
                                                </a></span>
                                        </div>
                                        <div class="product-sku">

                                            کد: <span class="sku"></span>
                                        </div>
                                    </div>
                                </div>

                                <hr class="product-divider">

                                <form class="cart-form" style="display:inline">

                                    <div class="product-price variation-price">

                                        @if ($product->quantity_check)

                                        @if ($product->sale_check)

                                        <ins class="new-price">{{number_format($product->sale_check->sale_price)}}
                                            تومان</ins>

                                        <del class="old-price">{{number_format($product->sale_check->price)}}
                                            تومان</del>
                                        @else
                                        <ins class="new-price">{{ number_format($product->price_check->price) }}
                                            تومان</ins>
                                        @endif
                                        @else
                                        <ins class="new-price">نا موجود</ins>

                                        @endif
                                    </div>

                                    <div class="ratings-container">
                                        <div class="ht-product-ratting-wrap mt-4">
                                            <div data-rating-stars="5" data-rating-readonly="true"
                                                data-rating-value="{{ceil($product->rates->avg('rate'))}}">
                                            </div>
                                        </div>
                                        <a href="#product-tab-reviews"
                                            class="rating-reviews">({{$product->approvedComments()->count()}} نظر )</a>
                                    </div>



                                    <div class="product-short-desc">
                                        <ul class="list-type-check list-style-none">

                                            <li>
                                                {{$product->description}};
                                            </li>
                                        </ul>
                                    </div>

                                    <hr class="product-divider">
                                    @foreach ($product->attributes()->with('attribute')->get() as $attribute )
                                    <div class="product-form product-variation-form product-color-swatch">
                                        <label>{{$attribute->attribute->name}}:</label>
                                        <div class="d-flex align-items-center product-variations">
                                            {{$attribute->value}}
                                        </div>
                                    </div>
                                    @endforeach



                                    @php
                                    if($product->sale_check)
                                    {
                                    $variationProductSelected = $product->sale_check;
                                    }else{
                                    $variationProductSelected = $product->price_check;
                                    }
                                    @endphp

                                    <div class="product-form product-variation-form product-size-swatch">
                                        <label
                                            class="mb-1">{{App\Models\Attribute::find($product->variations->first()->attribute_id)->name}}
                                            : </label>
                                        <div class="flex-wrap d-flex align-items-center product-variations">
                                            <select name="variation" id="var-select" class="select-var">
                                                @foreach ($product->variations()->where('quantity', '>' , 0)->get() as
                                                $variation )
                                                <option
                                                    value="{{ json_encode($variation->only(['id' , 'sku' , 'quantity','is_sale' , 'sale_price' , 'price'])) }}"
                                                    {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                    {{$variation->value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" id="product_id" name="product" value="{{$product->id}}">

                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container">
                                            <input class="numberstyle" name="qtybutton" id="qtybutton"
                                                style="background-color: #ececec ; color:#666666" type="number" min="1"
                                                step="1" value="1" readonly>
                                        </div>
                                    </div>
                                    <button id="btn-cart" class="btn btn-primary btn-cart" style="margin-top: 8px; margin-right:20rem"
                                        type="submit">
                                        <i class="w-icon-cart"></i>
                                        <span>افزودن به سبد </span>
                                    </button>
                                </form>
                                <div class="social-links-wrapper">
                                    <div class="social-links">
                                        <div class="social-icons social-no-color border-thin">
                                            <h5>تگ ها :
                                            </h5>

                                        </div>
                                    </div>
                                    <div class="product-link-wrapper d-flex">
                                        <h6>@foreach ($product->tags as $tag )
                                            {{$tag->name}}/
                                            @endforeach</h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#product-tab-description"
                                    class="nav-link {{ count($errors) > 0 ? '' : 'active' }}">توضیحات </a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-specification" class="nav-link">مشخصات </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#product-tab-vendor" class="nav-link">اطلاعات فروشنده </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="#product-tab-reviews"
                                    class="nav-link {{ count($errors) > 0 ? 'active' : '' }}">نظرات مشتریان
                                    ({{$product->approvedComments()->count()}})</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane {{ count($errors) > 0 ? '' : 'active' }}" id="product-tab-description">
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-5">
                                        <h4 class="title tab-pane-title font-weight-bold mb-2">جزئیات </h4>
                                        <p class="mb-4">{{$product->description}}</p>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="product-tab-specification">
                                <ul class="list-none">
                                    @foreach ($product->attributes()->with('attribute')->get() as $attribute )
                                    <li>
                                        <label>{{$attribute->attribute->name}} </label>
                                        <p> {{$attribute->value}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="tab-pane {{ count($errors) > 0 ? 'active' : '' }}" id="product-tab-reviews">
                                <div class="row mb-4">
                                    <div class="col-xl-4 col-lg-5 mb-4">
                                        <div class="ratings-wrapper">
                                            <div class="avg-rating-container">
                                                <h4 class="avg-mark font-weight-bolder ls-50">
                                                    {{ceil($product->rates->avg('rate'))}}</h4>
                                                <div class="avg-rating">
                                                    <p class="text-dark mb-1">میانگین امتیاز </p>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings"
                                                                style='width: {{(ceil($product->rates->avg('rate'))*100)/5}}%'></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <a href="#"
                                                            class="rating-reviews">({{(ceil($product->rates->avg('rate'))*100)/5}}%)</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="ratings-value d-flex align-items-center text-dark ls-25">
                                                <span class="text-dark font-weight-bold">66.7%</span>توصیه شده <span
                                                    class="count">(2 از 3)</span>
                                            </div> -->

                                            <!-- <div class="ratings-list">
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>70%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 80%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>30%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 60%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>40%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 40%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>0%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 20%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>0%</mark>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-7 mb-4" id="comments">
                                        <div class="review-form-wrapper">
                                            <h3 class="title tab-pane-title font-weight-bold mb-1">ارسال نظر </h3>
                                            <p class="mb-3">آدرس ایمیل شما منتشر نخواهد شد. فیلدهای مورد نیاز علامت
                                                گذاری
                                                شده است *</p>

                                            @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <div class="col-md-6 mb-4">
                                                <div class="alert alert-icon alert-error alert-bg alert-inline">
                                                    <h4 class="alert-title">
                                                        <i class="w-icon-times-circle"></i>
                                                    </h4> {{ $error }}
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                            <form
                                                action="{{route('home.comments.store' , ['product' => $product->id])}}"
                                                method="POST" class="review-form">
                                                @csrf
                                                <div class="rating-form">
                                                    <label for="rating">رتبه شما از این محصول :</label>
                                                    <span class="rating-stars">
                                                        <a class="star-1" href="#">1</a>
                                                        <a class="star-2" href="#">2</a>
                                                        <a class="star-3" href="#">3</a>
                                                        <a class="star-4" href="#">4</a>
                                                        <a class="star-5" href="#">5</a>
                                                    </span>
                                                    <select name="rate" id="rating" style="display: none;">
                                                        <option value="">امتیاز ... </option>
                                                        <option value="5">عالی </option>
                                                        <option value="4">خوب </option>
                                                        <option value="3">معمولی </option>
                                                        <option value="2">بد نبود </option>
                                                        <option value="1">بسیار بد </option>
                                                    </select>
                                                </div>


                                                <textarea name="text" cols="30" rows="6"
                                                    placeholder="نظر خود را اینجا بنویسید..." class="form-control"
                                                    id="review"></textarea>

                                                <div class="row gutter-md">
                                                    <div class="col-md-6">
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="نام شما" id="author">

                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="email" class="form-control"
                                                            placeholder="ایمیل شما" id="email_1">

                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-dark">ارسال نظر </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                    <ul class="nav nav-tabs" role="tablist">
                                    </ul>

                                    @foreach ($product->approvedComments as $comment )
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="show-all">
                                            <ul class="comments list-style-none">
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <figure class="comment-avatar">
                                                            <img src="{{ $comment->user->avatar == null ? asset('/assets/images/agents/01.png') : $comment->user->avatar }}"
                                                                alt="Commenter Avatar" width="90" height="90">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a
                                                                    href="#">{{$comment->user->name == null ? "بدون نام" : $comment->user->name }}</a>
                                                                <span
                                                                    class="
                                                                comment-date">{{Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('Y/n/j')}}</span>
                                                            </h4>

                                                            <div class="ratings-container comment-rating">
                                                                <div class="ratings-full">
                                                                    <span class="ratings"
                                                                        style="width: {{(ceil($comment->commentable->rates->first()->rate)*100)/5}}%'"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <p>{{$comment->text}}</p>
                                                            <div class="comment-action">
                                                                <a href="#"
                                                                    class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                    <i class="far fa-thumbs-up"></i> مفید (1)
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                    <i class="far fa-thumbs-down"></i>بی فایده
                                                                    (0)
                                                                </a>
                                                                <a style="float: left;"
                                                                    onclick="reply('{{$comment->id}}')"
                                                                    class="btn btn-secondary btn-dark btn-link btn-underline sm btn-icon-right font-weight-normal text-capitalize">
                                                                    پاسخ
                                                                    <i class="fa fa-reply"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form style="margin-top: 3rem; margin-right: 14rem;" hidden
                                                        id="reply-form-{{$comment->id}}"
                                                        action="{{route('reply.add' , ['product' => $product->id , 'comment' => $comment->id])}}"
                                                        method="POST" class="review-form">
                                                        @csrf

                                                        <textarea name="text" cols="30" rows="6"
                                                            placeholder="پاسخ خود را اینجا بنویسید..."
                                                            class="form-control" id="review"></textarea>

                                                        <button type="submit" class="btn btn-dark">پاسخ
                                                        </button>
                                                    </form>

                                                    <!-- پاسخ -->
                                                    @foreach ($comment->replies as $reply)
                                                    @if ($reply->approved == 1)

                                                    <div class="comment-body"
                                                        style="margin-top: 3rem; margin-right:5rem ;">
                                                        <figure class="comment-avatar">
                                                            <img src="{{ $reply->user->avatar == null ? asset('/assets/images/agents/01.png') : $reply->user->avatar }}"
                                                                alt="Commenter Avatar" width="45" height="45">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a
                                                                    href="#">{{$reply->user->name == null ? "بدون نام" : $reply->user->name }}</a>
                                                                <span
                                                                    class="
                                                                comment-date">{{Hekmatinasser\Verta\Verta::instance($reply->created_at)->format('Y/n/j')}}</span>
                                                            </h4>

                                                            <p>{{$reply->text}}</p>
                                                            <div class="comment-action">
                                                                <a href="#"
                                                                    class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                    <i class="far fa-thumbs-up"></i> مفید (1)
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                    <i class="far fa-thumbs-down"></i>بی فایده
                                                                    (0)
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endif

                                                    @endforeach

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="helpful-positive">

                                        </div>
                                        <div class="tab-pane" id="helpful-negative">

                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="related-product-section">
                        <div class="title-link-wrapper mb-4">
                            <h4 class="title">محصولات اخیر </h4>
                            <a href="{{route('home.products.show' , ['product' => $product->slug])}}"
                                class="btn btn-dark btn-link btn-slide-right btn-icon-right">ادامه محصولات <i
                                    class="w-icon-long-arrow-left"></i></a>
                        </div>
                        <div class="owl-carousel owl-theme row cols-lg-3 cols-md-4 cols-sm-3 cols-2" data-owl-options="{
                                    'nav': false,
                                    'dots': false,
                                    'margin': 20,
                                    'rtl' : true,
                                    'responsive': {
                                        '0': {
                                            'items': 2
                                        },
                                        '576': {
                                            'items': 3
                                        },
                                        '768': {
                                            'items': 4
                                        },
                                        '992': {
                                            'items': 3
                                        }
                                    }
                                }">

                            @foreach ($products_latest as $product_latest )
                            <div class="product">
                                <figure class="product-media">
                                    <a href="{{route('home.products.show' , ['product' => $product->slug])}}">
                                        <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product_latest->primary_image)}}"
                                            alt="{{$product->slug}}" width="300" height="338" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a
                                            href="{{route('home.products.show' , ['product' => $product->slug])}}">{{$product_latest->name}}
                                        </a></h4>
                                    <div class="ratings-container">
                                        <div class="ht-product-ratting-wrap mt-4">
                                            <div data-rating-stars="5" data-rating-readonly="true"
                                                data-rating-value="{{ceil($product->rates->avg('rate'))}}">
                                            </div>
                                        </div>
                                        <a href="" class="rating-reviews">({{$product->approvedComments()->count()}} نظر
                                            )</a>

                                    </div>

                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            @if ($product_latest->quantity_check)

                                            @if ($product_latest->sale_check)

                                            <ins class="new-price">{{number_format($product_latest->sale_check->sale_price)}}
                                                تومان</ins>

                                            <del class="old-price">{{number_format($product_latest->sale_check->price)}}
                                                تومان</del>
                                            @else
                                            <ins class="new-price">{{ number_format($product_latest->price_check->price) }}
                                                تومان</ins>
                                            @endif
                                            @else
                                            <ins class="new-price">نا موجود</ins>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </section>
                </div>
                <!-- End of Main Content -->
                <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                    <div class="sidebar-content scrollable">
                        <div class="sticky-sidebar">
                            <div class="widget widget-icon-box mb-6">
                                @foreach ( $services as $key => $service )
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="{{$service->icon}}"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">{{$service->title}}</h4>
                                        <p>{{$service->description}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- End of Widget Icon Box -->
                            @isset($banner_product)
                            <div class="widget widget-banner mb-9">
                                <div class="banner banner-fixed br-sm">
                                    <figure>
                                        <img src="{{url(env('BANNER_IMAGES_PATCH').$banner_product->image)}}"
                                            alt="{{$banner_product->title}}" width="266" height="220"
                                            style="background-color: #1D2D44" />
                                    </figure>
                                    <div class="banner-content">
                                        <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                            {{$banner_product->title}}<sup class="font-weight-bold">%</sup><sub
                                                class="font-weight-bold text-uppercase ls-25">{{$banner_product->text}}</sub>
                                        </div>
                                        <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                            {{$banner_product->button_text}}</h4>
                                    </div>
                                </div>
                            </div>
                            @endisset

                            <!-- End of Widget Banner -->

                            <div class="widget widget-products">
                                <div class="title-link-wrapper mb-2">
                                    <h4 class="title title-link font-weight-bold">محصولات بیشتر </h4>
                                </div>

                                <div class="owl-carousel owl-theme owl-nav-top" data-owl-options="{
                                            'nav': true,
                                            'dots': false,
                                            'rtl': true,
                                            'items': 1,
                                            'margin': 20
                                        }">

                                    <div class="widget-col">
                                        @foreach ($product_simulation as $product )

                                        <div class="product product-widget">
                                            <figure class="product-media">
                                                <a
                                                    href="{{route('home.products.show' , ['product' => $product->slug])}}">
                                                    <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)}}"
                                                        alt="{{$product->slug}}" width="100" height="113" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a
                                                        href="{{route('home.products.show' , ['product' => $product->slug])}}">{{$product->name}}
                                                    </a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                @if ($product->quantity_check)

                                                @if ($product->sale_check)

                                                <ins class="new-price">{{number_format($product->sale_check->sale_price)}}
                                                    تومان</ins>

                                                <del class="old-price">{{number_format($product->sale_check->price)}}
                                                    تومان</del>
                                                @else
                                                <ins class="new-price">{{ number_format($product->price_check->price) }}
                                                    تومان</ins>
                                                @endif
                                                @else
                                                <ins class="new-price">نا موجود</ins>

                                                @endif
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </aside>
                <!-- End of Sidebar -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
@endsection

@push('scripts')

<script>
$(document).ready(function(e) {

    let variation = JSON.parse($('#var-select').val());
    let variationPriceDiv = $('.variation-price');
    variationPriceDiv.empty();
    $('.sku').html(variation.sku)

    if (variation.is_sale) {
        let spanSale = $('<ins />', {
            class: 'new-price',
            text: number_format(variation.sale_price) + ' تومان'
        });
        let spanPrice = $('<del />', {
            class: 'old-price',
            text: number_format(variation.price) + ' تومان'
        });

        variationPriceDiv.append(spanSale);
        variationPriceDiv.append(spanPrice);
    } else {
        let spanPrice = $('<ins />', {
            class: 'new-price',
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
        let spanSale = $('<ins />', {
            class: 'new-price',
            text: number_format(variation.sale_price) + ' تومان'
        });
        let spanPrice = $('<del />', {
            class: 'old-price',
            text: number_format(variation.price) + ' تومان'
        });

        variationPriceDiv.append(spanSale);
        variationPriceDiv.append(spanPrice);
    } else {
        let spanPrice = $('<ins />', {
            class: 'new-price',
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
            var container = document.createElement('div'),
                btnAdd = document.createElement('div'),
                btnRem = document.createElement('div'),
                min = (settings.min) ? settings.min : input.attr('min'),
                max = (settings.max) ? settings.max : input.attr('max'),
                value = (settings.value) ? settings.value : parseFloat(input.val());
            container.className = 'numberstyle-qty';
            btnAdd.className = (max && value >= max) ? 'qty-btn qty-add disabled' : 'qty-btn qty-add';
            btnAdd.innerHTML = '+';
            btnRem.className = (min && value <= min) ? 'qty-btn qty-rem disabled' : 'qty-btn qty-rem';
            btnRem.innerHTML = '-';
            input.wrap(container);
            input.closest('.numberstyle-qty').prepend(btnRem).append(btnAdd);

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

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/number.css')}}" />

@endpush
