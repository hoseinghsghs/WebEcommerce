@extends('admin.layout.MasterAdmin')
@section('title','تغییر رمزعبور')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>تغییر رمزعبور</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item">تنظیمات</li>
                        <li class="breadcrumb-item active">تغییر رمزعبور</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="body">
                            <form id="form_advanced_validation" class="needs-validation" action="{{route('user-password.update')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="p-1">رمز عبور فعلی *</label>
                                        <div class="mb-3">
                                            <input name="current_password" type="password" class="form-control @error('current_password','updatePassword') is-invalid @enderror" placeholder="" required>
                                            @error('current_password','updatePassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="p-1">رمز عبور جدید *</label>
                                        <div class="mb-3">
                                            <input name="password" type="password" class="form-control @error('password','updatePassword') is-invalid @enderror" placeholder="" required>
                                            @error('password','updatePassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="p-1">تکرار رمز عبور * </label>
                                        <div class="mb-3">
                                            <input name="password_confirmation" type="password" class="form-control @error('password_confirmation','updatePassword') is-invalid @enderror" placeholder="" required>
                                            @error('password_confirmation','updatePassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <button type="submit" class="btn btn-raised btn-primary waves-effect">ذخیره</button>
                                    </div>
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
