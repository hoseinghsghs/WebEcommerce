@extends('home.layout.MasterHome')
@section('title','ثبت نام')
@section('content')
<!-- login----------------------------------->
<div class="container">
    <div class="row">
        <div class="col-lg">
            <section class="page-account-box">
                <div class="col-lg-6 col-md-6 col-xs-12 mx-auto">
                    <div class="ds-userlogin">
                        <a href="{{route('home')}}" class="account-box-logo" style="background: url({{asset('storage/logo/'.$setting->logo)}}) no-repeat;background-size: contain;">{{$setting->title}}</a>
                        <div class="account-box">
                            <div class="account-box-headline">
                                <a href="{{route('login')}}" class="login-ds">
                                    <span class="title">ورود</span>
                                    @isset($setting->title)
                                    <span class="sub-title">به {{$setting->title}}</span>
                                    @endisset
                                </a>
                                <a href="{{route('register')}}" class="register-ds active">
                                    <span class="title">ثبت نام</span>
                                    @isset($setting->title)
                                    <span class="sub-title">در {{$setting->title}}</span>
                                    @endisset
                                </a>
                            </div>
                            <div class="Login-to-account mt-4">
                                <div class="account-box-content">
                                    <h4>ثبت نام {{$setting->title?' در'.$setting->title:''}}</h4>
                                    <form id="sign-up" class="form-account text-right">
                                        <div class="form-account-title">
                                            <label for="email-phone">ایمیل / شماره موبایل</label>
                                            <input type="text" class="number-email-input" id="email-phone" name="email-account">
                                        </div>
                                        <div class="form-account-title">
                                            <label for="password">رمز عبور</label>
                                            <input type="password" class="password-input" name="password-account">
                                        </div>
                                        <div class="form-auth-row">
                                            <label for="#" class="ui-checkbox mt-1">
                                                <input type="checkbox" value="1" name="login" id="remember">
                                                <span class="ui-checkbox-check"></span>
                                            </label>
                                            <label for="remember" class="remember-me mr-0"><a href="#">حریم خصوصی</a> و <a href="#">شرایط قوانین </a>استفاده از سرویس های سایت دیجی‌اسمارت را مطالعه نموده و با کلیه موارد آن موافقم.</label>
                                        </div>
                                        <div class="form-row-account">
                                            <button class="btn btn-primary btn-register">ثبت نام در دیجی اسمارت</button>
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
<!-- login----------------------------------->

@endsection
