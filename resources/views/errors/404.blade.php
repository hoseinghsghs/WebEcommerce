@extends('home.layout.MasterHome')
@section('title', __('Not Found'))
@section('content')
<div class="container-main">
    <div class="col-12">
        <div id="content">
            <div class="d-404">
                <div class="d-404-title">
                    <h1>صفحه‌ای که دنبال آن بودید پیدا نشد!</h1>
                </div>
                <div class="d-404-actions">
                    <a href="{{route('home')}}" class="btn btn-primary">صفحه اصلی</a>
                    <a href="{{url()->previous()}}" class="btn btn-primary btn-rounded btn-icon-left"><i
                            class="w-icon-long-arrow-right"></i>بازگشت به صفحه قبل</a>
                </div>
                <div class="d-404-image">
                    <img src="/assets/home/images/404.png">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection