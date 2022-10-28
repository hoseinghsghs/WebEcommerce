<div class="col-lg-3 col-md-4 col-sm-5 col-12 pr">
    <div class="sidebar-profile sidebar-navigation">
        <section class="profile-box">
            <header class="profile-box-header-inline mb-0">
                <div class="profile-avatar user-avatar profile-img">
                    <img src="/assets/home/images/man.png">
                </div>
            </header>
            <footer class="profile-box-content-footer">
                <span class="profile-box-nameuser"><?php echo e(Auth::user()->name ?? auth()->user()->cellphone); ?></span>

                <ul class="profile-account-navs mt-4">
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="<?php echo e(route('home.user_profile')); ?>"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('home.user_profile')]) ?>" ><i
                                class="mdi mdi-account-outline"></i>
                            پروفایل
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="<?php echo e(route('home.user_profile.ordersList')); ?>"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('home.user_profile.ordersList')]) ?>"><i
                                class="mdi mdi-cart"></i>
                            همه سفارش ها
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="<?php echo e(route('home.profile.wishlist.index')); ?>"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('home.profile.wishlist.index')]) ?>"><i
                                class="mdi mdi-heart"></i>
                            لیست علاقه مندی
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="<?php echo e(route('home.addreses.index')); ?>"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('home.addreses.index')]) ?>"><i
                                class="mdi mdi-map-outline"></i>
                            آدرس ها
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="<?php echo e(route('home.user_profile.commentsList')); ?>"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('home.user_profile.commentsList')]) ?>"><i
                                class="mdi mdi-email-open-outline"></i>
                            نظرات
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="<?php echo e(route('home.compare.index')); ?>"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('home.compare.index')]) ?>"><i class="mdi mdi-compare"></i>
                            لیست مقایسه
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="<?php echo e(route('home.user_profile.edit')); ?>"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('home.user_profile.edit')]) ?>"><i
                                class="mdi mdi-tooltip-text-outline"></i>
                            اطلاعات حساب
                        </a>
                    </li>
                </ul>
                <div class="profile-box-tabs">
                    <a href="javascript:void(0);"
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                        class="profile-box-tab-sign-out"><i class="mdi mdi-logout-variant"></i>خروج از حساب</a>
                    <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </div>
            </footer>
        </section>
    </div>
</div>
<?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/users_profile/partial/right_side.blade.php ENDPATH**/ ?>