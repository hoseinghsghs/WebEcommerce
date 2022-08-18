@php
$categories = \App\Models\Category::where('parent_id', 0)->with('children')->get();
@endphp
<!-- header-------------------------------->
<header class="header-main">
    <div class="container-main">
        <div class="d-block">
            <section class="h-main-row">
                <div class="col-lg-9 col-md-12 col-xs-12 pr">
                    <div class="header-right">
                        <div class="col-lg-3 pr">
                            <div class="header-logo row text-right">
                                <a href="#">
                                    <img src="assets/home/images/logo.png" alt="دیجی اسمارت">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 pr">
                            <div class="header-search row text-right">
                                <div class="header-search-box">
                                    <form action="#" class="form-search">
                                        <input type="search" class="header-search-input" name="search-input" placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                                        <div class="action-btns">
                                            <button class="btn btn-search" type="submit">
                                                <img src="assets/home/images/search.png" alt="search">
                                            </button>
                                            <div class="search-filter">
                                                <div class="form-ui">
                                                    <div class="custom-select-ui">
                                                        <select class="right">
                                                            <option>همه دسته ها</option>
                                                            <option>کالای دیجیتال</option>
                                                            <option>آرایشی بهداشتی</option>
                                                            <option>ابزاری اداری</option>
                                                            <option>مد پوشاک</option>
                                                            <option>خانه آشپز خانه</option>
                                                            <option>لوازم تحریر و هنر</option>
                                                            <option>کودک و نوزاد</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="search-result">
                                        <ul class="search-result-list mb-0">
                                            <li>
                                                <a href="#"><i class="mdi mdi-clock-outline"></i>
                                                    کالای دیجیتال
                                                    <button class="btn btn-light btn-continue-search" type="submit">
                                                        <i class="fa fa-angle-left"></i>
                                                    </button>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="mdi mdi-clock-outline"></i>
                                                    آرایشی و بهداشتی
                                                    <button class="btn btn-light btn-continue-search" type="submit">
                                                        <i class="fa fa-angle-left"></i>
                                                    </button>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="mdi mdi-clock-outline"></i>
                                                    گوشی موبایل
                                                    <button class="btn btn-light btn-continue-search" type="submit">
                                                        <i class="fa fa-angle-left"></i>
                                                    </button>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="mdi mdi-clock-outline"></i>
                                                    تبلت
                                                    <button class="btn btn-light btn-continue-search" type="submit">
                                                        <i class="fa fa-angle-left"></i>
                                                    </button>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="mdi mdi-clock-outline"></i>
                                                    لپ تاپ
                                                    <button class="btn btn-light btn-continue-search" type="submit">
                                                        <i class="fa fa-angle-left"></i>
                                                    </button>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="mdi mdi-clock-outline"></i>
                                                    دوربین
                                                    <button class="btn btn-light btn-continue-search" type="submit">
                                                        <i class="fa fa-angle-left"></i>
                                                    </button>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="localSearchSimple"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-0 col-xs-12 pl">
                    <div class="header-left">
                        <div class="header-account text-left">
                            <div class="d-block">
                                <div class="account-box">
                                    <div class="nav-account d-block pl">
                                        <span class="icon-account">
                                            <img src="assets/home/images/man.png" class="avator">
                                        </span>
                                        <span class="title-account">حساب کاربری</span>
                                        <div class="dropdown-menu">
                                            <ul class="account-uls mb-0">
                                                <li class="account-item">
                                                    <a href="#" class="account-link">پنل کاربری</a>
                                                </li>
                                                <li class="account-item">
                                                    <a href="#" class="account-link">سفارشات من</a>
                                                </li>
                                                <li class="account-item">
                                                    <a href="#" class="account-link">تنظیمات</a>
                                                </li>
                                                <li class="account-item">
                                                    <a href="#" class="account-link">خروج</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <nav class="header-main-nav">
                <div class="d-block">
                    <div class="align-items-center">
                        <ul class="menu-ul mega-menu-level-one">

                            @foreach ($categories as $category)
                            <li id="nav-menu-item" class="menu-item nav-overlay">
                                <a href="{{route('home.products.search',['slug'=>$category->slug])}}" class="current-link-menu">
                                    {{$category->name}}
                                </a>
                                @if(count($category->children))
                                <ul class="sub-menu is-mega-menu-small">
                                    @foreach ($category->children as $ChildrenCategory )
                                    <li class="menu-mega-item menu-item-type-mega-menu item-small">
                                        <a href="{{route('home.products.index',['slug'=>$ChildrenCategory->slug])}}" class="mega-menu-link">
                                            {{$ChildrenCategory->name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                            <li class="divider-space-card d-block">
                                <div class="header-cart-basket">
                                    <a href="#" class="cart-basket-box">
                                        <span class="icon-cart">
                                            <i class="mdi mdi-shopping"></i>
                                        </span>

                                        <span class="count-cart">{{Cart::getContent()->count()}}</span>
                                    </a>
                                    <div class="widget-shopping-cart">
                                        <div class="widget-shopping-cart-content">
                                            <div class="wrapper">
                                                <div class="scrollbar" id="style-1">
                                                    <div class="force-overflow">
                                                        <ul class="product-list-widget">
                                                            <li class="mini-cart-item">
                                                                <div class="mini-cart-item-content">
                                                                    <a href="#" class="mini-cart-item-close">
                                                                        <i class="mdi mdi-close"></i>
                                                                    </a>
                                                                    <a href="#" class="mini-cart-item-image d-block">
                                                                        <img src="assets/home/images/menu-main/img-card.jpg">
                                                                    </a>
                                                                    <span class="product-name-card">لپ تاپ چووی
                                                                        الترابوک 14
                                                                        اینچ پرو</span>
                                                                    <div class="variation">
                                                                        <span class="variation-n">فروشنده :
                                                                        </span>
                                                                        <p class="mb-0">کالامارکت </p>
                                                                    </div>
                                                                    <div class="header-basket-list-item-color-badge">
                                                                        رنگ:
                                                                        <span style="background: #000"></span>
                                                                    </div>
                                                                    <div class="quantity">
                                                                        <span class="quantity-Price-amount">
                                                                            15,000,000
                                                                            <span>تومان</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mini-cart-item">
                                                                <div class="mini-cart-item-content">
                                                                    <a href="#" class="mini-cart-item-close">
                                                                        <i class="mdi mdi-close"></i>
                                                                    </a>
                                                                    <a href="#" class="mini-cart-item-image d-block">
                                                                        <img src="assets/home/images/menu-main/img-card-2.jpg">
                                                                    </a>
                                                                    <span class="product-name-card">هواوای میت
                                                                        بوک X پرو
                                                                        13.9 اینچ</span>
                                                                    <div class="variation">
                                                                        <span class="variation-n">فروشنده :
                                                                        </span>
                                                                        <p class="mb-0">کالامارکت </p>
                                                                    </div>
                                                                    <div class="header-basket-list-item-color-badge">
                                                                        رنگ:
                                                                        <span style="background: #ccc"></span>
                                                                    </div>
                                                                    <div class="quantity">
                                                                        <span class="quantity-Price-amount">
                                                                            10,000,000
                                                                            <span>تومان</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mini-card-total">
                                                <strong>قیمت کل : </strong>
                                                <span class="price-total"> 25,000,000
                                                    <span>تومان</span>
                                                </span>
                                            </div>
                                            <div class="mini-card-button">
                                                <a href="cart.html" class="view-card">مشاهده سبد خرید</a>
                                                <a href="checkout.html" class="card-checkout">تسویه حساب</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--    responsive-megamenu-mobile----------------->
            <nav class="sidebar">
                <div class="nav-header">
                    <div class="header-cover"></div>
                    <div class="logo-wrap">
                        <a class="logo-icon" href="#"><img alt="logo-icon" src="assets/home/images/logo.png" width="40"></a>
                    </div>
                </div>

                <!-- لیست دسته بندی ها در حالت موبایل در دو سطح -->
                <ul class="nav-categories ul-base">
                    @foreach ($categories as $category)
                    <li>
                        <a href="{{route('home.products.search',['slug'=>$category->slug])}}" class="collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="mdi mdi-chevron-down"></i>{{$category->name}}</a>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            @if(count($category->children))
                            <ul>
                                @foreach ($category->children as $ChildrenCategory )
                                <li><a href="{{route('home.products.index',['slug'=>$ChildrenCategory->slug])}}" class="category-level-3">{{$ChildrenCategory->name}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
                <!-- پایان لیست دسته بندی ها در حالت موبایل در دو سطح  -->

            </nav>
            <div class="nav-btn nav-slider">
                <span class="linee1"></span>
                <span class="linee2"></span>
                <span class="linee3"></span>
            </div>
            <div class="overlay"></div>
            <!-- bottom-menu-joomy -->
            <div class="bottom-menu-joomy">
                <ul class="mb-0">
                    <li>
                        <a href="{{route('home')}}">
                            <i class="fa fa-home"></i>
                            صفحه اصلی
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="nav-btn nav-slider">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                            دسته بندی ها
                        </a>
                    </li>
                    <li>
                        <a href="{{route('home.cart.index')}}">
                            <i class="fa fa-shopping-cart"></i>
                            سبد خرید
                            <div class="shopping-bag-item">{{Cart::getContent()->count()}}</div>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-search"></i>
                            جستجو
                        </a>
                    </li>
                    <li>
                        @auth
                        <a href="{{route('home.user_profile')}}">
                            <i class="fa fa-user"></i>
                            حساب کاربری
                        </a>
                        @endauth
                        @guest
                        <a href="{{route('login')}}">
                            <i class="fa fa-user"></i>
                            حساب کاربری
                        </a>
                        @endguest
                    </li>
                </ul>
            </div>
            <!--    responsive-megamenu-mobile----------------->
        </div>
    </div>
</header>
