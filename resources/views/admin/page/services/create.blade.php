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
                            <li class="breadcrumb-item"><a href="{{route('admin.services.index')}}">لیست سرویس ها</a>
                            </li>
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
                                      enctype="multipart/form-data"
                                      action="{{route('admin.services.store')}}" method="POST">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-3 col-md-6">
                                                <label class="form-label">عنوان</label>
                                                <input type="text" name="title" class="form-control" maxlength="30"
                                                       minlength="3" required value="{{old('title')}}">
                                        </div>
                                        <div class="form-group col-lg-3 col-md-6">
                                            <label class="form-label">توضیحات</label>
                                            <input name="description" class="form-control"
                                                   maxlength="200" minlength="5"
                                                   required value="{{ old('description') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">مرتب سازی</label>
                                            <input type="number" name="service_order" class="form-control"
                                                   min="1"
                                                   value="{{old('service_order')}}" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">آیکن </label>
                                            </br>
                                            <small> برای گرفتن نام آیکن ها روی این لینک کلیک کنید و نام آیکن را در
                                                فیلد
                                                زیر
                                                قرار دهید <a href="https://fontawesome.com/v4/icons/"
                                                             target="_blank">
                                                    Icon</a></small>
                                            <input type="text" name="icon" class="form-control"
                                                   value="{{old('icon')}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">تصویر</label>
                                            <span class="position_message" id="position_message"></span>
                                                <input name="image" id="image" type="file" class="dropify form-controll"
                                                       required data-allowed-file-extensions="jpg png jpeg svg"
                                                       data-max-file-size="1024K">
                                                @error('image')
                                                <span class="text-danger m-0">{{$message}}</span>
                                                @enderror
                                        </div>
                                        <div class="form-group col-12">
                                            <button onclick="loadbtn(event)" type="submit"
                                                    class="btn btn-raised btn-primary waves-effect">
                                                ذخیره
                                            </button>
                                        </div>
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
