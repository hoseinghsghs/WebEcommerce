@extends('admin.layout.MasterAdmin')
@section('title','ویرایش برند')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ایجاد برند</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.brands.index')}}">بیست برند ها</a></li>
                        <li class="breadcrumb-item active">ایجاد برند</li>
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
                            <div class="row clearfix">
                                @foreach($errors->all() as $error)
                                <!-- <li class="alert alert-danger alert-sm">{{ $error }}</li> -->

                                <div class="col-sm-6">
                                    <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
                                        {{ $error }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>

                                @endforeach
                            </div>

                            <form id="form_advanced_validation" class="needs-validation"
                                action="{{route('admin.brands.update',$brand->id)}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row clearfix mt-3">
                                    <div class="col-lg-6 col-md-6">
                                        <label class="form-label">نام *</label>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" maxlength="50"
                                                value="{{ $brand->name}}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <label class="form-label">محل قرارگیری در صفحه</label>
                                        <div class="form-group">
                                            <input type="number" name="index" value="{{ $brand->index}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">تصویر</label>
                                    <div class="col-lg-12 px-0">
                                        <input name="img" type="file" class="dropify"
                                            data-allowed-file-extensions="jpg png jpeg" data-max-file-size="1024K" @php
                                            if(isset($brand->image)){
                                        $url=Storage::url('brands/'.$brand->image);
                                        echo ("data-default-file=". $url) ;
                                        }
                                        @endphp />
                                    </div>
                                </div>

                                <br>
                                <h5 style="color:#04BE5B">وضعیت </h5>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="checkbox">

                                            <input id="chec" type="checkbox"
                                                {{ $brand->is_active===1 ? 'checked' : '' }} name="is_active" />


                                            <label for="chec">انتشار </label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-raised btn-primary waves-effect m-3 plr-3">
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