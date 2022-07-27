@extends('admin.layout.MasterAdmin')
@section('title','مشاهده سفارش')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>نمایش سفارش</h2>
                    <br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);"><a
                                    href={{route('admin.orders.index')}}>لیست سفارشات</a></li>
                        <li class="breadcrumb-item active">نمایش سفارش</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">

                <div class="form-group col-md-3">
                    <label>نام کاربر</label>
                    <input class="form-control" type="text"
                        value="{{ $order->user->name == null ? 'کاربر' : $order->user->name }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>کد کوپن</label>
                    <input class="form-control" type="text"
                        value="{{ $order->coupon_id == null ? 'استفاده نشده' : $order->coupon->name }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>وضعیت</label>
                    <input class="form-control" type="text" value="{{ $order->status }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>مبلغ</label>
                    <input class="form-control" type="text" value="{{ number_format($order->total_amount)}} تومان"
                        disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>هزینه ارسال</label>
                    <input class="form-control" type="text" value="{{ number_format($order->delivery_amount )}} تومان"
                        disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>مبلغ کد تخفیف</label>
                    <input class="form-control" type="text" value="{{ number_format($order->coupon_amount) }} تومان"
                        disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>مبلغ پرداختی</label>
                    <input class="form-control" type="text" value="{{ number_format($order->paying_amount) }} تومان"
                        disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>نوع پرداخت</label>
                    <input class="form-control" type="text" value="{{ $order->payment_type }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>وضعیت پرداخت</label>
                    <input class="form-control" type="text" value="{{ $order->payment_status }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>تاریخ ایجاد</label>
                    <input class="form-control" type="text" value="{{ verta($order->created_at) }}" disabled>
                </div>

                <div class="form-group col-md-12">
                    <label>آدرس ({{ $order->address->title}})</label>
                    <textarea class="form-control" rows="6" disabled>استان :{{ province_name($order->address->province_id) }} 
شهر : {{ city_name($order->address->city_id) }}
آدرس دقیق : {{ $order->address->address }}
کد پستی : {{ $order->address->postal_code }}
شماره تماس : {{ $order->address->cellphone }}
                        </textarea>
                </div>

                <div class="col-md-12">
                    <hr>
                    <h5>محصولات</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th> تصویر محصول </th>
                                    <th> نام محصول </th>
                                    <th> فی </th>
                                    <th> تعداد </th>
                                    <th> قیمت کل </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="{{ route('admin.products.show', ['product' => $item->product->id]) }}">
                                            <img width="70"
                                                src="{{ asset(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH') . $item->product->primary_image) }}"
                                                alt="">
                                        </a>
                                    </td>
                                    <td class="product-name"><a
                                            href="{{ route('admin.products.show', ['product' => $item->product->id]) }}">
                                            {{ $item->product->name }}
                                            @php
                                            $varition=\App\Models\ProductVariation::find($item->product_variation_id)->value;
                                            @endphp
                                            </br>
                                            </br>
                                            ({{$varition}})

                                        </a></td>
                                    <td class="product-price-cart"><span class="amount">
                                            {{ number_format($item->price) }}
                                            تومان
                                        </span></td>
                                    <td class="product-quantity">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="product-subtotal">
                                        {{ number_format($item->subtotal) }}
                                        تومان
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>





            </div>
        </div>

</section>
@endsection