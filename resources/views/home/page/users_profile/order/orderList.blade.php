@extends('home.layout.MasterHome')
@section('title' , 'پروفایل کاربری')
@section('content')
<!-- profile------------------------------->
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    @include('home.page.users_profile.partial.right_side')
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="table-orders">
                                    @if ($orders->isEmpty())
                                    <div class="cart-empty text-center d-block p-5">
                                        <p class="cart-empty-title">لیست سفارشات خالی است</p>
                                        <div class="return-to-shop">
                                            <a href="{{route('home')}}" class="backward btn btn-warning">بازگشت
                                                به
                                                خانه</a>
                                        </div>
                                    </div>
                                    @else
                                    <table class="table table-profile-orders">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">شماره سفارش</th>
                                                <th scope="col">تاریخ ثبت سفارش</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">مجموع</th>
                                                <th scope="col">جزئیات</th>
                                            </tr>
                                            <tr style="border-top:solid 1px #dddddd;"></tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($orders as $order)

                                            <tr>
                                                <td class="order-code">{{$order->id}}</td>
                                                <td> {{Hekmatinasser\Verta\Verta::instance($order->created_at)->format('Y/n/j')}}
                                                </td>
                                                <td
                                                    class="{{$order->status == 'در انتظار پرداخت' ? 'text-primary' : 'text-success'}}">
                                                    {{$order->status}}
                                                </td>
                                                <td class="totla">
                                                    <span class="amount">{{number_format($order->paying_amount)}}
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                                <td class="detail"><a
                                                        href="{{route('home.user_profile.orders',['order' => $order->id])}}"
                                                        class="btn btn-secondary d-block">نمایش</a></td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                    <div class="profile-orders">
                                        <div class="collapse">
                                            @foreach ($orders as $order)
                                            <div class="profile-orders-item">
                                                <div class="profile-orders-header">
                                                    <!-- <hr class="ui-separator"> -->
                                                    <div class="profile-orders-header-data">
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-label">شماره سفارش</div>
                                                                    <div class="profile-info-value">{{$order->id}}</div>
                                                                </div>
                                                                <div class="profile-info-label">وضعیت</div>
                                                                <div
                                                                    class="profile-info-value {{$order->status == 'در انتظار پرداخت' ? 'text-primary' : 'text-success'}}">
                                                                    {{$order->status}}
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-label">تاریخ ثبت سفارش</div>
                                                            <div class="profile-info-value">
                                                                {{Hekmatinasser\Verta\Verta::instance($order->created_at)->format('Y/n/j')}}
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-label">مبلغ کل</div>
                                                            <div class="profile-info-value">
                                                                <span
                                                                    class="amount">{{number_format($order->paying_amount)}}
                                                                    <span>تومان</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <a href="{{route('home.user_profile.orders',['order' => $order->id])}}"
                                                            class="profile-orders-header-details">
                                                            <div class="profile-orders-header-summary">
                                                                <div class="profile-orders-header-row">
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            </br>
                                            </hr>
                                            @endforeach
                                        </div>
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
@endsection