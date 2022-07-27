@extends('admin.layout.MasterAdmin')
@section('title','ایجاد بنر')

@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ایجاد بنر</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.banners.index')}}">بنر ها</a></li>
                        <li class="breadcrumb-item active">ایجاد بنر</li>
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
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="zmdi zmdi-block"></i>
                            </div>
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                    <div class="card">
                        <div class="body">
                            <form id="form_advanced_validation" class="needs-validation"
                                action={{route('admin.banners.store')}} method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <label for="title">عنوان بنر</label>
                                        <div class="form-group">
                                            <input type="text" name="title" id="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{old('title')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="text">متن</label>
                                        <div class="form-group">
                                            <input id="text" name="text" class="form-control" value="{{old('text')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pos-01">
                                        <label for="position_id">محل قرار گیری </label>
                                        <div class="form-group">
                                            <select id="positionSelect" name="type" data-placeholder="انتخاب محل"
                                                class="form-control ms select2" required>
                                                <option></option>
                                                <option value="اسلایدر">اسلایدر</option>
                                                <option value="هدر-چپ-بالا">هدر-چپ-بالا</option>
                                                <option value="هدر-چپ-پایین">هدر-چپ-پایین</option>
                                                <option value="راست-دسته بندی">راست-دسته بندی</option>
                                                <option value="چپ-دسته بندی">چپ-دسته بندی</option>
                                                <option value="عرضی">عرضی</option>
                                                <option value="آخر-راست">آخر-راست</option>
                                                <option value="آخر-چپ-بالا">آخر-چپ-بالا</option>
                                                <option value="آخر-چپ-پایین-1">آخر-چپ-پایین-1</option>
                                                <option value="آخر-چپ-پایین-2">آخر-چپ-پایین-2</option>
                                                <option value="محصول">محصول</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="switch">وضعیت</label>
                                        <div class="switchToggle">
                                            <input type="checkbox" name="is_active" id="switch"
                                                {{old('is_active') ? 'checked' : null}}>
                                            <label for="switch">Toggle</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="priority"> اولویت</label>
                                        <div class="form-group">
                                            <input type="number" name="priority" id="priority"
                                                class="form-control @error('priority') is-invalid @enderror"
                                                value="{{old('priority')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="button_text">متن دکمه</label>
                                        <div class="form-group">
                                            <input type="text" name="button_text" id="button_text"
                                                class="form-control @error('button_text') is-invalid @enderror"
                                                value="{{old('button_text')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="button_link">لینک دکمه</label>
                                        <div class="form-group">
                                            <input type="text" name="button_link" id="button_link"
                                                class="form-control @error('button_link') is-invalid @enderror"
                                                value="{{old('button_link')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="button_icon">آیکون دکمه</label>
                                        <div class="form-group">
                                            <input type="text" name="button_icon" id="button_icon" class="form-control"
                                                value="{{old('button_icon')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image">تصویر</label>
                                        <span class="position_message" id="position_message"></span>
                                        <div class=" form-group">
                                            <input name="image" id="image" type="file" class="dropify form-controll"
                                                required data-allowed-file-extensions="jpg png jpeg svg"
                                                data-max-file-size="1024K">
                                            @error('image')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img class="bone mt-5" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-raised btn-primary waves-effect">ذخیره</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$("#positionSelect").change(function() {

    if ($(this).val() == 'اسلایدر') {
        $('.position_message').html('(سایز تصویر 509*730)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/top/1.png");
    }
    if ($(this).val() == 'هدر-چپ-بالا') {
        $('.position_message').html('(سایز تصویر 239*330)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/top/2.png");
    }
    if ($(this).val() == 'هدر-چپ-پایین') {
        $('.position_message').html('(سایز تصویر 239*330)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/top/3.png");
    }

    if ($(this).val() == 'راست-دسته بندی') {
        $('.position_message').html('(سایز تصویر 180*680)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/category/01.png");
    }
    if ($(this).val() == 'چپ-دسته بندی') {
        $('.position_message').html('(سایز تصویر 180*680)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/category/02.png");
    }

    if ($(this).val() == 'عرضی') {
        $('.position_message').html('(سایز تصویر 260*1380)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/width/01.png");
    }


    if ($(this).val() == 'آخر-راست') {
        $('.position_message').html('(سایز تصویر 240*680)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/end/01.png");
    }
    if ($(this).val() == 'آخر-چپ-بالا') {
        $('.position_message').html('(سایز تصویر 200*680)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/end/02.png");

    }
    if ($(this).val() == 'آخر-چپ-پایین-1') {
        $('.position_message').html('(سایز تصویر 200*330)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/end/04.png");

    }
    if ($(this).val() == 'آخر-چپ-پایین-2') {
        $('.position_message').html('(سایز تصویر 200*330)').css('color', 'red');
        $(".bone").attr("src", "/assets/images/position/end/03.png");

    }

    if ($(this).val() == 'محصول') {
        $('.position_message').html('(سایز تصویر 220*266)').css('color', 'red');
    }



});
</script>
@endpush