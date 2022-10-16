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
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="row clearfix">
                            @error('variation_values.*')
                            <div class="col-auto">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                                    </button>
                                </div>
                            </div>
                            @enderror
                            @error('attribute_values.*')
                            <div class="col-auto">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                                    </button>
                                </div>
                            </div>
                            @enderror
                        </div>
                        <div class="body">
                        <form id="form_advanced_validation" autocomplete="off" action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                                <div class="header p-0">
                                    <h2><strong>اطلاعات اصلی محصول</strong></h2>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <label>نام محصول *</label>
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{$product->name}}" required class="form-control" value="{{ old('name') }}" />
                                            @error('name')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6">
                                        <label for="position_id">محل قرار گیری</label>
                                        <select id="positionSelect" name="position" data-placeholder="انتخاب محل" class="form-control ms select2">
                                            <option {{$product->position == 'پیش فرض' ? 'selected' : ''}}>پیش فرض</option>
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
                                    <div class="form-group col-md-3 col-auto">
                                        <label for="is_active">وضعیت</label>
                                        <div class="switchToggle">
                                            <input type="checkbox" name="is_active" id="switch" {{old('is_active') || !$product->is_active ? 'checked' : null}}>
                                            <label for="switch">Toggle</label>
                                        </div>
                                        @error('is_active')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6">
                                        <label for="brand_id">برند</label>
                                        <select id="brandSelect" name="brand_id" data-placeholder="انتخاب برند" class="form-control ms ms search-select select2">
                                            <option></option>
                                            @if ($brands->count()>0)
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{$product->brand && $brand->id == $product->brand->id ? 'selected' : ''}}>
                                                {{ $brand->name }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('brand_id')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-9">
                                        <label for="tag_ids">تگ ها</label>
                                        <select id="tagSelect" name="tag_ids[]" data-placeholder="انتخاب تگ" data-close-on-select="false" class="form-control ms select2" multiple>
                                            @php
                                            $productTagIds = $product->tags()->pluck('id')->toArray()
                                            @endphp
                                            @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ in_array($tag->id, $productTagIds) ? 'selected' : '' }}>
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
                                        <textarea class="form-control" id="summernote" rows="6" required name="description">{!! $product->description !!}</textarea>
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
                                    <div class="form-group col-sm-4">
                                        <label>{{ $productAttribute->attribute->name }}</label>
                                        <input class="form-control" type="text" required name="attribute_values[{{ $productAttribute->id }}]" value="{{ $productAttribute->value }}">
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
                                            <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#collapse-{{ $variation->id }}">
                                                قیمت و موجودی برای متغیر ( {{ $variation->value }} )
                                            </button>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="collapse mt-2" id="collapse-{{ $variation->id }}">
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label> قیمت </label>
                                                    <input dir="ltr" type="number" class="form-control price_values without-spin" id="variation_values[price][]" onkeyup="show_price(this.value,'formated_1_price')" onfocus="show_price(this.value,'formated_1_price')" name="variation_values[{{ $variation->id }}][price]" value="{{ $variation->price }}" required>
                                                    <span class="pt-1" id="formated_1_price"></span>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label> تعداد </label>
                                                    <input dir="ltr" type="number" class="form-control without-spin" name="variation_values[{{ $variation->id }}][quantity]" value="{{ $variation->quantity }}" required>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label> sku </label>
                                                    <input dir="ltr" type="text" class="form-control" name="variation_values[{{ $variation->id }}][sku]" value="{{ $variation->sku }}">
                                                </div>
                                                <div class="form-group col-md-6 col-sm-4">
                                                    <label> گارانتی </label>
                                                    <input type="text" class="form-control" name="variation_values[{{ $variation->id }}][guarantee]" value="{{ $variation->guarantee }}">
                                                </div>
                                                <div class="form-group col-md-6 col-sm-4">
                                                    <label> مدت گارانتی </label>
                                                    <input type="text" class="form-control" name="variation_values[{{ $variation->id }}][time_guarantee]" value="{{ $variation->time_guarantee}}">
                                                </div>
                                                {{-- Sale Section --}}
                                                <div class="col-md-12">
                                                    <p> حراج : </p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> قیمت حراجی </label>
                                                    <input type="number" name="variation_values[{{ $variation->id }}][sale_price]" onkeyup="show_price(this.value,'{{ $variation->id }}')" onfocus="show_price(this.value,'{{ $variation->id }}')" value="{{ $variation->sale_price }}" class="form-control without-spin">
                                                    <span id="price[{{ $variation->id }}]" class="mt-2"></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> تاریخ شروع حراجی </label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="variationInputDateOnSaleFrom-{{ $variation->id }}" value="{{ $variation->date_on_sale_from == null ? null : $variation->date_on_sale_from }}">
                                                        <input type="hidden" id="variationInputDateOnSaleFrom-alt-{{ $variation->id }}" name="variation_values[{{ $variation->id }}][date_on_sale_from]" value="{{ $variation->date_on_sale_from  ?? null }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> تاریخ پایان حراجی </label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="variationInputDateOnSaleTo-{{ $variation->id }}" value="{{ $variation->date_on_sale_to == null ? null : $variation->date_on_sale_to }}">
                                                        <input type="hidden" id="variationInputDateOnSaleTo-alt-{{ $variation->id }}" name="variation_values[{{ $variation->id }}][date_on_sale_to]" value="{{ $variation->date_on_sale_to ?? null }}">
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
                                            <input class="form-control without-spin @error('delivery_amount') is-invalid @enderror" id="delivery_amount" name="delivery_amount" type="number" dir="ltr" value="{{ $product->delivery_amount}}">
                                            <span id="delivery_1" class="mt-1"></span>
                                            @error('delivery_amount')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="delivery_amount_per_product"> هزینه ارسال به ازای محصول
                                            اضافی*</label>
                                        <div class="form-group">
                                            <input class="form-control without-spin" dir="ltr" id="delivery_amount_per_product" name="delivery_amount_per_product" required type="number" value="{{ $product->delivery_amount_per_product }}">
                                            <span class="mt-1" id="delivery_2"></span>
                                            @error('delivery_amount_per_product')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-raised btn-success waves-effect">ویرایش</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<!-- تاریخ -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css" />
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
    // format prices
    function show_price(price, res) {
        NUmber1 = price
        NUmber1 += '';
        NUmber1 = NUmber1.replace(',', '');
        NUmber1 = NUmber1.replace(',', '');
        NUmber1 = NUmber1.replace(',', '');
        NUmber1 = NUmber1.replace(',', '');
        NUmber1 = NUmber1.replace(',', '');
        NUmber1 = NUmber1.replace(',', '');
        x = NUmber1.split('.');
        y = x[0];
        z = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(y))
            y = y.replace(rgx, '$1' + ',' + '$2');
        output = y + z;
        if (output != "") {
            document.getElementById(res).innerHTML = output + 'تومان';
        } else {

            document.getElementById(res).innerHTML = '';
        }
    }
    $('#delivery_amount').on('keyup keypress focus change', function(e) {
        show_price($(this).val(), "delivery_1");
    });

    $('#delivery_amount_per_product').on('keyup keypress focus change', function(e) {
        show_price($(this).val(), "delivery_2");
    });
</script>
@endpush
