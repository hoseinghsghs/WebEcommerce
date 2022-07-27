@extends('admin.layout.MasterAdmin')
@section('title','ویرایش دسته بندی و ویژگی')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش دسته بندی و ویژگی</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">محصولات</a></li>
                        <li class="breadcrumb-item active">ویرایش دسته بندی و ویژگی</li>
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
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="col-sm-4">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <form id="form_advanced_validation" class="needs-validation"
                            action="{{ route('admin.products.category.update', ['product' => $product->id]) }}"
                            method="POST" enctype="multipart/form-data">

                            @method('put')
                            @csrf


                            <div class="header p-0">
                                <h2><strong>دسته بندی ها </strong></h2>
                            </div>
                            <hr>
                            <div class="row clearfix">

                                <div class="form-group col-md-6">
                                    <label for="category_id">دسته بندی</label>
                                    <select id="categorySelect" name="category_id" data-placeholder="انتخاب دسته"
                                        class="form-control ms select2 @error('category_id') is-invalid @enderror"
                                        data-live-search="true">
                                        <option></option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{$category->id== $product->category->id ? "selected" : ""}}>
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
                                <p>ویژگی متغییر برای <span id="variationName" class="font-weight-bold"></span> </p>

                                <!-- ویژگی های متغییر -->

                                <div id="czContainer">
                                    <div id="first">
                                        <div class="recordset">
                                            <div class="row clearfix">
                                                <div class="col-md-3">
                                                    <label>نام *</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="variation_values[value][]"
                                                            required type="text">

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>قیمت *</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="variation_values[price][]"
                                                            required onkeyup="show_price(this.value)"
                                                            onfocus="show_price(this.value)" id="price_input"
                                                            type="text">
                                                        <span id="price" class="price"></span>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>تعداد *</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="variation_values[quantity][]"
                                                            type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>شناسه انبار *</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="variation_values[sku][]"
                                                            type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <center> <span id="price1[1]"></span></center>
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
        $('#attributesContainer').hide();
        $('#categorySelect').on('change', function() {
            let categoryId = $(this).val();


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
            })
        })
        $("#czContainer").czMore();
        </script>
        <script>

        </script>


        <script>
        function show_price(price) {
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

                document.getElementById("price1[1]").innerHTML = output + 'تومان';
            } else {

                document.getElementById("price1[1]").innerHTML = '';
            }

        }
        </script>
        @endpush
    </div>
    <!-- #END# Hover Rows -->
    </div>

</section>


@endsection