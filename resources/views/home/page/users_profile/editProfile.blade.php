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
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="profile-address">
                                    <div class="middle-container">
                                        <form action="#" class="form-checkout">
                                            <div class="form-checkout-row">
                                                <label for="namefirst">نام <abbr class="required" title="ضروری"
                                                        style="color:red;">*</abbr></label>
                                                <input type="text" id="namefirst"
                                                    class="input-namefirst-checkout form-control">

                                                <label for="namelast">نام خانوادگی <abbr class="required" title="ضروری"
                                                        style="color:red;">*</abbr></label>
                                                <input type="text" id="namelast"
                                                    class="input-namelast-checkout form-control">

                                                <label for="email">ایمیل <abbr class="required" title="ضروری"
                                                        style="color:red;">*</abbr></label>
                                                <input type="text" id="email" class="input-email-checkout form-control">

                                                <label for="password">رمز عبور قبلی <abbr class="required" title="ضروری"
                                                        style="color:red;">*</abbr></label>
                                                <input type="text" id="password"
                                                    class="input-password-checkout form-control">

                                                <label for="password">رمز عبور جدید <abbr class="required" title="ضروری"
                                                        style="color:red;">*</abbr></label>
                                                <input type="text" id="password"
                                                    class="input-password-checkout form-control">

                                                <label for="password">تکرار رمز عبور جدید <abbr class="required"
                                                        title="ضروری" style="color:red;">*</abbr></label>
                                                <input type="text" id="password"
                                                    class="input-password-checkout form-control">

                                                <div class="AR-CR">
                                                    <button class="btn-registrar"> ثبت تغییرات </button>
                                                    <a href="#" class="cancel-edit-address" data-dismiss="modal"
                                                        aria-label="Close">بازگشت</a>
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



@endsection

@push('scripts')
<script>
function send(product) {
    let url =
        window.location.origin +
        "/profile/add-to-wishlist" +
        "/" + [product];
    console.log(url);

    $.get(url,
        function(response, status) {
            if (response.errors == 'deleted') {
                $("#" + product + "-wish").hide();
                $.notify("ملک از لیست علاقه مندی ها حذف شد", "info", {
                    position: "tap",
                });
            }
        }).fail(function() {
        console.log(status)
    })
}
</script>