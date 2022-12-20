@extends('admin.layout.MasterAdmin')
@section('title','ویرایش تراکنش')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش تراکنش</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i
                                    class="zmdi zmdi-home"></i>خانه</a></li>
                        <li class="breadcrumb-item"><a href={{route('admin.transactions.index')}}>لیست تراکنش ها</a>
                        </li>
                        <li class="breadcrumb-item active">ویرایش تراکنش</li>
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
                                action="{{route('admin.transactions.update',$transaction->id)}}" method="POST">
                                @csrf
                                @method('PUT')

                                 @if($transaction->description_erorr)
                                  <div class="form-group form-float">
                                    <div class="form-line badge-danger p-2">
                                        کد خطا :
                                      {{$transaction->description_erorr}}
                                    </div>
                                  </div>
                                @endif
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">قیمت پرداختی</label>
                                        <input type="text" name="amount" class="form-control" id="amount" minlength="3"
                                            required value="{{old('amount')?? $transaction->amount }}">
                                        <span id="amount_1"></span>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">شماره تراکنش</label>
                                        <input type="text" name="ref_id" class="form-control" minlength="3" required
                                            value="{{old('ref_id')?? $transaction->ref_id }}">
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label for="gateway_name_id">درگاه *</label>
                                    <select id="gateway_nameSelect" name="gateway_name" data-placeholder="انتخاب محل"
                                        class="form-control ms select2">
                                        <option></option>
                                        <option {{$transaction->gateway_name == 'zarinpal' ? 'selected' : ''}}>zarinpal
                                        </option>
                                        <option {{$transaction->gateway_name == 'pay' ? 'selected' : ''}}>pay</option>
                                        <option {{$transaction->gateway_name == 'mellat' ? 'selected' : ''}}>mellat</option>
                                        <option {{$transaction->gateway_name == 'پرداخت دستی' ? 'selected' : ''}}>پرداخت
                                            دستی
                                        </option>
                                        <option {{$transaction->gateway_name == 'سایر' ? 'selected' : ''}}>سایر
                                        </option>
                                    </select>
                                    @error('gateway_name')
                                    <span class="text-danger m-0">{{$message}}</span>
                                    @enderror
                                </div>

                               
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="checkbox">
                                            <input id="chec" type="checkbox"
                                                {{ $transaction->status== 'موفق' ? 'checked' : '' }} name="status" />
                                            <label for="chec">انتشار </label>
                                        </div>
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