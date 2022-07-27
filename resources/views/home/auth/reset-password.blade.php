@extends('home.layout.MasterHome')
@section('title','بازیابی رمز عبور')
@section('content')
<main class="main login-page">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">بازیابی رمز عبور </h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li>فراموشی رمز</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content">
        <div class="container">
            <div class="login-popup">
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li class="nav-item">
                            <a href="#reset-password" class="nav-link active">تغییر رمز</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="reset-password">
                            <form action="{{route('password.update')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>ایمیل *</label>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" required>
                                    @error('email')
                                    <span class="text-red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>رمز عبور *</label>
                                    <input type="password" class="form-control" name="password" required>
                                    @error('password')
                                    <span class="text-red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>تکرار رمز عبور *</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                    @error('password_confirmation')
                                    <span class="text-red">{{$message}}</span>
                                    @enderror
                                </div>
                                <input type="hidden" name="token" value="{{request()->route('token')}}">
                                <button type="submit" class="btn btn-primary">تغییر </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#reset-password').submit(function(event) {
            $('#reset-password .btn-primary').attr('disabled', true).append('<span class="ml-1"><i class="w-icon-store-seo fa-spin"></i></span>');
        });
    });
</script>
@endpush
