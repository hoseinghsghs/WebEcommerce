@extends('home.layout.MasterHome')
@section('title', "پرداخت ")
@section('content')

<!-- product-comment----------------------->
<div class="container-main">
    <div class="col-12">
        <div class="page-content page-row">
            <div class="main-row">
                <div id="breadcrumb">
                    <i class="mdi mdi-home"></i>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item"><a href="#">کالای دیجیتال</a></li>
                            <li class="breadcrumb-item"><a href="#">موبایل</a></li>
                            <li class="breadcrumb-item active" aria-current="page">گوشی موبایل سامسونگ مدل Galaxy
                                Note 10 SM-N970F/DS دو سیم‌کارت ظرفیت 256 گیگابایت</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <form action="#" id="addCommentForm">
                <section class="product-comment">
                    <div class="comments-product">
                        <div class="comments-product-row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pull-right">
                                <div class="comments-product-col-gallery mt-3 pt-3 text-center">
                                    <a href="#">
                                        <img src="/assets/home/images/page-single-product/product-img/product-img-note10.jpg"
                                            style="max-width: 100%;">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-xs-12 pull-left">
                                <div class="comments-product-col-info">
                                    <div class="comments-product-headline">
                                        <h3 class="comments-product-title">
                                            سامسونگ مدل Galaxy Note 10 SM-N970F/DS دو سیم‌کارت ظرفیت 256 گیگابایت
                                            <span>Samsung Galaxy Note 10 Dual SIM 256GB Mobile Phone</span>
                                        </h3>
                                    </div>
                                    <div class="comments-product-attributes px-3">
                                        <div class="row">
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">کیفیت ساخت</div>
                                                <input id="ex19" type="text" data-provide="slider"
                                                    data-slider-ticks="[1, 2, 3, 4, 5]"
                                                    data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                    data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                    data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">ارزش خرید به نسبت
                                                    قیمت
                                                </div>
                                                <input id="ex19" type="text" data-provide="slider"
                                                    data-slider-ticks="[1, 2, 3, 4, 5]"
                                                    data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                    data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                    data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">نوآوری</div>
                                                <input id="ex19" type="text" data-provide="slider"
                                                    data-slider-ticks="[1, 2, 3, 4, 5]"
                                                    data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                    data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                    data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">امکانات و قابلیت ها
                                                </div>
                                                <input id="ex19" type="text" data-provide="slider"
                                                    data-slider-ticks="[1, 2, 3, 4, 5]"
                                                    data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                    data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                    data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">سهولت استفاده</div>
                                                <input id="ex19" type="text" data-provide="slider"
                                                    data-slider-ticks="[1, 2, 3, 4, 5]"
                                                    data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                    data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                    data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">طراحی و ظاهر</div>
                                                <input id="ex19" type="text" data-provide="slider"
                                                    data-slider-ticks="[1, 2, 3, 4, 5]"
                                                    data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                    data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                    data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comments-add">
                                <div class="comments-add-row d-inline-block">
                                    <div class="col-lg-6 col-md-6 col-xs-12 pull-right">
                                        <div class="comments-add-col-form">
                                            <div class="form-comment">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-ui">
                                                        <form class="px-5" onsubmit="return false">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-row-title mb-2">عنوان نظر شما
                                                                        (اجباری)</div>
                                                                    <div class="form-row">
                                                                        <input class="input-ui pr-2" type="text"
                                                                            placeholder="عنوان نظر خود را بنویسید">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 form-comment-title--positive mt-4">
                                                                    <div class="form-row-title mb-2 pr-3">
                                                                        نقاط قوت
                                                                    </div>
                                                                    <div id="advantages" class="form-row">
                                                                        <div class="ui-input--add-point">
                                                                            <input class="input-ui pr-2 ui-input-field"
                                                                                type="text" id="advantage-input"
                                                                                autocomplete="off" value="">
                                                                            <button
                                                                                class="ui-input-point js-icon-form-add"
                                                                                type="button"></button>
                                                                        </div>
                                                                        <div
                                                                            class="form-comment-dynamic-labels js-advantages-list">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 form-comment-title--negative mt-2">
                                                                    <div class="form-row-title mb-2 pr-3">
                                                                        نقاط ضعف
                                                                    </div>
                                                                    <div id="disadvantages" class="form-row">
                                                                        <div class="ui-input--add-point">
                                                                            <input class="input-ui pr-2 ui-input-field"
                                                                                type="text" id="disadvantage-input"
                                                                                autocomplete="off" value="">
                                                                            <button
                                                                                class="ui-input-point js-icon-form-add"
                                                                                type="button"></button>
                                                                        </div>
                                                                        <div
                                                                            class="form-comment-dynamic-labels js-disadvantages-list">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <div class="form-row-title mb-2">متن نظر شما
                                                                        (اجباری)</div>
                                                                    <div class="form-row">
                                                                        <textarea class="input-ui pr-2 pt-2" rows="5"
                                                                            placeholder="متن خود را بنویسید"
                                                                            style="height:120px;"></textarea>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <div class="col-12 mt-5 px-0">
                                                                    <button class="btn comment-submit-button">
                                                                        ثبت نظر
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12 pull-left">
                                        <div class="comments-add-col-content">
                                            <h3>دیگران را با نوشتن نظرات خود، برای انتخاب این محصول راهنمایی کنید.
                                            </h3>
                                            <div>
                                                <p>لطفا پیش از ارسال نظر، خلاصه قوانین زیر را مطالعه کنید:</p>
                                                <p>فارسی بنویسید و از کیبورد فارسی استفاده کنید. بهتر است از فضای
                                                    خالی (Space)
                                                    بیش‌از‌حدِ معمول، شکلک یا ایموجی استفاده نکنید و از کشیدن حروف
                                                    یا کلمات با
                                                    صفحه‌کلید بپرهیزید.</p>
                                                <p>به کاربران و سایر اشخاص احترام بگذارید. پیام‌هایی که شامل محتوای
                                                    توهین‌آمیز و
                                                    کلمات نامناسب باشند، حذف می‌شوند.</p>
                                                <p>هرگونه نقد و نظر در خصوص سایت دیجی‌کالا، خدمات و درخواست کالا را
                                                    با ایمیل
                                                    <a href="mailto:info@kalamarket.com">
                                                        info@kalamarket.com
                                                    </a>
                                                    یا با شماره‌ی

                                                    <a href="tel: +982161930000">
                                                        ۶۱۹۳۰۰۰۰ - ۰۲۱
                                                    </a>
                                                    در میان بگذارید و از نوشتن آن‌ها در بخش نظرات خودداری کنید.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>
<!-- product-comment----------------------->
<!-- modal -->

<!-- end modal -->
@endsection