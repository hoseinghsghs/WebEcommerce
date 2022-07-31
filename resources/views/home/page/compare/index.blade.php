@extends('home.layout.MasterHome')
@section('title', "خانه - مقایسه")
@section('content')
<!-- product-comparison-------------------->
<main class="main-row mb-4">
    <div class="container-main">
        <div class="col-12">
            <div id="breadcrumb">
                <i class="mdi mdi-home"></i>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item"><a href="#">کالای دیجیتال</a></li>
                        <li class="breadcrumb-item active open" aria-current="page">موبایل</li>
                    </ol>
                </nav>
            </div>
            <div class="comparison">
                <table class="table">
                    <thead>
                        <tr>
                            <td class="align-middle">
                                <div class="form-ui">
                                    <div class="custom-select-ui">
                                        <select class="right">
                                            <option>معیارهای مقایسه</option>
                                            <option>خلاصه</option>
                                            <option>عمومی</option>
                                            <option>چند رسانه ای</option>
                                            <option>کارایی</option>
                                            <option>طرح</option>
                                            <option>نمایشگر</option>
                                            <option>حافظه ذخیره سازی</option>
                                            <option>دوربین</option>
                                            <option>باتری</option>
                                            <option>قیمت و امتیاز</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-auth-row pr">
                                    <label for="#" class="ui-checkbox mt-1">
                                        <input type="checkbox" value="1" name="login" id="remember">
                                        <span class="ui-checkbox-check"></span>
                                    </label>
                                    <label for="remember" class="remember-me mr-0">فقط تفاوت را نشان بده</label>
                                </div>
                            </td>
                            <td>
                                <div class="comparison-item">
                                    <span class="remove-item">
                                        <i class="mdi mdi-close"></i>
                                    </span>
                                    <a class="comparison-item-thumb" href="#">
                                        <img src="assets/home/images/slider-product/Galaxy-S10-SM-G973F.jpg" alt="Samsung-S10Plus">
                                    </a>
                                    <a class="comparison-item-title" href="#"> سامسونگ گلکسی اس 10 پلاس – 128
                                        گیگابایت – دو سیم کارت</a>
                                    <span class="amount">
                                        ۱۰,۵۰۰,۰۰۰
                                        <span>تومان</span>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="comparison-item">
                                    <span class="remove-item">
                                        <i class="mdi mdi-close"></i>
                                    </span>
                                    <a class="comparison-item-thumb" href="#">
                                        <img src="assets/home/images/slider-product/P-Smart-2019.jpg" alt="P-Smart-2019">
                                    </a>
                                    <a class="comparison-item-title" href="#">گوشی موبایل هوآوی مدل P Smart 2019 دو
                                        سیم کارت ظرفیت 64 گیگابایت</a>
                                    <span class="amount">
                                        ۵,۵۰۰,۰۰۰
                                        <span>تومان</span>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="comparison-item">
                                    <span class="remove-item">
                                        <i class="mdi mdi-close"></i>
                                    </span>
                                    <a class="comparison-item-thumb" href="#">
                                        <img src="assets/home/images/slider-product/iphone-11-pro-max.jpg" alt="iphone-11-pro-max">
                                    </a>
                                    <a class="comparison-item-title" href="#">گوشی موبایل اپل مدل iPhone 11 Pro Max
                                        A2220 دو سیم‌ کارت ظرفیت 256 گیگابایت</a>
                                    <span class="amount">
                                        ۲۵,۹۹۹,۰۰۰
                                        <span>تومان</span>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-cs-table-tr">
                            <th class="text-uppercase">خلاصه</th>
                            <td class=""><span class="text-medium">&nbsp;Samsung Galaxy S10 SM-G973F&nbsp;</span>
                            </td>
                            <td class=""><span class="text-medium">&nbsp;Huawei P Smart 2019&nbsp;</span></td>
                            <td class=""><span class="text-medium">&nbsp;Apple iphone 11-pro max&nbsp;</span></td>
                        </tr>
                        <tr>
                            <th>کارایی</th>
                            <td>Hexa Core</td>
                            <td>Octa Core</td>
                            <td>Octa Core</td>
                        </tr>
                        <tr>
                            <th>نمایشگر</th>
                            <td>6.1 اینچ</td>
                            <td>6.0 اینچ</td>
                            <td>6.0 اینچ</td>
                        </tr>
                        <tr>
                            <th>حافظه ذخیره سازی</th>
                            <td>128 گیگابایت</td>
                            <td>64 گیگابایت</td>
                            <td>256 گیگابایت</td>
                        </tr>
                        <tr>
                            <th>دوربین</th>
                            <td>16.0 مگاپیکسل</td>
                            <td>13.0 مگاپیکسل</td>
                            <td>12.0 مگاپیکسل</td>
                        </tr>
                        <tr>
                            <th>باتری</th>
                            <td>3400 میلی‌آمپرساعت</td>
                            <td>3400 میلی‌آمپرساعت</td>
                            <td>3500 میلی‌آمپرساعت</td>
                        </tr>
                        <tr class="bg-cs-table-tr">
                            <th class="text-uppercase">عمومی</th>
                            <td class=""><span class="text-medium">&nbsp;Samsung Galaxy S10 SM-G973F&nbsp;</span>
                            </td>
                            <td class=""><span class="text-medium">&nbsp;Huawei P Smart 2019&nbsp;</span></td>
                            <td class=""><span class="text-medium">&nbsp;Apple iphone 11-pro max&nbsp;</span></td>
                        </tr>
                        <tr>
                            <th>شارژ سریع</th>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <th>سیستم عامل</th>
                            <td>Android v9.0 (Pie)</td>
                            <td>Android v9.0 (Pie)</td>
                            <td>iOS v13 </td>
                        </tr>
                        <tr>
                            <th>تعداد سیم کارت</th>
                            <td>دوسیم کارت</td>
                            <td>دوسیم کارت</td>
                            <td>دوسیم کارت</td>
                        </tr>
                        <tr>
                            <th>تاریخ عرضه</th>
                            <td>November 3, 2019 (Official)</td>
                            <td>November 15, 2019 (Official)</td>
                            <td>March 16, 2020 (Official)</td>
                        </tr>
                        <tr>
                            <th>اندازه سیم</th>
                            <td>سایز نانو (8.8 × 12.3 میلی‌متر)</td>
                            <td>سایز نانو (8.8 × 12.3 میلی‌متر)</td>
                            <td>سایز نانو (8.8 × 12.3 میلی‌متر)</td>
                        </tr>
                        <tr>
                            <th>شبکه</th>
                            <td>4G: Available (supports Indian bands) 3G: Available, 2G: Available</td>
                            <td>4G: Available (supports Indian bands) 3G: Available, 2G: Available</td>
                            <td>4G: Available (supports Indian bands) 3G: Available, 2G: Available</td>
                        </tr>
                        <tr>
                            <th>حسگر اثر انگشت</th>
                            <td>بله</td>
                            <td>بله</td>
                            <td>بله</td>
                        </tr>
                        <tr class="bg-cs-table-tr">
                            <th class="text-uppercase">چندرسانه</th>
                            <td class=""><span class="text-medium">&nbsp;Samsung Galaxy S10 SM-G973F&nbsp;</span>
                            </td>
                            <td class=""><span class="text-medium">&nbsp;Huawei P Smart 2019&nbsp;</span></td>
                            <td class=""><span class="text-medium">&nbsp;Apple iphone 11-pro max&nbsp;</span></td>
                        </tr>
                        <tr>
                            <th>بلندگو</th>
                            <td>بله</td>
                            <td>بله</td>
                            <td>بله</td>
                        </tr>
                        <tr>
                            <th>رادیو</th>
                            <td>FM</td>
                            <td>FM</td>
                            <td>ندارد</td>
                        </tr>
                        <tr>
                            <th>خروجی صدا</th>
                            <td>جک 3.5 میلی‌متری</td>
                            <td>جک 3.5 میلی‌متری</td>
                            <td>ندارد</td>
                        </tr>
                        <tr class="bg-cs-table-tr">
                            <th class="text-uppercase">کارایی</th>
                            <td class=""><span class="text-medium">&nbsp;Samsung Galaxy S10 SM-G973F&nbsp;</span>
                            </td>
                            <td class=""><span class="text-medium">&nbsp;Huawei P Smart 2019&nbsp;</span></td>
                            <td class=""><span class="text-medium">&nbsp;Apple iphone 11-pro max&nbsp;</span></td>
                        </tr>
                        <tr>
                            <th>تراشه</th>
                            <td>Exynos 9820 (8 nm) Chipset</td>
                            <td>Hisilicon Kirin 710 (12 nm) Chipset</td>
                            <td>Apple A13 Bionic (7 nm+) Chipset</td>
                        </tr>
                        <tr>
                            <th>پردازنده‌ی گرافیکی</th>
                            <td>Mali-G76 MP12 GPU</td>
                            <td>Mali-G51 MP4 GPU</td>
                            <td>Apple GPU (4-core graphics) GPU</td>
                        </tr>
                        <tr>
                            <th>پردازنده‌ی مرکزی</th>
                            <td>Dual-Core Monogoose M4 + Dual-Core Cortex-A75 + Quad-Core Cortex-A55</td>
                            <td>Quad Core Cortex-A73 + Quad Core Cortex-A53 CPU</td>
                            <td>Dual-core Lightning + Quad-core Thunder CPU</td>
                        </tr>
                        <tr>
                            <th>نوع پردازنده</th>
                            <td>64 bit</td>
                            <td>64 bit</td>
                            <td>64 bit</td>
                        </tr>
                        <tr>
                            <th>فرکانس پردازنده‌ی مرکزی</th>
                            <td>2.73 , 2.31 , 1.95 گیگاهرتز</td>
                            <td>2.2 و 1.7 گیگاهرتز</td>
                            <td>2.65 و 1.8 گیگاهرتز</td>
                        </tr>
                        <tr>
                            <th>رم</th>
                            <td>8 گیگابایت</td>
                            <td>3 گیگابایت</td>
                            <td>4 گیگابایت</td>
                        </tr>
                        <tr class="bg-cs-table-tr">
                            <th class="text-uppercase">طراحی</th>
                            <td class=""><span class="text-medium">&nbsp;Samsung Galaxy S10 SM-G973F&nbsp;</span>
                            </td>
                            <td class=""><span class="text-medium">&nbsp;Huawei P Smart 2019&nbsp;</span></td>
                            <td class=""><span class="text-medium">&nbsp;Apple iphone 11-pro max&nbsp;</span></td>
                        </tr>
                        <tr>
                            <th>وزن</th>
                            <td>157 گرم</td>
                            <td>160 گرم</td>
                            <td>226 گرم</td>
                        </tr>
                        <tr>
                            <th>ضدآب</th>
                            <td>دارای گواهینامه IP68 مقاوم در برابر گرد و غبار و آب تا عمق 1.5 متر و به مدت 30 دقیقه
                            </td>
                            <td>ندارد</td>
                            <td>دارای استاندارد IP68 برای مقاومت در برابر آب (به مدت 30 دقیقه در عمق 4 متر)</td>
                        </tr>
                        <tr>
                            <th>تعداد رنگ ها</th>
                            <td>16 میلیون رنگ</td>
                            <td>16 میلیون رنگ</td>
                            <td>16 میلیون رنگ</td>
                        </tr>
                        <tr class="bg-cs-table-tr">
                            <th class="text-uppercase">نمایشگر</th>
                            <td class=""><span class="text-medium">&nbsp;Samsung Galaxy S10 SM-G973F&nbsp;</span>
                            </td>
                            <td class=""><span class="text-medium">&nbsp;Huawei P Smart 2019&nbsp;</span></td>
                            <td class=""><span class="text-medium">&nbsp;Apple iphone 11-pro max&nbsp;</span></td>
                        </tr>
                        <tr>
                            <th>نوع نمایشگر</th>
                            <td>OLED</td>
                            <td>P-OLED</td>
                            <td>OLED</td>
                        </tr>
                        <tr>
                            <th>تراکم پیکسل</th>
                            <td>550 پیکسل بر هر اینچ</td>
                            <td>415 پیکسل بر هر اینچ</td>
                            <td>458 پیکسل بر هر اینچ</td>
                        </tr>
                        <tr>
                            <th>حفاظت از صفحه</th>
                            <td>Corning Gorilla Glass 6</td>
                            <td>ندارد</td>
                            <td>Scratch-Resistant Glass</td>
                        </tr>
                        <tr>
                            <th>اندازه صفحه نمایش</th>
                            <td>6.1 اینچ</td>
                            <td>6.0 اینچ</td>
                            <td>6.0 اینچ</td>
                        </tr>
                        <tr>
                            <th>وضوح صفحه</th>
                            <td>1440 × 3040 | +QHD</td>
                            <td>1080 × 2340</td>
                            <td>1242 × 2688 پیکسل</td>
                        </tr>
                        <tr>
                            <th>صفحه لمسی</th>
                            <td>بله</td>
                            <td>بله</td>
                            <td>بله</td>
                        </tr>
                        <tr class="bg-cs-table-tr">
                            <th class="text-uppercase">حافظه</th>
                            <td class=""><span class="text-medium">&nbsp;Samsung Galaxy S10 SM-G973F&nbsp;</span>
                            </td>
                            <td class=""><span class="text-medium">&nbsp;Huawei P Smart 2019&nbsp;</span></td>
                            <td class=""><span class="text-medium">&nbsp;Apple iphone 11-pro max&nbsp;</span></td>
                        </tr>
                        <tr>
                            <th>حافظه داخلی</th>
                            <td>128 گیگابایت</td>
                            <td>64 گیگابایت</td>
                            <td>256 گیگابایت</td>
                        </tr>
                        <tr>
                            <th>پشتیبانی از کارت حافظه جانبی</th>
                            <td>microSD</td>
                            <td>microSD</td>
                            <td>ندارد</td>
                        </tr>
                        <tr class="bg-cs-table-tr">
                            <th class="text-uppercase">دوربین</th>
                            <td class=""><span class="text-medium">&nbsp;Samsung Galaxy S10 SM-G973F&nbsp;</span>
                            </td>
                            <td class=""><span class="text-medium">&nbsp;Huawei P Smart 2019&nbsp;</span></td>
                            <td class=""><span class="text-medium">&nbsp;Apple iphone 11-pro max&nbsp;</span></td>
                        </tr>
                        <tr>
                            <th>دیافراگم</th>
                            <td>دریچه‌ی دیافراگم f/1.5-2.4</td>
                            <td>دریچه‌ی دیافراگم f/1.8</td>
                            <td>دریچه‌ی دیافراگم f/2.0</td>
                        </tr>
                        <tr>
                            <th>فیلم برداری</th>
                            <td>رزولوشن 2160 × 3840 و سرعت 60 فریم بر ثانیه (2160p@60FPS)
                                رزولوشن 1080 × 1920 و سرعت 240 فریم بر ثانیه (1080p@240FPS)
                                رزولوشن 720 × 1280 و سرعت 960 فریم بر ثانیه (720p@960FPS)
                                قابلیت فیلمبرداری HDR
                                قابلیت فیلمبردارای هم‌زمان با هر دو دوربین (Dual-video Recording)</td>
                            <td>رزولوشن 1080 × 1920 و سرعت 30 فریم بر ثانیه (1080p@30FPS)
                                رزولوشن 1080 × 1920 و سرعت 60 فریم بر ثانیه (1080p@60FPS)</td>
                            <td>رزولوشن 2160 × 3840 و سرعت 24/30/60 فریم بر ثانیه (2160p@24/30/60FPS)
                                رزولوشن 1080 × 1920 و سرعت 30/60/120/240 فریم بر ثانیه (1080p@30/60/120/240FPS)
                                قابلیت فیلم‌برداری HDR
                                ضبط صدای استریو</td>
                        </tr>
                        <tr>
                            <th>فوکوس اتوماتیک</th>
                            <td>مجهز به فناوری فوکوس اتوماتیک از نوع Dual Pixel PDAF</td>
                            <td>قابلیت فوکوس با اشاره روی سوژه (Touch Focus)</td>
                            <td>همراه با فناوری فوکوس اتوماتیک (PDAF)</td>
                        </tr>
                        <tr>
                            <th>فلش</th>
                            <td>دارد , LED</td>
                            <td>LED</td>
                            <td>Quad LED Dual Tone</td>
                        </tr>
                        <tr class="bg-cs-table-tr">
                            <th class="text-uppercase">باتری</th>
                            <td class=""><span class="text-medium">&nbsp;Samsung Galaxy S10 SM-G973F&nbsp;</span>
                            </td>
                            <td class=""><span class="text-medium">&nbsp;Huawei P Smart 2019&nbsp;</span></td>
                            <td class=""><span class="text-medium">&nbsp;Apple iphone 11-pro max&nbsp;</span></td>
                        </tr>
                        <tr>
                            <th>شارژ سریع</th>
                            <td>قابلیت شارژ سریع با توان 15 وات</td>
                            <td>مجهز به رابط کاربری EMUI 9.0</td>
                            <td>مجهز به دستیار صوتی اپل Siri</td>
                        </tr>
                        <tr>
                            <th>شارژ بی سیم</th>
                            <td>دارد</td>
                            <td>دارد</td>
                            <td>دارد</td>
                        </tr>
                        <tr>
                            <th>نوع</th>
                            <td>Li-ion</td>
                            <td>Li-ion</td>
                            <td>Li-ion</td>
                        </tr>
                        <tr>
                            <th>ظرفیت</th>
                            <td>3400 میلی‌آمپرساعت</td>
                            <td>3400 میلی‌آمپرساعت</td>
                            <td>3500 میلی‌آمپرساعت</td>
                        </tr>
                        <tr class="bg-cs-table-tr">
                            <th class="text-uppercase">قیمت و امتیاز</th>
                            <td class=""><span class="text-medium">&nbsp;Samsung Galaxy S10 SM-G973F&nbsp;</span>
                            </td>
                            <td class=""><span class="text-medium">&nbsp;Huawei P Smart 2019&nbsp;</span></td>
                            <td class=""><span class="text-medium">&nbsp;Apple iphone 11-pro max&nbsp;</span></td>
                        </tr>
                        <tr>
                            <th>قیمت</th>
                            <td>
                                <span class="amount">
                                    ۱۰,۵۰۰,۰۰۰
                                    <span>تومان</span>
                                </span>
                            </td>
                            <td>
                                <span class="amount">
                                    ۵,۵۰۰,۰۰۰
                                    <span>تومان</span>
                                </span>
                            </td>
                            <td>
                                <span class="amount">
                                    ۲۵,۹۹۹,۰۰۰
                                    <span>تومان</span>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>امتیاز</th>
                            <td>
                                <div class="product-rate">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                </div>
                            </td>
                            <td>
                                <div class="product-rate">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </td>
                            <td>
                                <div class="product-rate">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><a class="btn btn-primary btn-add-to-cart btn-block" href="#" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="fe-icon-check-circle" data-toast-title="محصول" data-toast-message="با موفقیت به سبد خرید اضافه شد!">افزودن به سبد خرید</a></td>
                            <td><a class="btn btn-primary btn-add-to-cart btn-block" href="#" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="fe-icon-check-circle" data-toast-title="محصول" data-toast-message="با موفقیت به سبد خرید اضافه شد!">افزودن به سبد خرید</a></td>
                            <td><a class="btn btn-primary btn-add-to-cart btn-block" href="#" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="fe-icon-check-circle" data-toast-title="محصول" data-toast-message="با موفقیت به سبد خرید اضافه شد!">افزودن به سبد خرید</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- product-comparison-------------------->
@endsection
