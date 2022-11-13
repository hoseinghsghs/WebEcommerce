@extends('admin.layout.MasterAdmin')
@section('title','ویرایش پروفایل کاربری')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش پروفایل</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item">تنظیمات</li>
                        <li class="breadcrumb-item active">ویرایش پروفایل</li>
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
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{route('admin.profile.update')}}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <label>نام و نام خانوادگی</label>
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>شماره تماس</label>
                                        <div class="form-group">
                                            <input name="cellphone" type="number" maxlength="11" class="form-control without-spin @error('cellphone') is-invalid @enderror" value="{{$user->cellphone}}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>ایمیل</label>
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">عکس پروفایل</label>
                                        <div class="form-group ">
                                            <input type="file" class="dropify" name="avatar" id="dropifyt" data-default-file="{{$user->avatar ? asset('storage/profile/'.$user->avatar) : asset('img/profile.png') }}" data-max-file-size="1024K" data-allowed-file-extensions="jpg png jpeg" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button onclick="loadbtn(event)" type="submit" class="btn btn-raised btn-primary waves-effect">
                                        ذخیره
                                    </button>
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
