    <!-- header-------------------------------->
    <header class="header-main">
        <div class="container-main">
            <div class="d-block">
                <section class="h-main-row">
                    <div class="col-lg-9 col-md-6 col-4 pr">
                        <div class="header-right">
                            <div class="col-lg-3 pr mt-1">
                                <div class="header-logo row text-right">
                                    <?php if(isset($setting->logo)): ?>
                                    <a href="<?php echo e(route('home')); ?>">
                                        <img src="<?php echo e(asset('storage/logo/'.$setting->logo)); ?>" alt="logo" />
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-8 pr d-none d-lg-block mt-2">
                                <div class="header-search row text-right">
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.sections.search-box')->html();
} elseif ($_instance->childHasBeenRendered('XnjMKcn')) {
    $componentId = $_instance->getRenderedChildComponentId('XnjMKcn');
    $componentTag = $_instance->getRenderedChildComponentTagName('XnjMKcn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XnjMKcn');
} else {
    $response = \Livewire\Livewire::mount('home.sections.search-box');
    $html = $response->html();
    $_instance->logRenderedChild('XnjMKcn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-8 pr">
                        <div class="header-cart-nav header-main-nav pl mt-0">
                            <?php if(!request()->routeIs('home.cart.index')): ?>
                            <li class="divider-space-card d-block">
                                <div class="header-cart-basket">
                                    <a class="cart-basket-box">
                                        <span class="icon-cart">
                                            <i class="mdi mdi-shopping"></i>
                                        </span>
                                        <span class="count-cart" id="count-cart"><?php echo e(Cart::getContent()->count()); ?></span>
                                    </a>
                                    <div class="widget-shopping-cart" id="widget-shopping-cart"
                                        style=<?php echo e(\Cart::isEmpty() ? 'display:none' : ''); ?>>
                                        <div class="widget-shopping-cart-content">
                                            <div class="wrapper">
                                                <div class="scrollbar" id="style-1">
                                                    <div class="force-overflow">
                                                        <ul class="product-list-widget" id="product-list-widget">
                                                            <?php $__currentLoopData = \Cart::getContent(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="mini-cart-item" id="<?php echo e($item->id); ?>">
                                                                <div class="mini-cart-item-content">
                                                                    <a href="<?php echo e(route('home.products.show',['product'=>$item->associatedModel->slug])); ?>"
                                                                        class="mini-cart-item-image d-block">
                                                                        <img
                                                                            src="<?php echo e(url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$item->associatedModel->primary_image)); ?>">
                                                                    </a>
                                                                    <span class="product-name-card"><?php echo e($item->name); ?>

                                                                        <?php echo e($item->attributes->value); ?></span>
                                                                    <a onclick="return delete_product_cart('<?php echo e($item->id); ?>')"
                                                                        class="mr-3"
                                                                        style="position: absolute;left: 3px;">
                                                                        <i class="mdi mdi-close"
                                                                            id="del-pro-cart-<?php echo e($item->id); ?>"></i>
                                                                    </a>
                                                                    <div class="variation">
                                                                        <span class="variation-n">فروشنده :
                                                                        </span>
                                                                        <p class="mb-0"><?php echo e(env('APP_NAME')); ?></p>
                                                                    </div>
                                                                    <!-- <div
                                                                            class="header-basket-list-item-color-badge">
                                                                            رنگ:
                                                                            <span style="background: #000"></span>
                                                                        </div> -->
                                                                    <div class="quantity">
                                                                        <span class="quantity-Price-amount">
                                                                            <?php echo e($item->quantity); ?> *
                                                                            <?php echo e(number_format($item->price)); ?> =
                                                                            <?php echo e(number_format($item->quantity*$item->price)); ?>

                                                                            <span>تومان</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mini-card-total">
                                                <strong>قیمت کل : </strong>
                                                <span class="price-total"> <?php echo e(number_format(\Cart::getTotal())); ?>

                                                    <span>تومان</span>
                                                </span>
                                            </div>
                                            <div class="mini-card-button">
                                                <a href="<?php echo e(route('home.cart.index')); ?>" class="view-card">مشاهده
                                                    سبد
                                                    خرید</a>
                                                <a href="<?php echo e(route('home.orders.checkout')); ?>" class="card-checkout">تسویه
                                                    حساب</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>
                        </div>
                        <?php if(auth()->guard()->guest()): ?>
                        <?php if(!request()->routeIs('login') && !request()->routeIs('register')): ?>
                        <div class="account-box pl-1">
                            <div class="nav-account d-block pl" id="nav-cart-style">
                                <a href="<?php echo e(route('login')); ?>" class="btn btn-secondary btn-sm " id="login-style"><i
                                        class="fa fa-sign-in" aria-hidden="true"></i> ثبت
                                    نام | ورود
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                        <div class="pl" id="nav-account-style-0">
                            <div class="header-left">
                                <div class="header-account text-left">
                                    <div class="d-block">
                                        <div class="account-box">
                                            <div class="nav-account d-block pl">

                                                <span class="icon-account">
                                                    <img src="/assets/home/images/man.png" class="avator">
                                                </span>
                                                <span class="title-account">حساب کاربری</span>
                                                <div class="dropdown-menu">
                                                    <ul class="account-uls mb-0">
                                                        <li class="account-item">
                                                            <a href="<?php echo e(auth()->user()->hasRole('super-admin') ? route('admin.home'):'#'); ?>"
                                                                class="account-link"><?php echo e(Auth::user()->name ?? auth()->user()->cellphone); ?></a>
                                                        </li>
                                                        <li class="account-item">
                                                            <a href="<?php echo e(route('home.user_profile')); ?>"
                                                                class="account-link">پنل
                                                                کاربری</a>
                                                        </li>
                                                        <li class="account-item">
                                                            <a href="<?php echo e(route('logout')); ?>" class="account-link"
                                                                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">خروج</a>
                                                        </li>
                                                        <form id="frm-logout" action="<?php echo e(route('logout')); ?>"
                                                            method="POST">
                                                            <?php echo e(csrf_field()); ?>

                                                        </form>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>
                <nav class="header-main-nav">
                    <div class="d-block">
                        <div class="align-items-center">
                            <ul class="menu-ul mega-menu-level-one">
                                <li id="nav-menu-item" class="menu-item nav-overlay pl-3">
                                    <a href="#" class="current-link-menu">
                                        <i class="fa fa-bars"></i> دسته بندی
                                    </a>
                                    <ul class="sub-menu is-mega-menu mega-menu-level-two">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="menu-mega-item menu-item-type-mega-menu">
                                            <a href="<?php echo e(route('home.products.search',['slug'=>$category->slug])); ?>"
                                                class="mega-menu-link">
                                                <?php echo e($category->name); ?>

                                            </a>
                                            <?php if(count($category->children)): ?>
                                            <ul class="sub-menu mega-menu-level-three">
                                                <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ChildrenCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="menu-mega-item-three">
                                                    <a
                                                        href="<?php echo e(route('home.products.index',['slug'=>$ChildrenCategory->slug])); ?>">
                                                        <?php echo e($ChildrenCategory->name); ?>

                                                    </a>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <?php endif; ?>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($menue_banner): ?>
                                        <li class="menu-mega-item menu-item-type-mega-menu pr-2">
                                            <img src="<?php echo e(url(env('BANNER_IMAGES_PATCH').$menue_banner->image)); ?>"
                                                alt="<?php echo e($menue_banner->title); ?>">
                                        </li>
                                        <?php endif; ?>

                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <i class=" fa fa-star-o"></i>
                                    <a href="<?php echo e(route('home.products.search',['label'=>'فروش ویژه'])); ?>"
                                        class="current-link-menu">فروش ویژه</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?php echo e(route('home.products.search',['label'=>'پیشنهاد ما'])); ?>"
                                        class="current-link-menu">پیشنهاد ما</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?php echo e(route('home.posts.index')); ?>" class="current-link-menu">
                                        بلاگ
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?php echo e(route('home.compare.index')); ?>" class="current-link-menu">مقایسه</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?php echo e(route('contact-us')); ?>" class="current-link-menu">تماس با ما</a>
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
                            <?php if(isset($setting->logo)): ?>
                            <a href="<?php echo e(route('home')); ?>" class="logo-icon">
                                <img src="<?php echo e(asset('storage/logo/'.$setting->logo)); ?>" alt="logo" width="40" />
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- لیست دسته بندی ها در حالت موبایل در دو سطح -->
                    <ul class="nav-categories ul-base mt-4">
                        <?php $__currentLoopData = $categories->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="#" class="collapsed" type="button" data-toggle="collapse"
                                data-target="#collapse-<?php echo e($category->id); ?>" aria-expanded="false"
                                aria-controls="collapse-<?php echo e($category->id); ?>"><i
                                    class="mdi mdi-chevron-down"></i><?php echo e($category->name); ?></a>
                            <div id="collapse-<?php echo e($category->id); ?>" class="collapse" aria-labelledby="headingOne">
                                <?php if(count($category->children)): ?>
                                <ul>
                                    <?php $__currentLoopData = $category->children->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ChildrenCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('home.products.index',['slug'=>$ChildrenCategory->slug])); ?>"
                                            class="category-level-3"><?php echo e($ChildrenCategory->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('home.products.search',['label'=>'فروش ویژه'])); ?>"
                                class="current-link-menu">فروش ویژه</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('home.products.search',['label'=>'پیشنهاد ما'])); ?>"
                                class="current-link-menu">پیشنهاد ما</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('home.posts.index')); ?>">بلاگ</a>
                        </li>
                        <li class="menu-item">
                            <a href="<?php echo e(route('home.compare.index')); ?>" class="current-link-menu">مقایسه</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('contact-us')); ?>">تماس با ما</a>
                        </li>
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
                <div class="bottom-menu-joomy mx-auto">
                    <ul class="m-1">
                        <li class="m-1">
                            <a href="<?php echo e(route('home')); ?>">
                                <i class="fa fa-home"></i>
                                صفحه اصلی
                            </a>
                        </li>
                        <li class="m-1">
                            <a href="<?php echo e(route('home.compare.index')); ?>" class="cart-basket-box">
                                <i class="fa fa-random">
                                </i>
                                لیست مقایسه
                            </a>
                        </li>
                        <li class="m-1">
                            <a href="<?php echo e(route('home.cart.index')); ?>">
                                <i class="fa fa-shopping-cart"></i>
                                سبد خرید
                                <div class="shopping-bag-item" id="shopping-bag-item"><?php echo e(Cart::getContent()->count()); ?>

                                </div>
                            </a>
                        </li>
                        <li class="m-1">
                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa fa-search"></i>
                                جستجو
                            </a>
                        </li>
                        <li class="m-1">
                            <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('home.user_profile')); ?>">
                                <i class="fa fa-user"></i>
                                حساب کاربری
                            </a>
                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('login')); ?>">
                                <i class="fa fa-user"></i>
                                ورود/ثبت نام
                            </a>
                            <?php endif; ?>
                        </li>

                    </ul>
                </div>
                <!--    responsive-megamenu-mobile----------------->
            </div>
        </div>
    </header><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/partial/Header.blade.php ENDPATH**/ ?>