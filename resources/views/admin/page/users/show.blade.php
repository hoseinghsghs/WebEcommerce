@extends('admin.layout.MasterAdmin')
@section('title','مشاهده کاربر')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>نمایش کاربر</h2>
                    <br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);"><a href={{route('admin.users.index')}}>لیست کاربران</a></li>
                        <li class="breadcrumb-item active">نمایش کاربر</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>مشخصات </strong>کاربر</h2>
                        </div>
                        <div class="body row">
                            <div class="col-sm-4">
                                <div class="blogitem">
                                    <div class="blogitem-image">
                                        <a class="text-center" href="{{$user->avatar ? asset('storage/profile/'.$user->avatar) : asset('img/profile.png') }}" target="_blank">
                                            <img class="img-fluid img-thumbnail w200" src="{{$user->avatar ? asset('storage/profile/'.$user->avatar) : asset('img/profile.png') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group col-sm-8">
                                <button type="button" class="list-group-item list-group-item-action">
                                    <div class="row clearfix">
                                        <div class="col-6"><strong>نام کاربر:</strong></div>
                                        <div class="col-6">{{$user->name}}</div>
                                    </div>
                                </button>
                                <button type="button" class="list-group-item list-group-item-action">
                                    <div class="row clearfix">
                                        <div class="col-6"><strong>ایمیل:</strong></div>
                                        <div class="col-6">{{$user->email}}</div>
                                    </div>
                                </button>
                                <button type="button" class="list-group-item list-group-item-action">
                                    <div class="row clearfix">
                                        <div class="col-6"><strong>موبایل:</strong></div>
                                        <div class="col-6">{{$user->cellphone}}</div>
                                    </div>
                                </button>

                                <button type="button" class="list-group-item list-group-item-action">
                                    <div class="row clearfix">
                                        <div class="col-6"><strong>تاریخ ایجاد حساب:</strong></div>
                                        <div class="col-6">{{verta($user->created_at)->format('H:i Y/n/j')}}</div>
                                    </div>
                                </button>
                                <button type="button" class="list-group-item list-group-item-action">
                                    <div class="row clearfix">
                                        <div class="col-6"><strong>تاریخ آخرین بروزرسانی:</strong></div>
                                        <div class="col-6">{{verta($user->updated_at)->format('H:i Y/n/j')}}</div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>لیست </strong>سفارشات</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover c_table theme-color">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>شماره سفارش</th>
                                        <th>تاریخ ثبت سفارش</th>
                                        <th>وضعیت</th>
                                        <th> مجموع<span>(تومان)</span></th>
                                        <th class="text-center">جزئیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $key => $order)
                                    <tr>
                                        <td scope="row">{{$orders->firstItem() + $key}}</td>
                                        <td>{{$order->id}}</td>
                                        <td>{{verta($order->created_at)->format('Y/n/j')}}</td>
                                        <td class="{{$order->status == 'پرداخت نشده' ? 'text-primary' : 'text-success'}}">
                                            {{$order->status}}
                                        </td>
                                        <td>{{number_format($order->paying_amount)}}</td>
                                        <td class="text-center js-sweetalert">
                                            <a onclick="loadbtn(event)" href="{{route('admin.orders.show',$order->id)}}" class="btn btn-raised btn-info waves-effect">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">
                                            <p class="text-center text-muted">هیچ رکوردی یافت نشد!</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $orders->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>لیست </strong>نظرات</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover c_table theme-color">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام محصول</th>
                                        <th>متن</th>
                                        <th>وضعیت</th>
                                        <th>تاریخ ثبت</th>
                                        <th class="text-center">جزئیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($comments as $key => $comment)
                                    <tr>
                                        <td scope="row">{{$comments->firstItem() + $key}}</td>
                                        <td>{{$comment->commentable->name}}</td>
                                        <td>
                                            <p class="text-overflow">{!!$comment->text!!}</p>
                                        </td>
                                        <td>
                                            @if ($comment->approved==1)
                                            <span class="badge badge-success">تایید شده</span>
                                            @else
                                            <span class="badge badge-warning">تایید نشده</span>
                                            @endif
                                        </td>
                                        <td>{{verta($comment->created_at)->format('Y/n/j')}}</td>
                                        <td class="text-center js-sweetalert">
                                            <a onclick="loadbtn(event)" href="{{route('admin.comments.edit',$comment->id)}}" class="btn btn-raised btn-info waves-effect">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">
                                            <p class="text-center text-muted">هیچ رکوردی یافت نشد!</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $comments->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
