@extends('home.layout.MasterHome')
@section('title','خانه')

@section('content')
@include('home.partial.SliderMain')
@include('home.partial.Adplacement')

<!-- slidre-product------------------------>
<!-- محصولات شگفت انگیز -->
<section class="section-slider amazing-section pt-3">
    <div class="container-amazing col-12">
        <div class="col-lg-3 display-md-none pull-right">
            <div class="amazing-product text-center">
                <a href="#">
                    <img src="assets/home/images/slider-amazing/shopping-cart.svg" alt="">
                </a>
                <h3 class="amazing-heading-title amazing-size-default">محصولات شگفت انگیز</h3>

            </div>
        </div>
        <div class="col-lg-9 col-md-12 pull-left">
            <div class="slider-widget-products mb-0">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">محصولات شگفت انگیز</span>
                        <h3 class="card-title">مشاهده همه</h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 827px;">

                                @each('home.components.ProductCart1', $Products_special,
                                'Product_special')

                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation"
                                class="owl-prev disabled">&#10094</button><button type="button" role="presentation"
                                class="owl-next">
                                &#10095</button>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  پایان محصولات شگفت انگیز -->

<div class="container-main">
    <div class="d-block">
        <div class="col-lg-9 col-md-9 col-xs-12 pr order-1 d-block">
            <div class="slider-widget-products">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">دوربین</span>
                        <h3 class="card-title"></h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/camera-canon-4000D.jpg"
                                                class="img-fluid" alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                دوربین دیجیتال کانن مدل EOS 4000D به همراه لنز 18-55 میلی متر IS II
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۱۲,۰۰۰,۰۰<span>تومان</span></span></del>
                                            <ins><span>۱۰,۵۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @each('home.components.ProductCart1', $Products_special,
                                'Product_special')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-6 pr">
                                    <div class="thum-img">
                                        <div class="widget widget-product card mb-0">
                                            <div
                                                class="product-carousel-more owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage"
                                                        style="transform: translate3d(1652px, 0px, 0px); transition: all 0.25s ease 0s; width: 2065px;">
                                                        <div class="owl-item" style="width: 403px; margin-left: 10px;">
                                                            <div class="item">
                                                                <a href="#" class="d-block hover-img-link"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <div class="zoom-box">
                                                                        <img src="assets/home/images/slider-product/computer-appel.jpg"
                                                                            width="200" height="150" />
                                                                        <div class="discount-m">
                                                                            <span>10%</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item" style="width: 403px; margin-left: 10px;">
                                                            <div class="item">
                                                                <a href="#" class="d-block hover-img-link"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <div class="zoom-box">
                                                                        <img src="assets/home/images/slider-product/computer-appel.jpg"
                                                                            width="200" height="150" />
                                                                        <div class="discount-m">
                                                                            <span>10%</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item" style="width: 403px; margin-left: 10px;">
                                                            <div class="item">
                                                                <a href="#" class="d-block hover-img-link"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <div class="zoom-box">
                                                                        <img src="assets/home/images/slider-product/computer-appel.jpg"
                                                                            width="200" height="150" />
                                                                        <div class="discount-m">
                                                                            <span>10%</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item" style="width: 403px; margin-left: 10px;">
                                                            <div class="item">
                                                                <a href="#" class="d-block hover-img-link"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <div class="zoom-box">
                                                                        <img src="assets/home/images/slider-product/computer-appel.jpg"
                                                                            width="200" height="150" />
                                                                        <div class="discount-m">
                                                                            <span>10%</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item active"
                                                            style="width: 403px; margin-left: 10px;">
                                                            <div class="item">
                                                                <a href="#" class="d-block hover-img-link"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <div class="zoom-box">
                                                                        <img src="assets/home/images/slider-product/computer-appel.jpg"
                                                                            width="200" height="150" />
                                                                        <div class="discount-m">
                                                                            <span>10%</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 pr">
                                    <div class="product-box-modal-title">
                                        <h2 class="post-title">
                                            <a href="#">
                                                کامپیوتر همه کاره 27 اینچی اپل مدل iMac CTO - A 2019 با صفحه نمایش
                                                رتینا 5K
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="small-gutters align-items-stretch mb-4">
                                        <div class="col-lg-12 pr-0 pl-0 pr">
                                            <div class="product-box-modal_price mt-12 mt-auto">
                                                <div class="price">
                                                    <del><span>۳,۵۰۰,۰۰۰<span>تومان</span></span></del>
                                                    <ins><span>۲,۰۰۰,۰۰۰<span>تومان</span></span></ins>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="small-gutters">
                                            <div class="col-lg-12 mb-8 pr-0 pl-0 pr mt-3">
                                                <div class="product-box_action">
                                                    <button class="btn btn-gradient-primary add-to-cart"
                                                        type="submit">افزودن به سبد</button>
                                                    <a href="#" class="btn btn-outline-dark btn-block">مشاهده
                                                        جزئیات</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider-moment------------------------->
        <div class="col-lg-3 col-md-3 col-xs-12 pl order-1 d-block">
            <div class="slider-moments">
                <div class="widget-suggestion widget card">
                    <header class="card-header promo-single-headline">
                        <h3 class="card-title float-none">پیشنهاد لحظه‌ای</h3>
                    </header>
                    <div id="suggestion-slider" class="owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(1369px, 0px, 0px); transition: all 0.25s ease 0s; width: 2190px;">
                                <div class="owl-item cloned" style="width: 273.75px;">
                                    <div class="item">
                                        <a href="#">
                                            <img src="assets/home/images/slider-moment/sm-1.jpg" class="w-100" alt="">
                                        </a>
                                        <h3 class="product-title">
                                            <a href="#"> تیشرت آستین کوتاه مردانه مدل T41 </a>
                                        </h3>
                                        <div class="price">
                                            <span class="amount">۲۳,۰۰۰
                                                <span>تومان</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 273.75px;">
                                    <div class="item">
                                        <a href="#">
                                            <img src="assets/home/images/slider-moment/sm-2.jpg" class="w-100" alt="">
                                        </a>
                                        <h3 class="product-title">
                                            <a href="#">تی شرت آستین کوتاه تارکان کد btt 152-1</a>
                                        </h3>
                                        <div class="price">
                                            <span class="amount">۵۹,۰۰۰
                                                <span>تومان</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 273.75px;">
                                    <div class="item">
                                        <a href="#">
                                            <img src="assets/home/images/slider-moment/sm-3.jpg" class="w-100" alt="">
                                        </a>
                                        <h3 class="product-title">
                                            <a href="#"> لپ تاپ 17 اینچی ایسوس مدل VivoBook A712FB-P </a>
                                        </h3>
                                        <div class="price">
                                            <span class="amount">۱۳,۰۰۰,۰۰۰
                                                <span>تومان</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 273.75px;">
                                    <div class="item">
                                        <a href="#">
                                            <img src="assets/home/images/slider-moment/sm-4.jpg" class="w-100" alt="">
                                        </a>
                                        <h3 class="product-title">
                                            <a href="#"> لپ تاپ 16 اینچی اپل مدل MacBook Pro MVVK2 2019 همراه با تاچ
                                                بار
                                            </a>
                                        </h3>
                                        <div class="price">
                                            <span class="amount">۴۷,۰۰۰,۰۰۰
                                                <span>تومان</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 273.75px;">
                                    <div class="item">
                                        <a href="#">
                                            <img src="assets/home/images/slider-moment/sm-5.jpg" class="w-100" alt="">
                                        </a>
                                        <h3 class="product-title">
                                            <a href="#">گوشی موبایل سامسونگ مدل Galaxy S10 SM-G973F/DS دو سیم کارت
                                                ظرفیت 128 گیگابایت
                                            </a>
                                        </h3>
                                        <div class="price">
                                            <span class="amount">۱۱,۰۰۰,۰۰۰
                                                <span>تومان</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="progressBar">
                        <div class="slide-progress" style="width: 100%; transition: width 5000ms ease 0s;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider-moment------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pr order-1 d-block">
            <div class="slider-widget-products">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">گوشی موبایل</span>
                        <h3 class="card-title"></h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/Samsung-S10Plus.jpg"
                                                class="img-fluid" alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                سامسونگ گلکسی اس 10 پلاس – 128 گیگابایت – دو سیم کارت
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۱۲,۰۰۰,۰۰۰<span>تومان</span></span></del>
                                            <ins><span>۱۰,۵۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @each('home.components.ProductCart1', $Products_special,
                                'Product_special')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- adplacement--------------------------->
        <div class="container-fluid">
            <div class="row">
                <div class="adplacement-container-row">
                    <div class="col-6 col-lg-3 pr">
                        <a href="#" class="adplacement-item">
                            <div class="adplacement-sponsored_box">
                                <img src="assets/home/images/adplacement/a-4.jpg">
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 pr">
                        <a href="#" class="adplacement-item">
                            <div class="adplacement-sponsored_box">
                                <img src="assets/home/images/adplacement/a-5.jpg">
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 pr">
                        <a href="#" class="adplacement-item">
                            <div class="adplacement-sponsored_box">
                                <img src="assets/home/images/adplacement/a-6.jpg">
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 pr">
                        <a href="#" class="adplacement-item">
                            <div class="adplacement-sponsored_box">
                                <img src="assets/home/images/adplacement/a-7.jpg">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- adplacement--------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pr order-1 d-block">
            <div class="slider-widget-products">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">لوازم خانگی</span>
                        <h3 class="card-title"></h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/Stove-lopez.jpg"
                                                class="img-fluid" alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                اجاق گاز طرح فر لوپز مدل 10000S
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۱۲,۰۰۰,۰۰۰<span>تومان</span></span></del>
                                            <ins><span>۱۰,۵۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/SWF-40R.jpg" class="img-fluid"
                                                alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                آون توستر سان ورد مدل SWF-40R
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۳,۲۰۰,۰۰۰<span>تومان</span></span></del>
                                            <ins><span>۲,۵۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/ECM2013.jpg" class="img-fluid"
                                                alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                اسپرسوساز مباشی مدل ECM2013
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۳,۵۰۰,۰۰۰<span>تومان</span></span></del>
                                            <ins><span>۲,۰۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/DNR 290T-366T.jpg"
                                                class="img-fluid" alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                یخچال و فریزر دو قلوی دونار مدل DNR 290T-366T
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۶,۵۰۰,۰۰۰<span>تومان</span></span></del>
                                            <ins><span>۴,۲۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/Avocado.jpg" class="img-fluid"
                                                alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                آب میوه گیری پارس خزر مدل Avocado
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۷,۵۰۰,۰۰۰<span>تومان</span></span></del>
                                            <ins><span>۶,۰۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
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
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 pr order-1 d-block">
            <div class="slider-widget-products">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">کامپیوتر و لپ تاپ</span>
                        <h3 class="card-title"></h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/mitbook.jpg" class="img-fluid"
                                                alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                هواوای میت بوک X پرو 13.9 اینچ
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۱۲,۰۰۰,۰۰۰<span>تومان</span></span></del>
                                            <ins><span>۱۰,۵۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/SL1200_-300x300.jpg"
                                                class="img-fluid" alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                لپ تاپ چووی الترابوک 14 اینچ پرو
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۳,۲۰۰,۰۰۰<span>تومان</span></span></del>
                                            <ins><span>۲,۵۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/zenbook.jpg" class="img-fluid"
                                                alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                لپ تاپ 13 اینچی ایسوس مدل ZenBook S13 UX392FN - A
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۷,۵۰۰,۰۰۰<span>تومان</span></span></del>
                                            <ins><span>۶,۰۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/computer-appel.jpg"
                                                class="img-fluid" alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                کامپیوتر همه کاره 27 اینچی اپل مدل iMac CTO - A 2019 با صفحه نمایش
                                                رتینا 5K
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۳,۵۰۰,۰۰۰<span>تومان</span></span></del>
                                            <ins><span>۲,۰۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <img src="assets/home/images/slider-product/asus-laptop.jpg"
                                                class="img-fluid" alt="">
                                            <span class="icon-view">
                                                <strong><i class="fa fa-eye"></i></strong>
                                            </span>
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">
                                                لپ تاپ ایسوس زِنبوک 14
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <del><span>۶,۵۰۰,۰۰۰<span>تومان</span></span></del>
                                            <ins><span>۴,۲۰۰,۰۰۰<span>تومان</span></span></ins>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li class="action-item like">
                                                    <button class="btn btn-light add-product-wishes" type="submit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item compare">
                                                    <button class="btn btn-light btn-compare" type="submit">
                                                        <i class="fa fa-random"></i>
                                                    </button>
                                                </li>
                                                <li class="action-item add-to-cart">
                                                    <button class="btn btn-light btn-add-to-cart" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
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
        </div>
        <!-- brand--------------------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pr order-1 d-block">
            <div class="slider-widget-products">
                <div class="widget widget-product card mb-0">
                    <div class="product-carousel-brand owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                <div class="owl-item active" style="width: 190.75px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link">
                                            <img src="assets/home/images/brand/shahab.png" class="img-fluid img-brand"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 190.75px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link mt-0">
                                            <img src="assets/home/images/brand/adata.png" class="img-fluid img-brand"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 190.75px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link mt-0">
                                            <img src="assets/home/images/brand/huawei.png" class="img-fluid img-brand"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 190.75px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link mt-0">
                                            <img src="assets/home/images/brand/nokia.png" class="img-fluid img-brand"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 190.75px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link mt-0">
                                            <img src="assets/home/images/brand/panasonic.png"
                                                class="img-fluid img-brand" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 190.75px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link mt-0">
                                            <img src="assets/home/images/brand/parskhazar.png"
                                                class="img-fluid img-brand" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 190.75px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link mt-0">
                                            <img src="assets/home/images/brand/samsung.png" class="img-fluid img-brand"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 190.75px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="#" class="d-block hover-img-link mt-0">
                                            <img src="assets/home/images/brand/xvison.png" class="img-fluid img-brand"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand----------------------------------------->
    </div>
</div>
<!-- footer------------------------------------------->

@push('styles')
<style>
.owl-carousel {
    touch-action: manipulation;
}
</style>

@endpush
@endsection