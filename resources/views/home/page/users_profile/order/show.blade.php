@extends('home.layout.MasterHome')
@section('title', "سفارشات")
@section('content')
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    @include('home.page.users_profile.partial.right_side')

                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <a class="btn btn-primary m-3" style="color:white" onclick="printDiv()">چاپ سفارش</a>

                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="table-order-view row">

                                    @if (URL::previous() != route('home.user_profile.ordersList'))
                                    <div class="p-5">
                                        @if ($order->status == "آماده برای ارسال")
                                        <p class="p-3 mb-2 bg-success text-white">
                                            پرداخت با موفقیت انجام شد. سفارش شما با موفقیت ثبت شد و در زمان تعیین شده
                                            برای
                                            شما
                                            ارسال خواهد شد. از اینکه {{env('APP_NAME')}} را برای خرید انتخاب کردید از
                                            شما
                                            سپاسگزاریم.</p>
                                        @endif
                                        @if ($order->status == "در انتظار پرداخت")
                                        <p class="p-3 mb-2 bg-danger text-white">
                                            سفارش دریافت نشد
                                            پرداخت ناموفق. برای جلوگیری از لغو سیستمی سفارش،تا 24 ساعت آینده
                                            پرداخت را انجام دهید. چنانچه طی این فرایند مبلغی از حساب شما کسر شده است،طی
                                            72 ساعت آینده به حساب شما باز خواهد گشت.
                                            </br>
                                            کد سفارش برای پیگیری : {{$order->id}}
                                        </p>
                                        @endif
                                    </div>
                                    @endif
                                    <div class="col-lg-6 col-12 mt-3 ">
                                        <div class="box-header">
                                            <span class="box-title">جزئیات سفارش محصول</span>
                                        </div>
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">کد سفارش</th>
                                                    <th scope="col">{{$order->id}}</th>
                                                </tr>

                                                <tr>
                                                    <th scope="col">نام محصول</th>
                                                    <th scope="col">مجموع</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->orderItems as $item)
                                                <tr>
                                                    <td class="product-name">
                                                        <a
                                                            href="{{route('home.products.show' , ['product' => $item->product->slug])}}">
                                                            ({{$item->product->name}})
                                                            {{$item->quantity}} عدد
                                                            * {{number_format($item->price)}} تومان
                                                        </a>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">
                                                            <span>تومان</span>
                                                            {{number_format($item->subtotal)}}
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="row">مجموع:</th>
                                                    <td>
                                                        <span class="amount">

                                                            {{number_format($order->total_amount)}}
                                                            <span>تومان</span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">حمل و نقل:</th>
                                                    <td>{{number_format($order->delivery_amount )}}
                                                        <span>تومان</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">کد تخفیف:</th>
                                                    <td>{{number_format($order->coupon_amount )}}
                                                        <span>تومان</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">روش پرداخت:</th>
                                                    <td>{{$order->payment_type}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">قیمت نهایی:</th>
                                                    <td>
                                                        <span class="amount">

                                                            {{number_format($order->paying_amount )}}
                                                            <span>تومان</span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-6 col-12 mt-3 ">
                                        <div class="box-header">
                                            <span class="box-title">آدرس ارسال محصول</span>
                                        </div>
                                        <table class="table table-borderless">

                                            <tfoot>
                                                <tr>
                                                    <th scope="row">عنوان:</th>
                                                    <td>
                                                        <span class="amount">

                                                            {{ $order->address->title }}
                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">نام تحویل گیرنده:</th>
                                                    <td>
                                                        <span class="amount">

                                                            {{ $order->address->name }}
                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">
                                                        روش پرداخت:
                                                    </th>
                                                    <td>{{$order->payment_type}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">استان:</th>
                                                    <td>
                                                        <span class="amount">
                                                            {{ province_name($order->address->province_id) }}

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">شهر: </th>
                                                    <td>
                                                        <span class="amount">
                                                            {{ city_name($order->address->city_id) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">استان:</th>
                                                    <td>
                                                        <span class="amount">
                                                            {{ province_name($order->address->province_id) }}

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> شماره 1: </th>
                                                    <td>
                                                        <span class="amount">
                                                            {{ $order->address->cellphone }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> شماره 2: </th>
                                                    <td>
                                                        <span class="amount">
                                                            {{ $order->address->cellphone2 }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> کد پستی: </th>
                                                    <td>
                                                        <span class="amount">
                                                            {{ $order->address->postal_code }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12 col-12 mt-3 ">
                                        <div class="box-header">
                                            <span class="box-title">آدرس اول</span>
                                        </div>

                                        <tr>

                                            <td>{{ $order->address->address }}
                                            </td>

                                        </tr>

                                    </div>

                                    <div class="col-lg-12 col-12 mt-3 mb-4">
                                        <div class="box-header">
                                            <span class="box-title">آدرس جایگزین</span>
                                        </div>

                                        <tr>

                                            <td>
                                                {{ $order->address->lastaddress }}
                                            </td>

                                        </tr>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@push('scripts')
<script>
function printDiv() {

    var divContents = $(".profile-content").html();
    let url = window.location.origin + "/css/home.css";
    var a = window.open('', '', 'height=768px, width=1366px');
    a.document.write('<html>');
    a.document.write('<head><title></title>');
    a.document.write('<link rel="stylesheet" href="' + url + '" type="text/css" />');
    a.document.write('</head>');
    a.document.write('<body > <h1>پرینت سفارش<br>');
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