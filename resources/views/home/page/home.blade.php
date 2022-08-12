@extends('home.layout.MasterHome')
@section('title','خانه')

@section('content')
@include('home.partial.SliderMain')
@include('home.partial.Adplacement')

<!-- slidre-product------------------------>
<!-- فروش ویژه -->
<section class="section-slider amazing-section pt-3">
    <div class="container-amazing col-12">
        <div class="col-lg-3 display-md-none pull-right">
            <div class="amazing-product text-center">
                <a href="#">
                    <img src="assets/home/images/slider-amazing/shopping-cart.svg" alt="">
                </a>
                <h3 class="amazing-heading-title amazing-size-default">فروش ویژه</h3>

            </div>
        </div>
        @if ($Products_special)
        <div class="col-lg-9 col-md-12 pull-left pr-1">
            <div class="slider-widget-products mb-0">
                <div class="widget widget-product card" style="padding:32px ;">
                    <header class="card-header">
                        <span class="title-one">فروش ویژه</span>
                        <h3 class="card-title">مشاهده همه</h3>
                    </header>
                    <div class="product-carousel productcar owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 827px;">

                                @each('home.components.ProductCart2', $Products_special,
                                'Product_special')

                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation"
                                style="margin-right: -37px;box-shadow:  0px 0 0px 0 rgb(0 0 0 / 0%)"
                                class="owl-prev disabled">&#10094</button>
                            <button type="button" role="presentation"
                                style="margin-left: -37px;box-shadow:  0px 0 0px 0 rgb(0 0 0 / 0%)" class="owl-next">
                                &#10095</button>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!--  پایان محصولات شگفت انگیز -->


<div class="container-main">
    <div class="d-block">
        <div
            class="{{$Products_our_suggestion_units ? 'col-lg-9 col-md-9 col-xs-12 pr order-1 d-block' : 'col-lg-12 col-md-12 col-xs-12 pr order-1 d-block'}}">
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

                                @each('home.components.ProductCart1', $Products_special,
                                'Product_special')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- slider-moment پیشنهاد لحظه ای------------------------->
        @if ($Products_our_suggestion_units)
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

                                @each('home.components.ProductSuggestion', $Products_our_suggestion_units,
                                'Products_our_suggestion_unit')


                            </div>
                        </div>
                    </div>

                    <div id="progressBar">
                        <div class="slide-progress" style="width: 100%; transition: width 5000ms ease 0s;"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
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
@push('scripts')


@endpush

@endsection