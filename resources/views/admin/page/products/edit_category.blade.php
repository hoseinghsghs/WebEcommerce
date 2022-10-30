@extends('admin.layout.MasterAdmin')
@section('title','ویرایش دسته بندی و ویژگی')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش دسته‌بندی و ویژگی</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href={{route('admin.products.index')}}>لیست محصولات </a></li>

                        <li class="breadcrumb-item active">ویرایش دسته‌بندی و ویژگی</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>{{$product->name}}</strong> ({{$product->category->name}}) </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="col-sm-4">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <form id="form_advanced_validation" class="needs-validation" action="{{ route('admin.products.category.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row clearfix">
                                    <div class="form-group col-md-4 col-sm-6">
                                        <label for="category_id">دسته بندی محصول:</label>
                                        <select id="categorySelect" name="category_id" data-placeholder="انتخاب دسته" class="form-control ms select2 @error('category_id') is-invalid @enderror" data-live-search="true">
                                            <option></option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}-{{ $category->parent->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ویژگی های متغییر -->
                                <div id="attributesContainer">
                                    <div class="row clearfix" id="attributes">
                                    </div>
                                    </hr>
                                    <p>ویژگی متغیر برای <span id="variationName" class="font-weight-bold"></span> </p>
                                    <!-- ویژگی های متغییر -->
                                    <div id="czContainer">
                                        <div id="first">
                                            <div class="recordset p-2 mb-2 rounded bg-light">
                                                <div class="row clearfix">
                                                    <div class="col-md-3 col-sm-4">
                                                        <label>نام *</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="variation_values[value][]" required type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-4">
                                                        <label>قیمت *</label>
                                                        <div class="form-group">
                                                            <input dir="ltr" class="form-control without-spin" name="variation_values[price][]" required onkeyup="format_price(this.value,'formated_1_price')" onfocus="format_price(this.value,'formated_1_price')" id="price_input" type="number">
                                                            <span id="price" class="price"></span>
                                                            <span class="pt-1" id="formated_1_price"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-4">
                                                        <label>تعداد *</label>
                                                        <div class="form-group">
                                                            <input dir="ltr" required class="form-control without-spin" name="variation_values[quantity][]" type="number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-4">
                                                        <label>شناسه انبار *</label>
                                                        <div class="form-group">
                                                            <input dir="ltr" class="form-control" name="variation_values[sku][]" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4">
                                                        <label>گارانتی</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="variation_values[guarantee][]" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4">
                                                        <label>مدت گارانتی</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="variation_values[time_guarantee][]" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" form="form_advanced_validation" class="btn btn-raised btn-success waves-effect">ویرایش</button>
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
    $('#attributesContainer').hide();
    $('#categorySelect').on('change', function() {
        let inputSelect = $(this);
        let categoryId = inputSelect.val();
            inputSelect.prev('label').prepend(" <i class='zmdi zmdi-hc-fw zmdi-hc-spin'></i> ");
            $.get(`{{url('Admin-panel/managment/category-attributes/${categoryId}')}}`,
                function(response, status) {
                    if (status == 'success') {
                        $('#attributesContainer').fadeIn();
                        // Empty Attribute Container
                        $('#attributes').find('div').remove();
                        // Create and Append Attributes Input
                        response.attrubtes.forEach(attribute => {
                            let attributeFormGroup = $('<div/>', {
                                class: 'form-group col-sm-3'
                            });
                            attributeFormGroup.append($('<label/>', {
                                for: attribute.name,
                                text: attribute.name
                            }));

                            attributeFormGroup.append($('<input/>', {
                                type: 'text',
                                class: "form-control @error('attribute_ids.*') is-invalid @enderror",
                                id: attribute.name,
                                name: `attribute_ids[${attribute.id}]`,
                                required: true
                            }));
                            $('#attributes').append(attributeFormGroup);
                        });

                        $('#variationName').text(response.variation.name);
                    }
                }).fail(function() {
                alert('مشکل');
            }).always(function() {
                inputSelect.prev('label').find('i').remove();
            })
    })
    $("#czContainer").czMore();

    function format_price(price, res) {
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
</script>
@endpush
