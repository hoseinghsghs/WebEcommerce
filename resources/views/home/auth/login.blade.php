@extends('home.layout.MasterHome')
@section('title','ورود')
@section('content')
<!-- login----------------------------------->
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
                                    <!-- auth form -->
                                    <form id="auth-form" class="form-account text-center">
                                        <h4>ورود / ثبت نام</h4>
                                        <div class="form-account-title text-right">
                                            <label for="username">نام کاربری:</label>
                                            <input type="text" class="number-email-input" placeholder="شماره موبایل یا ایمیل" id="username" name="username">
                                            <small class="text-danger font-weight-bold pr-2 username-error d-block"></small>
                                        </div>
                                        <div class="form-row-account">
                                            <button class="btn btn-primary btn-login">تایید</button>
                                        </div>
                                    </form>
                                    <!-- enter password -->
                                    <form id="login-with-pass" class="form-account" style="display: none;">
                                        <h4>ورود</h4>
                                        <div class="text-right">
                                            <div class="form-account-title">
                                                <label for="password">رمز عبور:</label>
                                                <input type="password" class="number-email-input" id="password" name="password">
                                                <small class="text-danger font-weight-bold pr-2 username-error d-block"></small>
                                                <small class="text-danger font-weight-bold pr-2 password-error d-block"></small>
                                            </div>
                                            <div class="form-auth-row">
                                                <label for="#" class="ui-checkbox mt-1">
                                                    <input type="checkbox" value="1" name="remember" id="remember">
                                                    <span class="ui-checkbox-check"></span>
                                                </label>
                                                <a class="account-link-password" onclick="forgetPassword(event)">رمز خود را فراموش کرده ام</a>
                                                <label for="remember" class="remember-me mr-0">مرا به خاطر بسپار</label>
                                            </div>
                                            <div class="form-row-account">
                                                <button class="btn bg-secondary text-light ml-md-2 return-btn" type="button">بازگشت</button>
                                                <button class="btn btn-primary btn-login" type="submit">ورود</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- enter otp code -->
                                    <form id="verify-otp-code" style="display: none;" autocomplete="off">
                                        <h4>اعتبارسنجی</h4>
                                        <div class="message-light">
                                            <div class="massege-light-send">
                                                <div class="message-sended"></div>
                                                <div class="form-edit-number">
                                                    <a href="javascript:void(0)" class="edit-number-link return-btn">ویرایش شماره</a>
                                                </div>
                                            </div>
                                            <div class="account-box-verify-content">
                                                <div class="form-account">
                                                    <div class="form-account-title">کد فعال سازی پیامک شده را وارد کنید</div>
                                                    <div class="form-account-row">
                                                        <div class="lines-number-input">
                                                            <input name="otp-code" type="text" class="line-number-account" maxlength="1">
                                                            <input name="otp-code" type="text" class="line-number-account" maxlength="1">
                                                            <input name="otp-code" type="text" class="line-number-account" maxlength="1">
                                                            <input name="otp-code" type="text" class="line-number-account" maxlength="1">
                                                            <input name="otp-code" type="text" class="line-number-account" maxlength="1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-account-row">
                                                <div class="receive-verify-code">
                                                    <p id="countdown-verify-end"><span class="day">0</span><span class="hour">0</span><span>: 2</span><span>58</span>
                                                        <i class="fa fa-clock-o"></i>
                                                    </p>
                                                    <p id="countdown"></p>
                                                </div>
                                            </div>
                                            <div class="account-footer">
                                                <div class="account-footer">
                                                    <div class="form-row-account">
                                                        <button class="btn btn-primary btn-login">تایید</button>
                                                    </div>
                                                </div>
                                            </div>
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

@push('scripts')
<script src="{{asset('assets/home/js/vendor/jquery.countdown.js')}}"></script>
<script>
    let opt_id;

    $('#auth-form').submit(function(event) {
        event.preventDefault();
        var form = $(this);

        $('#auth-form .btn-login').attr('disabled', true).append(
            '<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
        $.post("{{route('authenticate')}}", {
            '_token': "{{csrf_token()}}",
            'username': $('#username').val(),
        }, function(response, status) {
            if (response.message == 'need password') {
                form.hide();
                $('#login-with-pass').show('slow');
            } else if (response.message = 'code sended') {
                //show verfy code box
                form.hide();
                $('#verify-otp-code').show('slow');
                $('#verify-otp-code .message-sended').html(`برای شماره همراه ${$('#username').val()} کد تایید ارسال گردید`)
                opt_id = response.id;
                //set timer
                var secondsToAdd = response.time_to_expire;
                var currentDate = new Date();
                var futureDate = new Date(currentDate.getTime() + secondsToAdd * 1000);
                var $countdownOptionEnd = $("#countdown-verify-end");

                $countdownOptionEnd.countdown(futureDate, function(event) {
                    $(this).html(event.strftime('%M:%S'));
                }).on('finish.countdown', function() {
                    $(this).html("<a href='javascript:void(0)' onclick='resendOtp(event)' class='link-border-verify form-account-link'>ارسال مجدد</a>");
                });

                Swal.fire({
                    text: "کدتایید به شماره تلفن شما ارسال شد",
                    icon: 'success',
                    showConfirmButton: false,
                    position: 'top-right',
                    toast: true,
                    timer: 5000,
                    timerProgressBar: true,
                })
            }
        }, 'json').fail(function(response) {
            if (response.message) {
                Swal.fire({
                    text: response.message,
                    icon: 'error',
                    confirmButtonText: 'تایید',
                    timer: 6000,
                    timerProgressBar: true,
                })
            }
            if (response.responseJSON.errors.username) {
                $('#auth-form .username-error').html(response.responseJSON.errors.username[0]);
            } else {
                $('#auth-form .username-error').html('');
            }
        }).always(function() {
            $('#auth-form .btn-login').attr('disabled', false).find('span').remove();
        });

    });
    // verify otp code
    $('#verify-otp-code').submit(function(event) {
        event.preventDefault();
        $('#verify-otp-code .btn-login').attr('disabled', true).append(
            '<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');

        var form = $(this);
        var code = ''
        form.serializeArray().forEach(element => {
            code += element['value']
        });
        $.post("{{route('otp.verify')}}", {
                '_token': "{{csrf_token()}}",
                'opt_code': code,
                'id': opt_id,
            },
            function(response, status) {
                Swal.fire({
                    text: "خوش آمدید",
                    icon: 'success',
                    showConfirmButton: false
                });
                window.location.replace("{{Redirect::intended('/')->getTargetUrl()}}");

            }, 'json').fail(function(response) {
            if (response.responseJSON.errors.opt_code) {
                Swal.fire({
                    text: response.responseJSON.errors.opt_code[0],
                    icon: 'error',
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-right',
                    timer: 5000,
                    timerProgressBar: true,
                });
            }
            if (response.message) {
                Swal.fire({
                    text: response.message,
                    icon: 'error',
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-right',
                    timer: 5000,
                    timerProgressBar: true,
                })
            }
        }).always(function() {
            form.find('.btn-login').attr('disabled', false).find('span')
                .remove();
        });
    });
    // resend OTP code
    function resendOtp(event) {
        event.preventDefault();
        $(event.target).addClass("disable-click").append('<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
        $.post("{{route('otp.resend')}}", {
                '_token': "{{csrf_token()}}",
                'id': opt_id,
            },
            function(response, status) {
                //set timer
                var secondsToAdd = response.time_to_expire;
                var currentDate = new Date();
                var futureDate = new Date(currentDate.getTime() + secondsToAdd * 1000);
                var $countdownOptionEnd = $("#countdown-verify-end");

                $countdownOptionEnd.countdown(futureDate, function(event) {
                    $(this).html(event.strftime('%M:%S'));
                }).on('finish.countdown', function() {
                    $(this).html("<a href='javascript:void(0)' onclick='resendOtp(event)' class='link-border-verify form-account-link'>ارسال مجدد</a>");
                });
                //empty inputs
                $('#verify-otp-code :input').val('');
                // alert
                Swal.fire({
                    text: "کدتایید به شماره تلفن شما ارسال شد",
                    icon: 'success',
                    showConfirmButton: false,
                    position: 'top-right',
                    toast: true,
                    timer: 5000,
                    timerProgressBar: true,
                })
            }, 'json').fail(function(response) {
            if (response.message) {
                Swal.fire({
                    text: response.message,
                    icon: 'error',
                    confirmButtonText: 'تایید',
                    timer: 5000,
                    timerProgressBar: true,
                })
            }
        }).always(function() {
            $('#resendOtp').removeClass("disable-click").find('span').remove();
        });
    };
    // login with pass if user has password
    $('#login-with-pass').submit(function(event) {
        event.preventDefault();
        var form = $(this);

        $('#login-with-pass .btn-login').attr('disabled', true).append(
            '<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
        $.post("{{route('login')}}", {
            '_token': "{{csrf_token()}}",
            'username': $('#username').val(),
            'password': $('#password').val(),
            'remember': $('#remember').is(":checked") ? 1 : 0,

        }, function(response, status) {
            Swal.fire({
                text: "خوش آمدید",
                icon: 'success',
                showConfirmButton: false
            });
            window.location.replace(response.redirect);

        }, 'json').fail(function(response) {
            console.log(response.responseJSON.errors);

            if (response.responseJSON.errors.username) {
                $('#login-with-pass .username-error').html(response.responseJSON.errors.username[0]);
            } else {
                $('#login-with-pass .username-error').html('');
            }
            if (response.responseJSON.errors.password) {
                $('#login-with-pass .password-error').html(response.responseJSON.errors.password[0]);
            } else {
                $('#login-with-pass .password-error').html('');
            }
        }).always(function() {
            $('#login-with-pass .btn-login').attr('disabled', false).find('span').remove();
        });
    });
    // forget password and send otp code
    function forgetPassword(event) {
        $(event.target).addClass("disable-click").append(
            '<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');

        $.post("{{route('authenticate')}}", {
            '_token': "{{csrf_token()}}",
            'username': $('#username').val(),
            'forget_password': true
        }, function(response, status) {
            if (response.message = 'code sended') {
                //show verfy code box
                $('#login-with-pass').hide();
                $('#verify-otp-code').show('slow');
                $('#verify-otp-code .message-sended').html(`برای شماره همراه ${$('#username').val()} کد تایید ارسال گردید`)
                opt_id = response.id;
                //set timer
                var secondsToAdd = response.time_to_expire;
                var currentDate = new Date();
                var futureDate = new Date(currentDate.getTime() + secondsToAdd * 1000);
                var $countdownOptionEnd = $("#countdown-verify-end");

                $countdownOptionEnd.countdown(futureDate, function(event) {
                    $(this).html(event.strftime('%M:%S'));
                }).on('finish.countdown', function() {
                    $(this).html("<a href='javascript:void(0)' onclick='resendOtp(event)' class='link-border-verify form-account-link'>ارسال مجدد</a>");
                });

                Swal.fire({
                    text: "کدتایید به شماره تلفن شما ارسال شد",
                    icon: 'success',
                    showConfirmButton: false,
                    position: 'top-right',
                    toast: true,
                    timer: 6000,
                    timerProgressBar: true,
                })
            }
        }, 'json').fail(function(response) {
            if (response.message) {
                Swal.fire({
                    text: response.message,
                    icon: 'error',
                    confirmButtonText: 'تایید',
                    timer: 5000,
                    timerProgressBar: true,
                })
            }
            if (response.responseJSON.errors.username) {
                $('#auth-form .username-error').html(response.responseJSON.errors.username[0]);
            } else {
                $('#auth-form .username-error').html('');
            }
        }).always(function() {
            $(event.target).removeClass("disable-click").find('span').remove();
        });
    }

    $('#login-with-pass .return-btn').click(function() {
        $('#login-with-pass .password-error').html('');
        $('#login-with-pass .username-error').html('');
        $('#password').val('');

        $('#login-with-pass').hide();
        $('#auth-form').show('slow');
    })
    $('#verify-otp-code .return-btn').click(function() {
        $('#verify-otp-code').hide();
        $('#verify-otp-code :input').val('');
        $('#auth-form').show('slow');
    })
</script>
@endpush