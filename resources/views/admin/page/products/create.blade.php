@extends('admin.layout.MasterAdmin')
@section('title','ایجاد محصول')
@section('Content')

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ایجاد محصول</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">محصولات</a></li>
                        <li class="breadcrumb-item active">ایجاد محصول</li>
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
                            @error('variation_values')
                            <div class="col-sm-4">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @enderror
                            @error('attribute_ids')
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

                        <form id="form_advanced_validation" action="{{ route('admin.products.store') }}" method="POST"
                            enctype="multipart/form-data">
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
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') }}" required />
                                            @error('name')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="position_id">محل قرار گیری </label>
                                        <select id="positionSelect" name="position" data-placeholder="انتخاب محل"
                                            class="form-control ms select2">
                                            <option></option>
                                            <option>تخفیف روزانه</option>
                                            <option>فروش ویژه</option>
                                            <option>پیشنهاد ما</option>
                                            <option>تک محصول</option>
                                        </select>
                                        @error('position')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="brand_id">برند</label>
                                        <select id="brandSelect" name="brand_id" data-placeholder="انتخاب برند"
                                            class="form-control ms select2" required>
                                            <option></option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">
                                                {{ $brand->name }}</option>
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
                                        <select id="is_active" name="is_active" class="form-control ms select2"
                                            required>
                                            <option value="1" selected>فعال</option>
                                            <option value="0">غیرفعال</option>
                                        </select>
                                        @error('is_active')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="tag_ids">تگ ها</label>
                                        <select id="tagSelect" name="tag_ids[]" data-placeholder="انتخاب تگ"
                                            class="form-control ms select2 @error('tag_ids.*') is-invalid @enderror"
                                            multiple data-close-on-select="false">
                                            @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
                                        <textarea class="form-control" id="description" required
                                            name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="header p-0">
                                    <h2><strong>دسته بندی ها </strong></h2>
                                </div>
                                <hr>
                                <div class="row clearfix">

                                    <div class="form-group col-md-6">
                                        <label for="category_id">دسته بندی</label>
                                        <select id="categorySelect" name="category_id" data-placeholder="انتخاب دسته"
                                            required class="form-control ms select2" data-live-search="true">
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
                                <!-- ویژگی های ثابت -->
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
                                                            <input class="form-control price_values"
                                                                id="variation_values[price][]"
                                                                onkeyup="show_price(this.value)"
                                                                onfocus="show_price(this.value)" required
                                                                name="variation_values[price][]" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>تعداد *</label>
                                                        <div class="form-group">
                                                            <input class="form-control"
                                                                name="variation_values[quantity][]" type="text"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>شناسه انبار *</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="variation_values[sku][]"
                                                                required type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <center> <span id="price1[1]"></span></center>
                                <!-- ویژگی های متغییر پایان-->
                                <!-- هزینه ارسال -->
                                <div class="header p-0 mt-5">
                                    <h2><strong>هزینه ارسال</strong></h2>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <label for="delivery_amount">هزینه ارسال*</label>
                                        <div class="form-group">
                                            <input class="form-control" id="delivery_amount" name="delivery_amount"
                                                required type="text" value="{{ old('delivery_amount') }}">
                                            @error('delivery_amount')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <span id="delivery_1"></span>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="delivery_amount_per_product"> هزینه ارسال به ازای محصول
                                            اضافی*</label>
                                        <div class="form-group">
                                            <input class="form-control" id="delivery_amount_per_product"
                                                name="delivery_amount_per_product" type="text"
                                                value="{{ old('delivery_amount_per_product') }}">
                                            @error('delivery_amount_per_product')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <span id="delivery_2"></span>
                                    </div>
                                </div>
                                <div class="header p-0 mt-3">
                                    <h2><strong>تصاویر</strong></h2>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 ">

                                        <div class="header">
                                            <label for="primary_image">تصویر اصلی *</label>
                                        </div>
                                        <div class="body">
                                            <p>عکس را فقط با فرمت jpg و png آپلود نمایید. </p>
                                            <div class="form-group">
                                                <input name="primary_image" id="primary_image" type="file"
                                                    class="dropify form-controll" required
                                                    data-allowed-file-extensions="jpg png">
                                                @error('primary_image')
                                                <span class="text-danger m-0">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="header mt-0">
                                    <label class="mb-1">سایر تصاویر</label>
                                </div>

                                <div class="form-group">
                                    <form action="{{route('admin.uploade')}}" id="myDropzone" class="dropzone"
                                        method="POST" id="my-awesome-dropzone">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" form="form_advanced_validation"
                            class="btn btn-raised btn-success waves-effect">ذخیره</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

    </div>


    @push('styles')
    <!-- Latest compiled and minified CSS -->


    <link rel=" stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <style>
    .dropzone {
        border-radius: 5px;
        border-style: solid !important;
        border-width: 2px !important;
        border-color: #D2D5D6 !important;
        background-color: white !important;
    }
    </style>

    @endpush

    @push('scripts')
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
    </script>


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





    <!-- dropzone script start -->
    <script>
    Dropzone.options.myDropzone = {
        parallelUploads: 5,
        maxFiles: 5,
        maxFilesize: 1,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        previewsContainer: ".dropzone",
        clickable: ".dropzone",
        success: function(file, response) {
            $(file.previewTemplate).append(
                '<span class="server_file">' + response + "</span>"
            );

        },

        removedfile: function(file) {
            var server_file = $(file.previewTemplate)
                .children(".server_file")
                .text();
            alert(server_file);
            $.ajax({
                type: "POST",
                url: "{{route('admin.del')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    name: server_file,
                    request: 2,
                },
                sucess: function(data) {
                    console.log("success: " + data);
                },
            });

            var _ref;
            return (_ref = file.previewElement) != null ?
                _ref.parentNode.removeChild(file.previewElement) :
                void 0;
        },

        headers: {
            "X-CSRF-Token": "{{ csrf_token() }}",
        },
        dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
        dictDefaultMessage: "<span style='color:gray'>تصاویر را بکشید و در اینجا رها کنید</span>",
        dictFallbackMessage: "Your browser does not support drag'n'drop file uploads.",
        dictFallbackText: "Please use the fallback form below to upload your files like in the olden days.",
        dictFileTooBig: "File is too big (@{{filesize}}MiB). Max filesize: @{{maxFilesize}}MiB.",
        dictInvalidFileType: "You can't upload files of this type.",
        dictResponseError: "Server responded with @{{statusCode}} code.",
        dictCancelUpload: "توقف آپلود",
        dictUploadCanceled: "Upload canceled.",
        dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
        dictRemoveFile: "حذف",
        dictRemoveFileConfirmation: null,
        dictMaxFilesExceeded: "You can not upload any more files.",

        init: function() {
            dzClosure =
                this; // Makes sure that 'this' is understood inside the functions below.
            // for Dropzone to process the queue (instead of default form behavior):


            var el = document.getElementById("submit-all");
            if (el) {
                el.addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.

                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();


                });
            }


            //send all the form data along with the files:
            this.on("sendingmultiple", function(data, xhr, formData) {
                formData.append("firstname", jQuery("#firstname").val());
                formData.append("lastname", jQuery("#lastname").val());
            });
            this.on("successmultiple", function(files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
            });
            this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
                alert("error");
            });
        },
    };
    </script>
    <!-- dropzone script end -->


    @endpush

</section>


@endsection