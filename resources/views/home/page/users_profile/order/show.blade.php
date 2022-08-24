@extends('home.layout.MasterHome')
@section('title', "سفارشات")
@section('content')
<main class="main order">
    <!-- Start of Breadcrumb -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">حساب کاربری من </h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li><a href="{{route('home.user_profile')}}">حساب کاربری من </a></li>
                <li>سفارش {{$order->id}}</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content mb-10 pb-2">
        <div class="container">



            <div class="order-details-wrapper mb-5 mt-5">
                <h4 class="title text-uppercase ls-25 mb-5">جزئیات سفارش </h4>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th class="text-dark">محصول </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($order->orderItems as $item)
                        <tr>
                            <td>
                                <a
                                    href="{{route('home.products.show' , ['product' => $item->product->slug])}}">{{$item->product->name}}</a>
                                <p>
                                    <strong>
                                        {{$item->quantity}} عدد
                                        * {{number_format($item->price)}} تومان
                                    </strong>

                                    &nbsp;
                                    <br>
                                </p>


                            </td>
                            <td>{{number_format($item->subtotal)}} تومان</td>
                        </tr>
                        @endforeach


                    </tbody>

                    <tfoot>
                        <tr>
                            <th>جمع: </th>
                            <td>{{number_format($order->total_amount)}} تومان</td>
                        </tr>

                        <tr>
                            <th>حمل و نقل :</th>
                            <td>
                                {{number_format($order->delivery_amount )}} تومان </td>
                        </tr>

                        <tr>
                            <th>کد تخفیف :</th>
                            <td>
                                {{number_format($order->coupon_amount )}} تومان </td>
                        </tr>

                        <tr>
                            <th>روش پرداختی:</th>
                            <td>{{$order->payment_type}}</td>
                        </tr>
                        <tr class="total">
                            <th class="border-no">مبلغ پرداختی :</th>
                            <td class="border-no">{{number_format($order->paying_amount )}} تومان</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- End of Order Details -->


            <!-- End of Sub Orders-->

            <div class="col-sm-12 mb-12"
                style="margin-bottom: 1rem; border: 2px solid #e1e1e1; border-radius: 1px;padding:8px">
                <div class="ecommerce-address billing-address pr-lg-8">
                    <h4 class="title title-underline ls-25 font-weight-bold">آدرس ارسال محصول </h4>
                    <address class="mb-4">
                        <table class="address-table">
                            <tbody>
                                <tr>
                                    <th>نام :</th>
                                    </td>
                                </tr>
                                <tr>
                                    <th>عنوان آدرس :</th>
                                    <td> {{ $order->address->title }}</td>
                                </tr>
                                <tr>
                                    <th>آدرس:</th>
                                    <td> {{ $order->address->address }}</td>
                                </tr>
                                <tr>
                                    <th>استان : </th>
                                    <td>{{ province_name($order->address->province_id) }}</td>
                                </tr>
                                <tr>
                                    <th>شهر :</th>
                                    <td>{{ city_name($order->address->city_id) }}</td>
                                </tr>
                                <tr>
                                    <th>کد پستی:</th>
                                    <td>{{ $order->address->postal_code }}</td>
                                </tr>
                                <tr>
                                    <th>تلفن:</th>
                                    <td>{{ $order->address->cellphone }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </address>
                </div>
            </div>
            <!-- End of Account Address -->

            <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i
                    class="w-icon-long-arrow-left"></i>برگشت به لیست</a>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection