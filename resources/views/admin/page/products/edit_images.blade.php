@extends('admin.layout.MasterAdmin')
@section('title','ایجاد محصول')
@section('Content')

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش تصویر محصول</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href={{route('admin.products.index')}}>لیست محصولات </a></li>
                        <li class="breadcrumb-item active">ویرایش تصویر محصول</li>
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
                    <hr>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 ">
                            <form action="{{route('admin.product.images.add',['product' => $product->id])}}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="header">
                                    <label for="primary_image">تصویر اصلی *</label>
                                </div>
                                <div class="body">
                                    <p>عکس را فقط با فرمت jpg و png آپلود نمایید. </p>
                                    <div class="form-group">
                                        <input type="file" class="dropify" name="primary_image" id="primary_image"
                                            value={{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)}}
                                            data-default-file={{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)}}
                                            data-allowed-file-extensions="jpg png">

                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-raised btn-success waves-effect">آپلود تصویر
                                        اصلی</button>
                                </div>
                            </form>

                        </div>
                        <!-- هزینه ارسال پایان-->
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header mt-0">
                                <label class="mb-1">سایر تصاویر</label>
                            </div>
                            <div class="form-group">
                                <form action="{{route('admin.edit_uploade' , ['product'=>$product])}}" id="myDropzone"
                                    class="dropzone" method="POST" id="my-awesome-dropzone">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('styles')

    <link rel=" stylesheet" href={{ asset('assets\admin\css\dropzone.min.css') }} type="text/css"/>
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
    @php
    $product_images=$product->images->all();
    @endphp
    @push('scripts')
    <!-- dropzone script start -->
    <script>
    let variations = @json($product_images);
    console.log(variations);
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
                '<span class="server_file" hidden >' + response + "</span>"
            );

        },

        removedfile: function(file) {

            var server_file = file.name;
            var answer = window.confirm("آیا تصویر حذف شود؟");
            if (answer) {
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.edit_del')}}",
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
            } else {
                alert('مشکل اتصال با سرور')
            }

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
            variations.forEach(variation => {
                console.log(variation.image);


                var thisDropzone = this;

                var mockFile = {
                    name: variation.image,
                    size: 12345,
                    type: 'image/jpeg'
                };
                thisDropzone.emit("addedfile", mockFile);
                thisDropzone.emit("success", mockFile);
                thisDropzone.emit("thumbnail", mockFile,
                    "{{env('APP_URL')}}" + '/storage/other_product_image/' + variation.image)
            }, )
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

    @endpush

</section>

@endsection