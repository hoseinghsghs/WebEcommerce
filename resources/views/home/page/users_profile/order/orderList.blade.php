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
                        <div class="col-lg-9 col-12 pl">
                            <div class="profile-content">
                                <h5 class="text-secondary">لیست سفارشات</h5>
                                <div class="profile-stats">
                                    <div class="table-orders pb-2">
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
                                            <table class="table table-profile-orders table-responsive-md table-hover">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th scope="col"> شماره <span
                                                            class="d-none d-sm-inline-block">سفارش</span></th>
                                                    <th scope="col"> تاریخ <span class="d-none d-sm-inline-block">ثبت سفارش</span>
                                                    </th>
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
                                                            class="{{$order->status == 'پرداخت نشده' ? 'text-warning' : 'text-success'}}">
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

                                    </div>
                                </div>
                            </div>
                            <div class="pagination-product">
                                {{$orders->onEachSide(1)->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
