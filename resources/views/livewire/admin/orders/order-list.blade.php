<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <form wire:submit.prevent="$refresh">
                    <div class="header">
                        <h2>
                            جست و جو
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" wire:model="name"
                                            placeholder="نام و نام خانوادگی">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" wire:model="paying_amount"
                                            placeholder="مبلغ پرداختی">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select data-placeholder="وضعیت" class="form-control ms"
                                            wire:model.deferred="payment_status" class="form-control ms select2">
                                            <option value="">وضعیت سفارش</option>
                                            <option value="0">در
                                                انتظار پرداخت
                                            </option>
                                            <option value="1">آماده برای ارسال</option>
                                            <option value="2">محصول ارسال شد</option>
                                            <option value="3">مرجوعی</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select data-placeholder="وضعیت" class="form-control ms"
                                            wire:model.deferred="status" class="form-control ms select2">
                                            <option value="">وضعیت پرداخت</option>
                                            <option value="0">پرداخت ناموفق</option>
                                            <option value="1">پرداخت موفق</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="header">
                    <h2><strong>کل سفارشات </strong>( {{$orders->total()}} )</h2>
                </div>

                <div class="body">
                    <div class="loader" wire:loading.flex>
                        درحال بارگذاری ...
                    </div>

                    @if(count($orders)===0)
                    <p>هیچ رکوردی وجود ندارد</p>
                    @else
                    <div wire:loading.remove class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کاربر</th>
                                    <th>مبلغ پرداختی</th>
                                    <th>وضعیت پرداهت</th>
                                    <th>وضعیت سفارش</th>
                                    <th>تاریخ</th>
                                    <th class="text-center">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{number_format($order->paying_amount)}} تومان</td>
                                    <td>
                                        @if ($order->payment_status =="ناموفق")
                                        <span class="badge badge-danger p-2">پرداخت
                                            {{$order->payment_status}}</span>
                                        @elseif ($order->payment_status =="موفق")
                                        <span class="badge badge-success p-2">پرداخت
                                            {{$order->payment_status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->status =="در انتظار پرداخت")
                                        <span class="badge badge-warning p-2">
                                            {{$order->status}}</span>
                                        @elseif ($order->status =="آماده برای ارسال")
                                        <span class="badge badge-info p-2">
                                            {{$order->status}}</span>
                                        @elseif ($order->status =="محصول ارسال شد")
                                        <span class="badge badge-success p-2">
                                            {{$order->status}}</span>
                                        @elseif ($order->status =="مرجوعی")
                                        <span class="badge badge-danger p-2">
                                            {{$order->status}}</span>
                                        @endif
                                    </td>
                                    <td>{{Hekmatinasser\Verta\Verta::instance($order->created_at)->format('Y/n/j')}}
                                    </td>

                                    <td class="text-center js-sweetalert">
                                        <a onclick="loadbtn(event)" href="{{route('admin.orders.edit',$order->id)}}"
                                            class="btn btn-raised btn-warning waves-effect">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a onclick="loadbtn(event)" href="{{route('admin.orders.show',$order->id)}}"
                                            class="btn btn-raised btn-info waves-effect">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                        <!-- <button class="btn btn-raised btn-danger waves-effect"
                                                    data-type="confirm" data-form-id="del-order-{{$order->id}}"><i
                                                        class="zmdi zmdi-delete"></i></button>
                                                <form action="{{route('admin.orders.destroy',$order->id)}}"
                                                    id="del-order-{{$order->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form> -->
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                {{$orders->links()}}
            </div>
        </div>
    </div>
</div>