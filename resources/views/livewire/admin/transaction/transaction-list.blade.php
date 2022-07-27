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
                                        <input type="text" class="form-control" wire:model="amount"
                                            placeholder="مبلغ پرداختی">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" wire:model="ref_id"
                                            placeholder="شماره پیگیری">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select data-placeholder="وضعیت" class="form-control ms"
                                            wire:model.deferred="status" class="form-control ms select2">
                                            <option value="">وضعیت پرداخت</option>
                                            <option value="1">پرداخت موفق</option>
                                            <option value="0">پرداخت ناموفق</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="header">
                    <h2><strong>کل تراکنش ها </strong>( {{$transactions->total()}} )</h2>
                </div>
                <div class="body">
                    <div class="loader" wire:loading.flex>
                        درحال بارگذاری ...
                    </div>
                    @if(count($transactions)===0)
                    <p>هیچ رکوردی وجود ندارد</p>
                    @else
                    <div wire:loading.remove class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کاربر</th>
                                    <th>شماره سفارش</th>
                                    <th>مبلغ پرداختی </th>
                                    <th> پرداخت وضعیت</th>
                                    <th>شناسه تراکنش</th>
                                    <th>تاریخ</th>
                                    <th>درگاه پرداخت</th>
                                    <th class="text-center">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $key => $transaction)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td>{{$transaction->user->name}}</td>
                                    <td>{{$transaction->order_id}}</td>
                                    <td>{{number_format($transaction->amount)}} تومان</td>
                                    <td>
                                        @if ($transaction->status =="ناموفق")
                                        <span class="badge badge-danger p-2">پرداخت
                                            {{$transaction->status}}</span>
                                        @elseif ($transaction->status =="موفق")
                                        <span class="badge badge-success p-2">پرداخت
                                            {{$transaction->status}}</span>
                                        @endif
                                    </td>
                                    <td>{{$transaction->ref_id}}</td>

                                    <td>{{Hekmatinasser\Verta\Verta::instance($transaction->created_at)->format('Y/n/j')}}
                                    </td>
                                    <td>{{$transaction->gateway_name}}</td>

                                    <td class="text-center js-sweetalert">
                                        <a onclick="loadbtn(event)"
                                            href="{{route('admin.transactions.edit',$transaction->id)}}"
                                            class="btn btn-raised btn-warning waves-effect">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
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
                {{$transactions->links()}}
            </div>
        </div>
    </div>
</div>