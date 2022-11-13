@extends('admin.layout.MasterAdmin')
@section('title','ایجاد سرویس')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ایجاد سرویس</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">سرویس</a></li>
                        <li class="breadcrumb-item active">ایجاد سرویس</li>
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
                                action="{{route('admin.services.store')}}" method="POST">
                                @csrf

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">عنوان</label>
                                        <input type="text" name="title" class="form-control" maxlength="30"
                                            minlength="3" required value="{{old('title')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <label class="form-label">توضیحات</label>
                                        <textarea name="description" rows="4" class="form-control no-resize"
                                            maxlength="200" minlength="5" required>{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">آیکن </label>
                                        </br>
                                        <small> برای گرفتن نام آیکن ها روی این لینک کلیک کنید و نام آیکن را در فیلد زیر
                                            قرار دهید <a href="https://fontawesome.com/v3/icons/" target="_blank">
                                                Icon</a></small>
                                        <input type="text" name="icon" required class="form-control"
                                            value="{{old('icon')}}">
                                    </div>
                                </div>

                                <div class="form-float">
                                    <div class="form-line">
                                        <label class="form-label">مرتب سازی</label>
                                        <div class="form-group">
                                            <input type="number" name="service_order" class="form-control" min="1"
                                                value="{{old('service_order')}}" required>
                                        </div>
                                    </div>
                                </div>

                                <button onclick="loadbtn(event)" type="submit"
                                    class="btn btn-raised btn-primary waves-effect">
                                    ذخیره
                                </button>

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