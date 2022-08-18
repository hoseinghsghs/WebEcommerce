@extends('home.layout.MasterHome')
@section('title','ورود')
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
                            <div class="Login-to-account mt-4">
                                <div class="account-box-content">
                                    <!-- auth form -->
                                    <form id="auth-form" class="form-account text-right">
                                        <h4>ورود / ثبت نام</h4>
                                        <div class="form-account-title">
                                            <label for="username">نام کاربری:</label>
                                            <input type="text" class="number-email-input" placeholder="شماره موبایل یا ایمیل" id="username" name="username">
                                            <small class="text-danger font-weight-bold pr-2 username-error d-block"></small>
                                        </div>
                                        <div class="form-row-account text-center">
                                            <button class="btn btn-primary btn-login">تایید</button>
                                        </div>
                                    </form>
                                    <!-- enter password -->
                                    <form id="login-with-pass" class="form-account text-right" style="display: none;">
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
                                            <label for="remember" class="remember-me mr-0">مرا به خاطر بسپار</label>
                                        </div>
                                        <div class="form-row-account">
                                            <button class="btn bg-secondary text-light ml-md-2" id="return-btn" type="button">بازگشت</button>
                                            <button class="btn btn-primary btn-login" type="submit">ورود</button>
                                        </div>
                                    </form>
                                    <!-- enter otp code -->
                                    <form id="verify-otp-code" style="display: none;">
                                        <div class="message-light">
                                            <div class="massege-light-send">
                                                <div class="form-edit-number">
                                                    <a href="{{route('login')}}" class="edit-number-link">ویرایش شماره</a>
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
                                                        <p class="text-danger font-weight-bold code-error"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-account-row">
                                                <div class="receive-verify-code">
                                                    <p id="countdown-verify-end"><span class="day">0</span><span class="hour">0</span><span>: 2</span><span>58</span>
                                                        <i class="fa fa-clock-o"></i>
                                                    </p>
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
<script src="{{asset('assets/home/js/vendor/countdown.min.js')}}"></script>
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
                $('#verify-otp-code .massege-light-send').prepend(`برای شماره همراه ${$('#username').val()} کد تایید ارسال گردید`)
                opt_id = response.id;
                //set timer
                var secondsToAdd = response.time_to_expire;
                var currentDate = new Date();
                var futureDate = new Date(currentDate.getTime() + secondsToAdd * 1000);
                var $countdownOptionEnd = $("#countdown-verify-end");
                $countdownOptionEnd.countdown({
                    date: futureDate,
                    text: '<span class="day">%s</span><span class="hour">%s</span><span>: %s</span><span>%s</span>',
                    end: function end() {
                        $countdownOptionEnd.html("<a href='' class='link-border-verify form-account-link'>ارسال مجدد</a>");
                    }
                });
                Swal.fire({
                    text: "کدتایید به شماره تلفن شما ارسال شد",
                    icon: 'success',
                    confirmButtonText: 'تایید',
                    toast: true,
                    position: 'top-right',
                    timer: 5000,
                    timerProgressBar: true,
                    customClass: {
                        confirmButton: 'content-end'
                    }
                })
            }

        }, 'json').fail(function(response) {
            if (response.message) {
                Swal.fire({
                    text: response.message,
                    icon: 'error',
                    confirmButtonText: 'تایید',
                    toast: true,
                    position: 'top-right',
                    customClass: {
                        confirmButton: 'content-end'
                    },
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

    $('#verify-otp-code').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        form.find('btn-login').attr('disabled', true).append(
            '<span class="ml-1"><i class="w-icon-store-seo fa-spin"></i></span>');
        var code = ''
        form.serializeArray().forEach(element => {
            code += element['value']
        });
        $.post("{{route('otp.verify')}}", {
                '_token': "{{csrf_token()}}",
                'code': code,
                'id': opt_id,
            },
            function(response, status) {
                Swal.fire({
                    text: "خوش آمدید",
                    icon: 'success',
                    showConfirmButton: false
                });
                window.location.replace("{{request()->fullUrl()}}");

            }, 'json').fail(function(response) {
            console.log(response.responseJSON.errors);

            if (response.responseJSON.errors.code) {
                Swal.fire({
                    text: response.responseJSON.errors.code[0],
                    icon: 'error',
                    confirmButtonText: 'تایید',
                    toast: true,
                    position: 'top-right',
                });
                $('#verify-otp-code .code-error').html(response.responseJSON.errors.code[
                    0]);
            }
            if (response.message) {
                Swal.fire({
                    text: response.message,
                    icon: 'error',
                    confirmButtonText: 'تایید',
                    toast: true,
                    position: 'top-right',
                    customClass: {
                        confirmButton: 'content-end'
                    }
                })
            }
        }).always(function() {
            form.find('btn-login').attr('disabled', false).find('span')
                .remove();
        });
    });

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
    $('#return-btn').click(function() {
        $('#login-with-pass .password-error').html('');
        $('#login-with-pass .username-error').html('');
        $('#password').val('');

        $('#login-with-pass').hide();
        $('#auth-form').show('slow');
    })
</script>
@endpush