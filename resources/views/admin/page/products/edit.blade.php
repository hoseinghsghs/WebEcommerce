@extends('admin.layout.MasterAdmin')
@section('title','ویرایش محصول')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش محصول</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">محصولات</a></li>
                        <li class="breadcrumb-item active">ویرایش محصول</li>
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
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="row clearfix">
                            @error('variation_values.*')
                            <div class="col-sm-4">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @enderror
                            @error('attribute_values.*')
                            <div class="col-sm-4">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @enderror
                        </div>
                        <form id="form_advanced_validation" autocomplete="off"
                            action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="POST"
                            enctype="multipart/form-data">

                            @method('put')
                            @csrf

                            <div class="body">
                                <div class="header p-0">
                                    <h2><strong>اطلاعات اصلی محصول</strong></h2>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <label>نام محصول *</label>
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{$product->name}}" required
                                                class="form-control" value="{{ old('name') }}" />
                                            @error('name')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="position_id">محل قرار گیری *</label>
                                        <select id="positionSelect" name="position" data-placeholder="انتخاب محل"
                                            class="form-control ms select2">
                                            <option></option>
                                            <option {{$product->position == 'تخفیف روزانه' ? 'selected' : ''}}>تخفیف
                                                روزانه</option>
                                            <option {{$product->position == 'فروش ویژه' ? 'selected' : ''}}>فروش
                                                ویژه</option>
                                            <option {{$product->position == 'پیشنهاد ما' ? 'selected' : ''}}>پیشنهاد
                                                ما</option>
                                            <option {{$product->position == 'تک محصول' ? 'selected' : ''}}>تک محصول
                                            </option>
                                        </select>
                                        @error('position')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="brand_id">برند</label>
                                        <select id="brandSelect" name="brand_id" data-placeholder="انتخاب برند" required
                                            class="form-control ms select2">
                                            <option></option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{$brand->id == $product->brand->id ? 'selected' : ''}}>
                                                {{ $brand->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="form-group col-md-3">
                                        <label for="is_active">وضعیت</label>
                                        <select id="is_active" name="is_active" required
                                            class="form-control ms select2">
                                            <option value="1" {{$product->is_active == 1 ? 'selected' : ''}}>فعال
                                            </option>
                                            <option value="0" {{$product->is_active == 0 ? 'selected' : ''}}>غیرفعال
                                            </option>
                                        </select>
                                        @error('is_active')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="tag_ids">تگ ها</label>
                                        <select id="tagSelect" name="tag_ids[]" data-placeholder="انتخاب تگ"
                                            data-close-on-select="false" class="form-control ms select2" required
                                            multiple>
                                            @php
                                            $productTagIds = $product->tags()->pluck('id')->toArray()
                                            @endphp
                                            @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ in_array($tag->id, $productTagIds) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('tag_ids')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="form-group col-md-12">
                                        <label for="description">توضیحات</label>
                                        <textarea class="form-control" id="description" rows="6" required
                                            name="description">{{ $product->description }}</textarea>
                                        @error('description')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="header p-0 mt-3">
                                    <h2><strong>ویژگی ها </strong></h2>
                                </div>
                                <hr>
                                <!-- ویژگی های ثابت -->
                                <div class="row clearfix">
                                    @foreach ($product_attributes as $productAttribute)
                                    <div class="form-group col-md-4">
                                        <label>{{ $productAttribute->attribute->name }}</label>
                                        <input class="form-control" type="text" required
                                            name="attribute_values[{{ $productAttribute->id }}]"
                                            value="{{ $productAttribute->value }}">
                                        @error('attribute_values.{{$productAttribute->id}}')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>
                                    @endforeach

                                </div>
                                <!-- ویژگی های ثابت -->

                                <!-- ویژگی های متغییر -->
                                @foreach ($product_variation as $variation)
                                <div class="col-md-12">
                                    <hr>
                                    <div class="d-flex">

                                        <p class="mb-0 mr-3">
                                            <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse"
                                                data-target="#collapse-{{ $variation->id }}">
                                                قیمت و موجودی برای متغیر ( {{ $variation->value }} )
                                            </button>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="collapse mt-2" id="collapse-{{ $variation->id }}">
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-4">
                                                    <label> قیمت </label>
                                                    <input type="text" class="form-control"
                                                        onkeyup="show_price_1(this.value,'{{ $variation->id }}')"
                                                        onfocus="show_price_1(this.value,'{{ $variation->id }}')"
                                                        name="variation_values[{{ $variation->id }}][price]"
                                                        value="{{ $variation->price }}" required>
                                                    <span id="price1[{{ $variation->id }}]" class="mt-2"></span>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> تعداد </label>
                                                    <input type="text" class="form-control"
                                                        name="variation_values[{{ $variation->id }}][quantity]"
                                                        value="{{ $variation->quantity }}" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> sku </label>
                                                    <input type="text" class="form-control"
                                                        name="variation_values[{{ $variation->id }}][sku]"
                                                        value="{{ $variation->sku }}" required>
                                                </div>

                                                {{-- Sale Section --}}
                                                <div class="col-md-12">
                                                    <p> حراج : </p>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> قیمت حراجی </label>
                                                    <input type="text"
                                                        name="variation_values[{{ $variation->id }}][sale_price]"
                                                        required onkeyup="show_price(this.value,'{{ $variation->id }}')"
                                                        onfocus="show_price(this.value,'{{ $variation->id }}')"
                                                        value="{{ $variation->sale_price }}" class="form-control">
                                                    <span id="price[{{ $variation->id }}]" class="mt-2"></span>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> تاریخ شروع حراجی </label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            id="variationInputDateOnSaleFrom-{{ $variation->id }}"
                                                            value="{{ $variation->date_on_sale_from == null ? null : $variation->date_on_sale_from }}">
                                                        <input type="hidden"
                                                            id="variationInputDateOnSaleFrom-alt-{{ $variation->id }}"
                                                            name="variation_values[{{ $variation->id }}][date_on_sale_from]"
                                                            value="{{ $variation->date_on_sale_from  ?? null }}">
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label> تاریخ پایان حراجی </label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            id="variationInputDateOnSaleTo-{{ $variation->id }}"
                                                            value="{{ $variation->date_on_sale_to == null ? null : $variation->date_on_sale_to }}">
                                                        <input type="hidden"
                                                            id="variationInputDateOnSaleTo-alt-{{ $variation->id }}"
                                                            name="variation_values[{{ $variation->id }}][date_on_sale_to]"
                                                            value="{{ $variation->date_on_sale_to ?? null }}">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- هزینه ارسال -->
                                <div class="header p-0 mt-5">
                                    <h2><strong>هزینه ارسال</strong></h2>
                                </div>
                                <hr>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <label for="delivery_amount">هزینه ارسال*</label>
                                        <div class="form-group">
                                            <input class="form-control @error('delivery_amount') is-invalid @enderror"
                                                onfocus="itpro_1(this.value);" id="delivery_amount"
                                                name="delivery_amount" type="text"
                                                value="{{ $product->delivery_amount}}">
                                            @error('delivery_amount')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <span id="delivery_1" class="m-1"></span>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="delivery_amount_per_product"> هزینه ارسال به ازای محصول
                                            اضافی*</label>

                                        <div class="form-group">
                                            <input wire:model="essage" class="form-control"
                                                id="delivery_amount_per_product" name="delivery_amount_per_product"
                                                required type="text"
                                                value="{{ $product->delivery_amount_per_product }}">
                                            @error('delivery_amount_per_product')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <span id="delivery_2"></span>
                                    </div>
                                </div>
                        </form>

                    </div>
                    <div class="form-group">
                        <button type="submit" form="form_advanced_validation"
                            class="btn btn-raised btn-success waves-effect">ویرایش</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- #END# Hover Rows -->
    </div>

</section>
@endsection

@push('styles')
<!-- تاریخ -->
<link rel="stylesheet" type="text/css"
    href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css" />
<!-- تاریخ پایان-->
@endpush

@push('scripts')
<script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
<script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
<script>
let variations = @json($product_variation);

variations.forEach(variation => {
    $(`#variationInputDateOnSaleFrom-${variation.id}`).pDatepicker({
        initialValueType: 'gregorian',
        format: 'LLLL',
        altField: `#variationInputDateOnSaleFrom-alt-${variation.id}`,
        altFormat: 'g',
        minDate: "new persianDate().unix()",
        timePicker: {
            enabled: true,
            second: {
                enabled: false
            },
        },
        altFieldFormatter: function(unixDate) {
            var self = this;
            var thisAltFormat = self.altFormat.toLowerCase();
            if (thisAltFormat === 'gregorian' || thisAltFormat === 'g') {
                persianDate.toLocale('en');
                var p = new persianDate(unixDate).toCalendar('gregorian').format(
                    'YYYY-MM-DD HH:mm:ss');;
                return p;
            }
            if (thisAltFormat === 'unix' || thisAltFormat === 'u') {
                return unixDate;
            } else {
                var pd = new persianDate(unixDate);
                pd.formatPersian = this.persianDigit;
                return pd.format(self.altFormat);
            }
        },
    });

    $(`#variationInputDateOnSaleTo-${variation.id}`).pDatepicker({
        initialValueType: 'gregorian',
        format: 'LLLL',
        altField: `#variationInputDateOnSaleTo-alt-${variation.id}`,
        altFormat: 'g',
        minDate: "new persianDate().unix()",
        timePicker: {
            enabled: true,
            second: {
                enabled: false
            },
        },
        altFieldFormatter: function(unixDate) {
            var self = this;
            var thisAltFormat = self.altFormat.toLowerCase();
            if (thisAltFormat === 'gregorian' || thisAltFormat === 'g') {
                persianDate.toLocale('en');
                var p = new persianDate(unixDate).toCalendar('gregorian').format(
                    'YYYY-MM-DD HH:mm:ss');;
                return p;
            }
            if (thisAltFormat === 'unix' || thisAltFormat === 'u') {
                return unixDate;
            } else {
                var pd = new persianDate(unixDate);
                pd.formatPersian = this.persianDigit;
                return pd.format(self.altFormat);
            }
        },
    });
});
</script>


<script>
$('#delivery_amount').on('keyup keypress focus change', function(e) {
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
        document.getElementById("delivery_1").innerHTML = output + 'تومان';
    } else {
        document.getElementById("delivery_1").innerHTML = '';
    }
});
$('#delivery_amount_per_product').on('keyup keypress focus change', function(e) {
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
        document.getElementById("delivery_2").innerHTML = output + 'تومان';
    } else {
        document.getElementById("delivery_2").innerHTML = '';
    }
});

function show_price(price, id) {
    Number = price
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

        document.getElementById("price[" + id + "]").innerHTML = output + 'تومان';
    } else {

        document.getElementById("price[" + id + "]").innerHTML = '';
    }
};

function show_price_1(price, id) {

    Number = price
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

        document.getElementById("price1[" + id + "]").innerHTML = output + 'تومان';
    } else {

        document.getElementById("price1[" + id + "]").innerHTML = '';
    }

}
</script>
@endpush