<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    @if(count($coupons)===0)
                    <p>هیچ رکوردی وجود ندارد</p>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>کد</th>
                                    <th>تاریخ پایان</th>
                                    <th>وضعیت</th>
                                    <th>
                                        <center>
                                            عملیات
                                        </center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                <tr wire:key="name_{{ $coupon->id }}">
                                    <td scope=" row">{{$coupon->id}}</td>
                                    <td>{{$coupon->name}}
                                    </td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{Hekmatinasser\Verta\Verta::instance($coupon->expired_at)->format('Y/n/j')}}
                                    </td>
                                    <td>
                                        @if ($coupon->is_active==0)
                                        @php
                                        $color="danger";
                                        $title="عدم انتشار";
                                        @endphp
                                        @else
                                        @php
                                        $color="success";
                                        $title="انتشار";
                                        @endphp
                                        @endif
                                        <div class="row clearfix">
                                            <div class="col-12">
                                                <a wire:click="ChengeActive_coupon({{$coupon->id}})"
                                                    wire:loading.attr="disabled"
                                                    class="btn btn-raised btn-{{$color}} waves-effect"><span
                                                        style="color:white;">{{$title}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center js-sweetalert">
                                        <center>
                                            <a href="{{route('admin.coupons.edit',$coupon->id)}}"
                                                wire:loading.attr="disabled"
                                                class="btn btn-raised btn-info waves-effect">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <button class="btn btn-raised btn-danger waves-effect"
                                                wire:loading.attr="disabled" wire:click="delcoupon({{$coupon->id}})">
                                                <i class="zmdi zmdi-delete"></i>
                                                <span class="spinner-border spinner-border-sm text-light" wire:loading
                                                    wire:target="delcoupon({{$coupon->id}})"></span>
                                            </button>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $coupons->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
