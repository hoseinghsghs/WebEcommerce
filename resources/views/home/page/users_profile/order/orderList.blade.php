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
                                    <tbody>
                                        <tr>
                                            <center>
                                                <h4>لیست سفارشات خالی است</h4>
                                            </center>
                                        </tr>
                                    </tbody>
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
                                        </thead> @foreach ($orders as $order)
                                        <tbody>
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
                                        </tbody>
                                        @endforeach
                                    </table>
                                    @endif
                                    <div class="profile-orders">
                                        <div class="collapse">
                                            <div class="profile-orders-item">
                                                <div class="profile-orders-header">
                                                    <a href="profile-order-2.html"
                                                        class="profile-orders-header-details">
                                                        <div class="profile-orders-header-summary">
                                                            <div class="profile-orders-header-row">
                                                                <span
                                                                    class="profile-orders-header-id">DKC-79356178</span>
                                                                <span
                                                                    class="profile-orders-header-state text-success">پرداخت
                                                                    شده</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- <hr class="ui-separator"> -->
                                                    <div class="profile-orders-header-data">
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-label">تاریخ ثبت سفارش</div>
                                                            <div class="profile-info-value">سه شنبه 4 فروردین 99
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-label">مبلغ قابل پرداخت</div>
                                                            <div class="profile-info-value">0</div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-label">مبلغ کل</div>
                                                            <div class="profile-info-value">
                                                                <span class="amount">2,400,000
                                                                    <span>تومان</span>
                                                                </span>
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
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection