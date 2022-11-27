@extends('admin.layout.MasterAdmin')
@section('title','ویرایش سفارش')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش سفارش</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i
                                    class="zmdi zmdi-home"></i>خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.orders.index')}}">لیست سفارشات</a></li>
                        <li class="breadcrumb-item active">ویرایش سفارش</li>
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

            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form id="form_advanced_validation" class="needs-validation"
                                action="{{route('admin.orders.update',$order->id)}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group form-float">
                                    <label for="status_id">وضعیت *</label>
                                    <select id="statusSelect" name="status" data-placeholder=""
                                        class="form-control ms select2">
                                        <option></option>
                                        <option value="0" {{$order->status == 'پرداخت نشده' ? 'selected' : ''}}>پرداخت نشده</option>
                                        <option value="1" {{$order->status == 'آماده برای ارسال' ? 'selected' : ''}}>
                                            آماده
                                            برای ارسال</option>
                                        <option value="2" {{$order->status == 'محصول ارسال شد' ? 'selected' : ''}}>محصول
                                            ارسال شد
                                        </option>
                                        <option value="3" {{$order->status == 'مرجوعی' ? 'selected' : ''}}>مرجوعی
                                        </option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger m-0">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">توضیحات</label>
                                        <textarea name="description" id="description" cols="30" rows="8"
                                            class="form-control">{{old('description')?? $order->description}}</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-raised btn-primary waves-effect"
                                    onclick="loadbtn(event)">
                                    بروزرسانی
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- #END# Hover Rows -->
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
$('#amount').on('keyup keypress focus change', function(e) {
    Number = $(this).val()
    Number += '';
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    x = Number.split('.');
    y = x[0];
    z = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y = y.replace(rgx, '$1' + ',' + '$2');
    output = y + z;
    if (output != "") {
        document.getElementById("amount_1").innerHTML = output + 'تومان';
    } else {
        document.getElementById("amount_1").innerHTML = '';
    }
});
</script>
</script>

@endpush
@endsection