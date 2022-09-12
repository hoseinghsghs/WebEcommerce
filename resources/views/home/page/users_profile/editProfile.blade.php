@extends('home.layout.MasterHome')
@section('title' , 'پروفایل کاربری - علاقه مندی ها')
@section('content')
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    @include('home.page.users_profile.partial.right_side')
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <h5 class="text-secondary">ویرایش اطلاعات:</h5>
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="profile-address">
                                    <div class="middle-container">
                                        <form action="#" class="form-checkout">
                                            <div class="form-checkout-row">
                                                <label for="fullname">نام و نام خانوادگی</label>
                                                <input type="text" id="fullname" class="input-namefirst-checkout form-control" value="{{old('name')??$user->name}}">

                                                <label for="cellphone">شماره موبایل<abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                <div class="input-group mb-3">
                                                    <input class="form-control" aria-label="شماره تماس" aria-describedby="button-addon2" value="{{$user->cellphone}}" disabled readonly>
                                                    <button class="btn btn-outline-info" type="button" id="button-addon2" data-toggle="modal" data-target="#sendOtpModal"><small>ویرایش</small></button>
                                                </div>
                                                <!-- <input type="text"  class="input-namelast-checkout form-control" value="{{$user->cellphone}}"> -->

                                                <label for="email">ایمیل</label>
                                                <input type="email" id="email" class="input-email-checkout form-control" value="{{$user->email}}">
                                                <div class="AR-CR">
                                                    <button class="btn-registrar">ذخیره</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <form action="{{route('user-password.update')}}" method="POST" class="form-checkout">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-checkout-row">
                                                @isset($user->password)
                                                <label for="password">رمز عبور قبلی <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                <input type="password" name="current_password" id="password" class="@error('current_password','updatePassword') is-invalid @enderror input-password-checkout form-control ">
                                                @endisset
                                                <label for="password">رمز عبور جدید <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                <input type="password" name="password" id="password" class="input-password-checkout form-control @error('password','updatePassword') is-invalid @enderror">

                                                <label for="password">تکرار رمز عبور جدید <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                <input type="password" name="password_confirmation" id="password" class="input-password-checkout form-control @error('password_confirmation','updatePassword') is-invalid @enderror">

                                                <div class="AR-CR">
                                                    <button type="submit" class="btn-registrar">تغییر</button>
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
                                    <div class="receive-verify-code text-muted">
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
</div>
<!-- end verify phone number modal -->
@endsection

@push('scripts')
<script src="{{asset('assets/home/js/vendor/jquery.countdown.js')}}"></script>
<script>
    @if(session('status'))

    @if(session('status') == "profile-information-updated")
    Swal.fire({
        text: "حساب کاربری با موفقیت ویرایش شد",
        icon: 'success',
        showConfirmButton: false,
        toast: true,
        position: 'top-right',
        timer: 5000,
        timerProgressBar: true,
    })
    @else
    Swal.fire({
        text: "{{ session('status') }}",
        icon: 'success',
        showConfirmButton: false,
        toast: true,
        position: 'top-right',
        timer: 5000,
        timerProgressBar: true,
    })
    @endif
    @endif

    let opt_id;
    // get phone number
    $('#get-phone-form').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        $('#get-phone-form button[type="submit"]').attr('disabled', true).append('<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
        var phone = $('#phone').val();
        $.post("{{route('phone.update')}}", {
                '_token': "{{csrf_token()}}",
                'phone': phone,
            },
            function(response, status) {
                opt_id = response.id;
                form.hide();
                $('#verify-otp-code').show('slow');
                $('#verify-otp-code .message-sended').html(`برای شماره همراه ${$('#phone').val()} کد تایید ارسال گردید`)
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

            }, 'json').fail(function(response) {

            if (response.responseJSON.errors.phone) {
                $('#get-phone-form input').addClass("is-invalid");
                $('#get-phone-form .invalid-feedback').html(response.responseJSON.errors.phone[0]);
            } else {
                $('#get-phone-form input').removeClass('is-invalid');
                $('#get-phone-form .invalid-feedback').html('');
            }
            if (response.message) {
                Swal.fire({
                    text: response.message,
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
        $.post("{{route('phone.verify')}}", {
                '_token': "{{csrf_token()}}",
                'otp_code': code,
                'id': opt_id,
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
</script>
@endpush
