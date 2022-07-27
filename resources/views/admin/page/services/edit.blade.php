@extends('admin.layout.MasterAdmin')
@section('title','ویرایش سرویس')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش سرویس</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i
                                    class="zmdi zmdi-home"></i>خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">سرویس</a></li>
                        <li class="breadcrumb-item active">ویرایش سرویس</li>
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
                                action="{{route('admin.services.update',$service->id)}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">عنوان</label>
                                        <input type="text" name="title" class="form-control" maxlength="30"
                                            minlength="3" required value="{{old('title')?? $service->title }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <label class="form-label">توضیحات</label>
                                        <textarea name="description" rows="4" class="form-control no-resize"
                                            maxlength="200" minlength="5"
                                            required>{{ old('description')?? $service->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-float">
                                    <div class="form-line">
                                        <label class="form-label">آیکن </label>
                                        <small>برای گرفتن نام آیکن ها روی این لینک کلیک کنید: <a
                                                href="https://fontawesome.com/v3/icons/" target="_blank">
                                                Icon</a></small>
                                        <div class="form-group">
                                            <input type="text" name="icon" class="form-control" required
                                                value="{{ old('icon')?? $service->icon }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">مرتب سازی</label>
                                        <input type="number" name="service_order" class="form-control" min="1"
                                            value="{{ old('service_order')??$service->service_order }}">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-raised btn-primary waves-effect"
                                    onclick="loadbtn(event)">
                                    بروزرسانی
                                </button>

                            </form>
                        </div>
                    </div>
                    <!-- #END# Hover Rows -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection