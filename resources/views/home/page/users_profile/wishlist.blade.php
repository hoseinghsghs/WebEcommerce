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
                                <div class="table-favorites">
                                    <table class="table ns-table table-profile-favorites">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="50"> </th>
                                                <th scope="col">نام محصول</th>
                                                <th scope="col">قیمت</th>
                                                <th class="actions-th"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <div class="favorites-product-img">
                                                        <img src="assets/images/slider-product/Samsung-S10Plus.jpg">
                                                        <div class="product-rate">
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td>
                                                    <a href="#">سامسونگ گلکسی اس 10 پلاس – 128 گیگابایت – دو سیم
                                                        کارت</a>
                                                </td>
                                                <td>
                                                    <span class="amount">6,000,000
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                                <td class="text-left actions">
                                                    <a href="#" class="remove-product"><i class="mdi mdi-close"></i></a>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr>
                                                <th scope="row">
                                                    <div class="favorites-product-img">
                                                        <img src="assets/images/slider-product/asus-laptop.jpg">
                                                        <div class="product-rate">
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td>
                                                    <a href="#">لپ تاپ ایسوس زِنبوک 14</a>
                                                </td>
                                                <td>
                                                    <span class="amount">6,000,000
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                                <td class="text-left actions">
                                                    <a href="#" class="remove-product"><i class="mdi mdi-close"></i></a>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr>
                                                <th scope="row">
                                                    <div class="favorites-product-img">
                                                        <img src="assets/images/slider-product/Avocado.jpg">
                                                        <div class="product-rate">
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td>
                                                    <a href="#">آب میوه گیری پارس خزر مدل Avocado</a>
                                                </td>
                                                <td>
                                                    <span class="amount">6,000,000
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                                <td class="text-left actions">
                                                    <a href="#" class="remove-product"><i class="mdi mdi-close"></i></a>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr>
                                                <th scope="row">
                                                    <div class="favorites-product-img">
                                                        <img src="assets/images/slider-product/huawei.jpg">
                                                        <div class="product-rate">
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td>
                                                    <a href="#">هواوی پی 20 پرو 128 گیگابایت – دو سیم کارت</a>
                                                </td>
                                                <td>
                                                    <span class="amount">6,000,000
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                                <td class="text-left actions">
                                                    <a href="#" class="remove-product"><i class="mdi mdi-close"></i></a>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                        </tbody>
                                    </table>
                                    <div class="profile-recent-fav">
                                        <a href="#" class="img-profile-favorites">
                                            <img src="assets/images/slider-product/Samsung-S10Plus.jpg">
                                        </a>
                                        <div class="profile-recent-fav-col">
                                            <a href="#">سامسونگ گلکسی اس 10 پلاس – 128 گیگابایت – دو سیم کارت</a>
                                        </div>
                                        <div class="profile-recent-fav-price">
                                            <span class="amount">6,000,000
                                                <span>تومان</span>
                                            </span>
                                        </div>
                                        <div class="profile-recent-fav-remove">
                                            <a href="#"><i class="mdi mdi-close"></i></a>
                                        </div>
                                    </div>

                                    <div class="profile-recent-fav">
                                        <a href="#" class="img-profile-favorites">
                                            <img src="assets/images/slider-product/huawei.jpg">
                                        </a>
                                        <div class="profile-recent-fav-col">
                                            <a href="#">هواوی پی 20 پرو 128 گیگابایت – دو سیم کارت</a>
                                        </div>
                                        <div class="profile-recent-fav-price">
                                            <span class="amount">6,000,000
                                                <span>تومان</span>
                                            </span>
                                        </div>
                                        <div class="profile-recent-fav-remove">
                                            <a href="#"><i class="mdi mdi-close"></i></a>
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