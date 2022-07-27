@extends('home.layout.MasterHome')
@section('title','تایید ایمیل')
@section('content')
<main class="main">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li>تایید ایمیل</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content error-404">
        <div class="container">
            <div class="banner">
                <figure>
                    <img src="{{asset('images/email-verify.png')}}" alt="تایید ایمیل" width="820" height="460" />
                </figure>
                <div class="banner-content text-center">
                    <h2 class="banner-title">
                        <span class="text-secondary">خطای عدم تایید ایمیل!!!</span>
                    </h2>
                    <p class="text-light">لطفا ابتدا لینک تاییدیه ارسالی به ایمیل خود را تایید نمایید.</p>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('frm-verify-email').submit();" class="btn btn-dark btn-rounded btn-icon-right">ارسال مجدد لینک تایید ایمیل<i class="w-icon-long-arrow-left"></i></a>
                    <form id="frm-verify-email" action="{{ route('verification.send') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
@endsection
@if (session('status') == 'verification-link-sent')
@push('scripts')
<script>
    Swal.fire({
        text: 'لینک تاییدیه به ایمیل شما ارسال شد',
        icon: 'success',
        confirmButtonText: 'تایید'
    })
</script>
@endpush
@endif
