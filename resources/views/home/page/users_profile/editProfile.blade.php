@extends('home.layout.MasterHome')
@section('title' , 'پروفایل کاربری - اطلاعات حساب')
@section('content')
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    @include('home.page.users_profile.partial.right_side')
                    <div class="col-lg-9 col-12 pl">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="text-secondary">ویرایش اطلاعات:</h5>
                                <div class="profile-content">
                                    <div class="profile-stats">
                                        <div class="profile-address">
                                            <div class="middle-container">
                                                @if ($errors->updateProfileInformation->any())
                                                    <div class="alert alert-danger mt-3">
                                                        <ul>
                                                            @foreach ($errors->updateProfileInformation->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form action="{{route('user-profile-information.update')}}" method="POST"
                                                      class="form-checkout">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-checkout-row">
                                                        <label for="fullname">نام و نام خانوادگی</label>
                                                        <input type="text" id="fullname" name="name"
                                                               class="input-namefirst-checkout form-control @error('name','updateProfileInformation') is-invalid @enderror"
                                                               value="{{old('name')??$user->name}}">

                                                        <label>شماره موبایل<abbr class="required" title="ضروری"
                                                                                 style="color:red;">*</abbr></label>
                                                        <div class="input-group mb-3">
                                                            <input class="form-control" aria-label="شماره تماس"
                                                                   value="{{$user->cellphone}}" disabled readonly>
                                                            <button class="btn btn-outline-info" type="button" id="cellphone"
                                                                    data-toggle="modal"
                                                                    data-target="#sendOtpModal"><small>ویرایش</small></button>
                                                        </div>
                                                        @if($user->email_verified_at)
                                                            <label for="email">ایمیل<span class="badge badge-success p-1 mr-1">تایید
                                                        شده</span></label>
                                                            <input type="email" name="email" id="email"
                                                                   class="input-email-checkout form-control @error('email','updateProfileInformation') is-invalid @enderror"" value="
                                                            {{$user->email}}">
                                                        @elseif ($user->email)
                                                            <label>ایمیل<span class="badge badge-warning p-1 mr-1">تایید
                                                        نشده</span></label>
                                                            <div class="input-group mb-3">
                                                                <input type="email" name="email"
                                                                       class="input-email-checkout form-control @error('email','updateProfileInformation') is-invalid @enderror"" value="
                                                                {{$user->email}}">
                                                                <button class="btn btn-outline-info" type="button"
                                                                        onclick="verifyEmail(event)"><small>تایید ایمیل</small></button>
                                                            </div>
                                                        @else
                                                            <label for="email">ایمیل</label>
                                                            <input type="email" name="email" id="email"
                                                                   class="input-email-checkout form-control @error('email','updateProfileInformation') is-invalid @enderror"" value="
                                                            {{$user->email}}">
                                                        @endif
                                                        <div class="AR-CR">
                                                            <button class="btn-registrar">ذخیره</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="text-secondary">@empty($user->password)ثبت رمزعبور@elseتغییر رمزعبور:@endempty</h5>
                                <div class="profile-content">
                                    <div class="profile-stats">
                                        <div class="profile-address">
                                            <div class="middle-container">
                                                @if ($errors->updatePassword->any())
                                                    <div class="alert alert-danger mt-3">
                                                        <ul>
                                                            @foreach ($errors->updatePassword->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form action="{{route('user-password.update')}}" method="POST"
                                                      class="form-checkout">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-checkout-row">
                                                        @isset($user->password)
                                                            <label for="current_password">رمز عبور فعلی<abbr class="required"
                                                                                                             title="ضروری" style="color:red;">*</abbr><a href="#"
                                                                                                                                                         style="border-bottom: 1px blue dashed;" class="float-left"
                                                                                                                                                         data-toggle="modal" data-target="#resetModal">فراموشی
                                                                    رمزعبور</a></label>
                                                            <input type="password" name="current_password" id="current_password"
                                                                   class="@error('current_password','updatePassword') is-invalid @enderror input-password-checkout form-control">
                                                        @endisset
                                                        <label for="password">رمز عبور جدید<abbr class="required" title="ضروری"
                                                                                                 style="color:red;">*</abbr></label>
                                                        <input type="password" name="password" id="password"
                                                               class="input-password-checkout form-control @error('password','updatePassword') is-invalid @enderror">

                                                        <label for="password_confirmation">تکرار رمز عبور جدید<abbr
                                                                class="required" title="ضروری"
                                                                style="color:red;">*</abbr></label>
                                                        <input type="password" name="password_confirmation"
                                                               id="password_confirmation"
                                                               class="input-password-checkout form-control @error('password_confirmation','updatePassword') is-invalid @enderror">

                                                        <div class="AR-CR">
                                                            <button type="submit" class="btn-registrar">ذخیره</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- verify phone number modal -->
<div class="modal fade" id="sendOtpModal" tabindex="-1" aria-labelledby="sendOtpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ثبت تلفن همراه</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="verify-phone-modal">
                <div class="Login-to-account">
                    <div class="account-box-content">
                        <!-- enter phone number -->
                        <form id="get-phone-form" autocomplete="off" class="form-account text-center">
                            <div class="form-account-title text-right">
                                <label for="cellphone">شماره موبایل:</label>
                                <input type="number" class="number-email-input form-control" id="phone" name="phone">
                                <div class="invalid-feedback pr-2"></div>
                            </div>
                            <div class="form-row-account">
                                <button type="submit" class="btn btn-primary btn-login">تایید</button>
                            </div>
                        </form>
                        <!-- enter otp code -->
                        <form id="verify-otp-code" style="display: none;" autocomplete="off">
                            <div class="message-light">
                                <div class="massege-light-send">
                                    <div class="message-sended"></div>
                                </div>
                                <div class="account-box-verify-content">
                                    <div class="form-account">
                                        <div class="form-account-title">کد فعال سازی پیامک شده را وارد کنید</div>
                                        <div class="form-account-row">
                                            <div class="lines-number-input">
                                                <input name="otp-code" type="text" class="line-number-account"
                                                    maxlength="1">
                                                <input name="otp-code" type="text" class="line-number-account"
                                                    maxlength="1">
                                                <input name="otp-code" type="text" class="line-number-account"
                                                    maxlength="1">
                                                <input name="otp-code" type="text" class="line-number-account"
                                                    maxlength="1">
                                                <input name="otp-code" type="text" class="line-number-account"
                                                    maxlength="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-account-row">
                                    <div class="receive-verify-code text-muted">
                                        <p id="countdown-verify-end"><span class="day">0</span><span
                                                class="hour">0</span><span>: 2</span><span>58</span>
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
</div>
<!-- end verify phone number modal -->
<div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">بازیابی رمزعبور</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="verify-phone-modal">
                <div class="Login-to-account">
                    <div class="account-box-content">
                        <!-- enter phone number -->
                        <form id="forget-password-form" autocomplete="off" class="form-account text-center">
                            <div class="form-account-title text-right">
                                <label for="cellphone"> ایمیل/موبایل:</label>
                                <input type="text" id="username" class="number-email-input form-control"
                                    placeholder="لطفا ایمیل یا شماره  موبایل خود را وارد کنید"
                                    oninvalid="this.setCustomValidity('این فیلد الزامی است')"
                                    oninput="this.setCustomValidity('')" required>
                                <div class="invalid-feedback pr-2"></div>
                            </div>
                            <div class="form-row-account">
                                <button type="submit" class="btn btn-primary btn-login">تایید</button>
                            </div>
                        </form>
                        <!-- enter otp code -->
                        <form id="verify-otp-code-reset" style="display: none;" autocomplete="off">
                            <div class="message-light">
                                <div class="massege-light-send">
                                    <div class="message-sended"></div>
                                </div>
                                <div class="account-box-verify-content">
                                    <div class="form-account">
                                        <div class="form-account-title">کد فعال سازی پیامک شده را وارد کنید</div>
                                        <div class="form-account-row">
                                            <div class="lines-number-input">
                                                <input name="otp-code" type="text" class="line-number-account"
                                                    maxlength="1">
                                                <input name="otp-code" type="text" class="line-number-account"
                                                    maxlength="1">
                                                <input name="otp-code" type="text" class="line-number-account"
                                                    maxlength="1">
                                                <input name="otp-code" type="text" class="line-number-account"
                                                    maxlength="1">
                                                <input name="otp-code" type="text" class="line-number-account"
                                                    maxlength="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-account-row">
                                    <div class="receive-verify-code text-muted">
                                        <p id="countdown-verify-reset"><span class="day">0</span><span
                                                class="hour">0</span><span>: 2</span><span>58</span>
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
                        <form id="reset-password" class="form-account text-center" style="display: none;">
                            @csrf
                            <h4>تغییر رمزعبور</h4>
                            <div class="form-account-title text-right">
                                <label>رمز عبور<abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                <input type="password" class="number-email-input form-control" name="password">
                                <div class="invalid-feedback pr-2 password-error"></div>
                            </div>
                            <div class="form-account-title text-right">
                                <label>تکرار رمز عبور <abbr class="required" title="ضروری"
                                        style="color:red;">*</abbr></label>
                                <input type="password" class="number-email-input form-control"
                                    name="password_confirmation">
                                <div class="invalid-feedback pr-2 password_confirmation-error"></div>
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
</div>
@endsection
@push('scripts')
<script src="{{asset('assets/home/js/vendor/jquery.countdown.js')}}"></script>
<script>
let otp_id;
// send otp code for change phone
$('#get-phone-form').submit(function(event) {
    event.preventDefault();
    var form = $(this);
    $('#get-phone-form button[type="submit"]').attr('disabled', true).append(
        '<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
    var phone = $('#phone').val();
    $.post("{{route('phone.update')}}", {
            '_token': "{{csrf_token()}}",
            'phone': phone,
        },
        function(response, status) {
            otp_id = response.id;
            form.hide();
            $('#verify-otp-code').show('slow');
            $('#verify-otp-code .message-sended').html(
                `برای شماره همراه <strong>${$('#phone').val()}</strong> کد تایید ارسال گردید`)
            //set timer
            var secondsToAdd = response.time_to_expire;
            var currentDate = new Date();
            var futureDate = new Date(currentDate.getTime() + secondsToAdd * 1000);
            var $countdownOptionEnd = $("#countdown-verify-end");
            $countdownOptionEnd.countdown(futureDate, function(event) {
                $(this).html(event.strftime('%M:%S'));
            }).on('finish.countdown', function() {
                $(this).html(
                    `<a href='javascript:void(0)' onclick='resendOtp(event,"countdown-verify-end")' class='link-border-verify form-account-link'>ارسال مجدد</a>`
                );
            });
            Swal.fire({
                text: "کد تایید به تلفن همراه شما ارسال شد",
                icon: 'success',
                showConfirmButton: false,
                position: 'top-right',
                toast: true,
                timer: 5000,
                timerProgressBar: true,
            })
        }, 'json').fail(function(response) {
        if (response.responseJSON.errors.phone) {
            $('#get-phone-form input').addClass("is-invalid");
            $('#get-phone-form .invalid-feedback').html(response.responseJSON.errors.phone[0]);
        } else {
            $('#get-phone-form input').removeClass('is-invalid');
            $('#get-phone-form .invalid-feedback').html('');
        }
        if (response.responseJSON.error) {
            Swal.fire({
                text: response.responseJSON.error,
                icon: 'error',
                confirmButtonText: 'تایید',
                timer: 6000,
                timerProgressBar: true,
            })
        }
    }).always(function() {
        $('#get-phone-form button[type="submit"]').attr('disabled', false).find('span').remove();
    });
});
// verify otp code to change phone
$('#verify-otp-code').submit(function(event) {
    event.preventDefault();
    $('#verify-otp-code .btn-login').attr('disabled', true).append(
        '<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
    var form = $(this);
    var code = ''
    form.serializeArray().forEach(element => {
        code += element['value']
    });
    $.post("{{route('phone.verify')}}", {
            '_token': "{{csrf_token()}}",
            'otp_code': code,
            'id': otp_id,
        },
        function(response, status) {
            window.location.replace("{{route('home.user_profile.edit')}}");
        }, 'json').fail(function(response) {
        if (response.responseJSON.errors.otp_code) {
            Swal.fire({
                text: response.responseJSON.errors.otp_code[0],
                icon: 'error',
                showConfirmButton: false,
                toast: true,
                position: 'top-right',
                timer: 5000,
                timerProgressBar: true,
            });
        }
        if (response.responseJSON.error) {
            Swal.fire({
                text: response.responseJSON.error,
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
function resendOtp(event, counterId) {
    event.preventDefault();
    $(event.target).addClass("disable-click").append('<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
    $.post("{{route('otp.resend')}}", {
            '_token': "{{csrf_token()}}",
            'id': otp_id,
        },
        function(response, status) {
            //set timer
            var secondsToAdd = response.time_to_expire;
            var currentDate = new Date();
            var futureDate = new Date(currentDate.getTime() + secondsToAdd * 1000);
            var $countdownOptionEnd = $("#" + counterId);
            $countdownOptionEnd.countdown(futureDate, function(event) {
                $(this).html(event.strftime('%M:%S'));
            }).on('finish.countdown', function() {
                $(this).html(
                    `<a href='javascript:void(0)' onclick='resendOtp(event,"${counterId}")' class='link-border-verify form-account-link'>ارسال مجدد</a>`
                );
            });
            //empty inputs
            $('#verify-otp-code :input').val('');
            // alert
            Swal.fire({
                text: "کد تایید به شماره تلفن شما ارسال شد",
                icon: 'success',
                showConfirmButton: false,
                position: 'top-right',
                toast: true,
                timer: 5000,
                timerProgressBar: true,
            })
        }, 'json').fail(function(response) {
        if (response.responseJSON.id) {
            Swal.fire({
                text: response.responseJSON.id,
                icon: 'error',
                confirmButtonText: 'تایید',
                timer: 5000,
                timerProgressBar: true,
            })
        }
        if (response.responseJSON.error) {
            Swal.fire({
                text: response.responseJSON.error,
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
// verify email
function verifyEmail(event) {
    $(event.target).attr('disabled', true).append('<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
    $.post("{{ route('verification.send') }}", {
        '_token': "{{csrf_token()}}"
    }, function(response, status) {
        Swal.fire({
            title: 'لینک ارسال شد',
            text: 'ایمیل خود(اسپم) را بررسی کنید و بر روی لینک تایید ایمیل کلیک کنید.',
            icon: 'success',
            confirmButtonText: 'تایید',
        })
    }).fail(function(response) {
        Swal.fire({
            text: "خطا در ارسال لینک",
            icon: 'error',
            confirmButtonText: 'تایید',
            timer: 5000,
            timerProgressBar: true,
        })
    }).always(function() {
        $(event.target).attr('disabled', false).find('span').remove();
    })
}
// forget password
$('#forget-password-form').submit(function(event) {
    event.preventDefault();
    $('#forget-password-form .btn-login').attr('disabled', true).append(
        '<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
    var input = $('#forget-password-form input').val();
    var form = $(this);
    if (isNaN(input)) {
        $.post("{{route('password.email')}}", {
                '_token': "{{csrf_token()}}",
                'email': input,
            },
            function(response, status) {
                $('#forget-password-form input').removeClass('is-invalid');
                $('#forget-password-form .invalid-feedback').html('');
                $('#resetModal').modal('hide');
                Swal.fire({
                    title: 'لینک ارسال شد',
                    text: 'ایمیل خود را باز کنید و روی لینک بازیابی رمز عبور کلیک کنید.',
                    icon: 'success',
                    confirmButtonText: 'تایید',
                })
            }, 'json').fail(function(response) {
            if (response.responseJSON.errors.email) {
                $('#forget-password-form input').addClass("is-invalid");
                $('#forget-password-form .invalid-feedback').html(response.responseJSON.errors.email[
                    0]);
            } else {
                $('#forget-password-form input').removeClass('is-invalid');
                $('#forget-password-form .invalid-feedback').html('');
            }
        }).always(function() {
            form.find('.btn-login').attr('disabled', false).find('span')
                .remove();
        });
    } else {
        var username = $('#username').val();
        $.post("{{route('authenticate')}}", {
                '_token': "{{csrf_token()}}",
                'username': username,
                'forget_password': true
            },
            function(response, status) {
                otp_id = response.id;
                form.hide();
                $('#verify-otp-code-reset').show('slow');
                $('#verify-otp-code-reset .message-sended').html(
                    `برای شماره همراه <strong>${username}</strong> کد تایید ارسال گردید`)
                //set timer
                var secondsToAdd = response.time_to_expire;
                var currentDate = new Date();
                var futureDate = new Date(currentDate.getTime() + secondsToAdd * 1000);
                var $countdownOptionEnd = $("#countdown-verify-reset");
                $countdownOptionEnd.countdown(futureDate, function(event) {
                    $(this).html(event.strftime('%M:%S'));
                }).on('finish.countdown', function() {
                    $(this).html(
                        `<a href='javascript:void(0)' onclick='resendOtp(event,"countdown-verify-reset")' class='link-border-verify form-account-link'>ارسال مجدد</a>`
                    );
                });
                Swal.fire({
                    text: "کد تایید به تلفن همراه شما ارسال شد",
                    icon: 'success',
                    showConfirmButton: false,
                    position: 'top-right',
                    toast: true,
                    timer: 5000,
                    timerProgressBar: true,
                })
            }, 'json').fail(function(response) {
            if (response.responseJSON.errors && response.responseJSON.errors.username) {
                $('#forget-password-form input').addClass("is-invalid");
                $('#forget-password-form .invalid-feedback').html(response.responseJSON.errors.username[
                    0]);
            } else {
                $('#forget-password-form input').removeClass('is-invalid');
                $('#forget-password-form .invalid-feedback').html('');
            }
            if (response.responseJSON.error) {
                Swal.fire({
                    text: response.responseJSON.error,
                    icon: 'error',
                    confirmButtonText: 'تایید',
                    timer: 6000,
                    timerProgressBar: true,
                })
            }
        }).always(function() {
            $('#forget-password-form  button[type="submit"]').attr('disabled', false).find('span')
                .remove();
        });
    }
});
$('#verify-otp-code-reset').submit(function(event) {
    event.preventDefault();
    $('#verify-otp-code-reset .btn-login').attr('disabled', true).append(
        '<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
    var form = $(this);
    var code = ''
    form.serializeArray().forEach(element => {
        code += element['value']
    });
    $.post("{{route('otp.verify')}}", {
            '_token': "{{csrf_token()}}",
            'otp_code': code,
            'id': otp_id,
            'forget_password': true
        },
        function(response, status) {
            form.hide();
            $('#reset-password').show('slow');
        }, 'json').fail(function(response) {
        if (response.responseJSON.errors && response.responseJSON.errors.otp_code) {
            Swal.fire({
                text: response.responseJSON.errors.otp_code[0],
                icon: 'error',
                showConfirmButton: false,
                toast: true,
                position: 'top-right',
                timer: 5000,
                timerProgressBar: true,
            });
        }
        if (response.responseJSON.error) {
            Swal.fire({
                text: response.responseJSON.error,
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
$('#reset-password').submit(function(event) {
    event.preventDefault();
    $('#reset-password .btn-reset').attr('disabled', true).append(
        '<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
    var form = $(this);
    $.post("{{route('otp.resetPassword')}}", {
            '_token': "{{csrf_token()}}",
            'password': $('#reset-password input[name=password]').val(),
            'password_confirmation': $('#reset-password input[name=password_confirmation]').val(),
            'cellphone': $('#username').val()
        },
        function(response, status) {
            window.location.replace("{{url()->full()}}");
        }, 'json').fail(function(response) {
        if (response.responseJSON.errors && response.responseJSON.errors.password) {
            $('#reset-password input[name=password]').addClass("is-invalid");
            $('#reset-password .invalid-feedback.password-error').html(response.responseJSON.errors
                .password[0]);
        } else {
            $('#reset-password input[name=password]').removeClass('is-invalid');
            $('#reset-password .invalid-feedback.password-error').html('');
        }
        if (response.responseJSON.errors && response.responseJSON.errors.password_confirmation) {
            $('#reset-password input[name=password_confirmation]').addClass("is-invalid");
            $('#reset-password .invalid-feedback.password_confirmation-error').html(response
                .responseJSON.errors.password_confirmation[0]);
        } else {
            $('#reset-password input[name=password_confirmation]').removeClass('is-invalid');
            $('#reset-password .invalid-feedback.password_confirmation-error').html('');
        }
        if (response.responseJSON.error) {
            Swal.fire({
                text: response.responseJSON.error,
                icon: 'error',
                showConfirmButton: false,
                toast: true,
                position: 'top-right',
                timer: 5000,
                timerProgressBar: true,
            })
        }
    }).always(function() {
        form.find('.btn-reset').attr('disabled', false).find('span')
            .remove();
    });
});
</script>
@endpush
