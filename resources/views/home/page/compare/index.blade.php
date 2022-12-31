@extends('home.layout.MasterHome')
@section('title', "خانه - مقایسه")
@section('content')
<!-- product-comparison-------------------->
<main class="main-row ">
    <div class="container-main">
        <div class="col-12">
            <div id="breadcrumb">
                <i class="mdi mdi-home"></i>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{route('home.user_profile')}}">پروفایل</a></li>
                        <li class="breadcrumb-item active open" aria-current="page">لیست مقایسه</li>
                    </ol>
                </nav>
            </div>
            <div class="comparison m-0">
                <table class="table mt-5 mb-5">
                    <thead>
                        <tr>
                            <td class="align-middle">
                                <div class="form-ui px-0">
                                    <center>
                                        <h6>تصویر و نام محصول</h6>
                                    </center>
                                </div>
                                <div class="form-auth-row pr">
                                </div>
                            </td>
                            @foreach ($products as $product)
                            <td>
                                <div class="comparison-item">
                                    <span class="remove-item">
                                        <a href="{{route('home.compare.remove' , ['product' => $product->id])}}">
                                            <i class="mdi mdi-close"></i>
                                        </a>
                                    </span>
                                    <a class="comparison-item-thumb"
                                        href="{{route('home.products.show' , ['product' => $product->slug])}}">
                                        <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)}}"
                                            alt="{{$product->title}}">
                                    </a>
                                    <a class="comparison-item-title"
                                        href="{{route('home.products.show' , ['product' => $product->slug])}}">
                                        {{$product->name}}</a>
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <!-- رتبه بندی -->
                        <tr>
                            <th>
                                <center>
                                    رتبه بندی ها و نظرات
                                </center>
                                @foreach ($products as $product)
                            <td>
                                <center>
                                    <span data-rating-stars="5" data-rating-readonly="true"
                                        data-rating-value="{{ceil($product->rates->avg('rate'))}}">
                                    </span>
                                </center>
                            </td>
                            @endforeach
                        </tr>
                        <!-- دسته بندی -->
                        <tr>
                            <th>
                                <center>
                                    دسته بندی
                                </center>
                                @foreach ($products as $product)
                            <td>
                                <center>
                                    <div class="compare-col compare-value">
                                        {{$product->category->parent->name}} - {{$product->category->name}}
                                    </div>
                                </center>
                            </td>
                            @endforeach
                        </tr>
                        <!-- قیمت محصول -->
                        <tr>
                            <th>
                                <center>
                                    قیمت محصول
                                </center>
                                @foreach ($products as $product)
                            <td>
                                <center>
                                    @if ($product->quantity_check)
                                    @if ($product->sale_check)
                                    <div class="compare-col compare-value">
                                        <div class="product-price">
                                            <span class="new-price">{{number_format($product->sale_check->sale_price)}}
                                                تومان</span></br>
                                            <del>
                                                <span class="old-price">{{number_format($product->sale_check->price)}}
                                                    تومان</span>
                                            </del>
                                        </div>
                                    </div>
                                    @else
                                    <div class="compare-col compare-value">
                                        <div class="product-price">
                                            <span class="new-price">{{number_format($product->price_check->price)}}
                                                تومان</span>
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
                                </center>
                            </td>
                            @endforeach
                        </tr>
                        <!-- توضیح محصول -->
                        <tr>
                            <th>
                                <center>
                                    توضیحات
                                </center>
                                @foreach ($products as $product)
                            <td>
                                <center>
                                    {!!$product->description!!}
                                </center>
                            </td>
                            @endforeach
                        </tr>
                        <!-- ویژگی ها -->
                        <tr>
                            <th>
                                <center>
                                    ویژگی متغییر
                                </center>
                            </th>
                            @foreach ($products as $product)
                            <td>
                                <center>
                                    {{App\Models\Attribute::find($product->variations->first()->attribute_id)->name}}:
                                    @foreach($product->variations()->where('quantity', '>' , 0)->get() as $variation )
                                    {{$variation->value}} @endforeach
                                </center>
                            </td>
                            @endforeach
                        </tr>
                        <!-- ویژگی اصلی -->
                        @foreach($product->attributes()->with('attribute')->get() as $attribute )
                        <tr>
                            <th>
                                <center>
                                    {{$attribute->attribute->name}}
                                </center>
                            </th>
                            @foreach ($products as $product)
                            <td>
                                <center>
                                    @foreach ( $product->attributes as $pattributes)
                                    @if ($pattributes->attribute_id == $attribute->attribute_id)
                                    {{ $pattributes->value}}
                                    @else @endif @endforeach
                                </center>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- product-comparison-------------------->
@endsection