@extends('home.layout.MasterHome')

@section('title', __('Not Found'))
@section('content')
<main class="main">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li>ارور 404</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content error-404">
        <div class="container">
            <div class="banner">
                <figure>
                    <img src="{{asset('assets/images/pages/404.png')}}" alt="ارور 404" width="820" height="460" />
                </figure>
                <div class="banner-content text-center">
                    <h2 class="banner-title">
                        <span class="text-secondary">اوپس!!!</span> خطایی در سایت رخ داد!
                    </h2>
                    <p class="text-light">ممکن است در نشانی اینترنتی وارد شده غلط املایی وجود داشته باشد یا صفحه مورد نظر شما دیگر وجود نداشته باشد</p>
                    <a href="{{url()->previous()}}" class="btn btn-dark btn-rounded btn-icon-left"><i class="w-icon-long-arrow-right"></i>بازگشت به صفحه قبل</a>
                    <a href="{{route('home')}}" class="btn btn-primary btn-rounded btn-icon-right">فروشگاه<i class="w-icon-long-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
@endsection
