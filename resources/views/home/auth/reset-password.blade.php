@extends('home.layout.MasterHome')
@section('title','بازیابی رمز عبور')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg">
            <section class="page-account-box">
                <div class="col-lg-6 col-md-10 col-xs-12 mx-auto">
                    <div class="ds-userlogin">
                        <a href="{{route('home')}}" class="account-box-logo" style="background: url({{asset('storage/logo/'.$setting->logo)}}) no-repeat;background-size: contain;">{{$setting->title}}</a>
                        <div class="account-box">
                            <div class="Login-to-account mt-4">
                                <div class="account-box-content">
                                    <form id="reset-password" class="form-account text-center" action="{{route('password.update')}}" method="POST">
                                        @csrf
                                        <h4>تغییر رمزعبور</h4>
                                        <div class="form-account-title text-right">
                                            <label for="email">ایمیل<abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                            <input type="email" id="email" class="number-email-input form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email">
                                            @error('email')
                                            <div class="invalid-feedback pr-2">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-account-title text-right">
                                            <label for="password">رمز عبور<abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                            <input type="password" id="password" class="number-email-input form-control @error('password') is-invalid @enderror" name="password">
                                            @error('password')
                                            <div class="invalid-feedback pr-2">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-account-title text-right">
                                            <label for="password_confirmation">تکرار رمز عبور <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                            <input type="password" class="number-email-input form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                            @error('password_confirmation')
                                            <div class="invalid-feedback pr-2">{{$message}}</div>
                                            @enderror
                                            <input type="hidden" name="token" value="{{request()->route('token')}}">
                                        </div>
                                        <div class="form-row-account">
                                            <button class="btn btn-primary btn-reset">تایید</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#reset-password').submit(function(event) {
            $('#reset-password .btn-reset').attr('disabled', true).append('<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
        });
    });
</script>
@endpush
