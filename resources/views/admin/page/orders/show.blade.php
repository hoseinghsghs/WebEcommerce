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
            <a class="btn btn-warning  mb-4" style="color:white" onclick="printDiv()">چاپ سفارش</a>

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
<!-- فاکتور -->
<div class="container-xl mt-4" style="margin-top: 100px; display:none ">
    <div class="row mt-4">
        <div class="col-3 text-center"><img src="{{asset('storage/logo/'.$setting->logo)}}" alt="logo" /></div>
        <div class="col-6 text-center">
            <h5 class="font-weight-bold">صورتحساب فروش </h5>
        </div>
        <div class="col-3 text-right">
            <h6>شماره سفارش: {{$order->id}}</h6>
            <h6>تاریخ سفارش: {{Hekmatinasser\Verta\Verta::instance($order->created_at)->format('Y/n/j')}}</h6>
        </div>
    </div>
    <div class="row m-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="11">مشخصات فروشنده</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="11" class="text-right">
                        <div class="row">
                            <div class="col-4">
                                <p>نام شخص حقیق / حقوقی:{{env('APP_NAME')}}</p>
                                <p>آدرس کامل: {{ province_name($order->address->province_id) }}، شهر
                                    {{ city_name($order->address->city_id) }}، {{ $order->address->address }}</p>
                            </div>
                            <div class="col-4">
                                <p>شماره اقتصادی:</p>
                                <p>کد پستی:</p>
                            </div>
                            <div class="col-4">
                                <p>شماره ثبت / شناسه ملی:</p>
                                <p>تلفن / نمابر:</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th class="text-center" colspan="11">مشخصات خریدار</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="11" class="text-right">
                        <div class="row">
                            <div class="col-4">
                                <p>نام شخص حقیق / حقوقی: {{$order->address->name}}</p>
                                <p>آدرس کامل:{{ province_name($order->address->province_id) }}، شهر
                                    {{ city_name($order->address->city_id) }}، {{ $order->address->address }}</p>
                            </div>
                            <div class="col-4">
                                <p>کد پستی:{{ $order->address->postal_code }}</p>
                            </div>
                            <div class="col-4">
                                <p>تلفن / نمابر:{{ $order->address->cellphone }} , {{ $order->address->cellphone2 }}</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th class="text-center" colspan="11">مشخصات کالا یا خدمات مورد معامله</th>
                </tr>
            </thead>
            <thead>
                <tr class="text-center">
                    <th>ردیف</th>
                    <th>کد کالا</th>
                    <th>شرح کالا یا خدمات</th>
                    <th>تعداد / مقدار</th>
                    <th>واحد انداز گیری</th>
                    <th>مبلغ واحد (ریال)</th>
                    <th>مبلغ کل (ریال)</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                @php
                $sku=App\Models\ProductVariation::find($item->product_variation_id);
                @endphp
                <tr class="text-center">
                    <td>۱</td>
                    <td>{{$sku->sku}}</td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>عدد</td>
                    <td class="text-center">{{number_format($item->price)}}</td>
                    <td class="text-center">{{number_format($item->subtotal)}}</td>

                </tr>
                @endforeach

                <tr>
                    <th colspan="6" class="text-center">جمع کل</th>

                    <th class="text-center" colspan="2">{{number_format($order->total_amount)}}</th>

                </tr>
                <tr>
                    <th colspan="6" class="text-center">هزینه ارسال</th>

                    <th class="text-center" colspan="2">{{number_format($order->delivery_amount )}}</th>

                </tr>
                <tr>
                    <th colspan="6" class="text-center">کد تخفیف</th>

                    <th class="text-center" colspan="2">{{number_format($order->coupon_amount )}}</th>

                </tr>
                <tr>
                    <th colspan="6" class="text-center">مبلغ قابل پرداخت</th>

                    <th class="text-center" colspan="2">{{number_format($order->paying_amount )}}</th>

                </tr>
                <tr>
                    <th colspan="5" class="text-right">شرایط و نحوه فروش: {{$order->payment_type}} </th>
                    <th colspan="6" class="text-right">توضیحات: {{$order->description}} </th>
                </tr>
                <tr style="padding: 60px 0;">
                    <td colspan="5" class="text-right">مهر و امضا فروشنده</td>
                    <td colspan="6" class="text-right">مهر و امضا خریدار</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
function printDiv() {

    var divContents = $(".container-xl").html();
    let url = window.location.origin + "/css/home.css";
    var a = window.open('', '', 'height=768px, width=1366px');
    a.document.write('<html><body style="background-color: white !important">');
    a.document.write('<head><title></title>');
    a.document.write('<link rel="stylesheet" href="' + url + '" type="text/css" />');
    a.document.write('</head>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.focus();
    setTimeout(function() {
        a.print();
    }, 1000);


    return true;

}
</script>
@endpush

@endsection