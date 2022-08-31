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
                                <div class="profile-comment">
                                    <table class="table table-borderless table-profile-comment">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">نام محصول</th>
                                                <th scope="col">نظر</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="th-img">
                                                    <div class="thumb-img">
                                                        <a href="#">
                                                            <img src="assets/images/slider-product/SL1200_-300x300.jpg">
                                                        </a>
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
                                                    لپ تاپ چووی الترابوک 14 اینچ پرو
                                                </td>
                                                <td>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
                                                    در ستون و سطرآنچنان که لازم است</td>
                                                <td>
                                                    <span class="profile-comment-status-approved">تایید شده</span>
                                                </td>
                                                <td>
                                                    <button class="profile-comment-remove"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="th-img">
                                                    <div class="thumb-img">
                                                        <a href="#">
                                                            <img src="assets/images/slider-product/t-shirt-2.jpg">
                                                        </a>
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
                                                    تیشرت آستین بلند مردانه پاتیلوک طرح Killed مدل 330451
                                                </td>
                                                <td>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است.</td>
                                                <td>
                                                    <span class="profile-comment-status-approved">تایید شده</span>
                                                </td>
                                                <td>
                                                    <button class="profile-comment-remove"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="th-img">
                                                    <div class="thumb-img">
                                                        <a href="#">
                                                            <img src="assets/images/slider-product/camera-samsung.jpg">
                                                        </a>
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
                                                    دوربین دیجیتال سامسونگ مدل ST150F
                                                </td>
                                                <td>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </td>
                                                <td>
                                                    <span class="profile-comment-status-approved">تایید شده</span>
                                                </td>
                                                <td>
                                                    <button class="profile-comment-remove"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="profile-comment-thumb">
                                        <div class="profile-comment-img">
                                            <a href="#">
                                                <img src="assets/images/slider-product/SL1200_-300x300.jpg">
                                            </a>
                                        </div>
                                        <div class="product-rate">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                        </div>
                                        <div class="profile-comment-content">
                                            <h4>
                                                لپ تاپ چووی الترابوک 14 اینچ پرو
                                                <span class="profile-comment-status-review">تایید شده</span>
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
                                                    در ستون و سطرآنچنان که لازم است</p>
                                            </h4>
                                            <ul class="profile-comment-actions mb-0">
                                                <li>
                                                    <button class="profile-comment-remove"><i
                                                            class="fa fa-trash"></i></button>
                                                </li>
                                            </ul>
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