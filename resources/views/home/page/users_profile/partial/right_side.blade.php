<div class="col-lg-3 d-lg-block d-none pr">
    <div class="sidebar-profile sidebar-navigation">
        <section class="profile-box">
            <header class="profile-box-header-inline mb-0">
                <div class="profile-avatar user-avatar profile-img">
                    <img src="/assets/home/images/user.png">
                </div>
            </header>
            <footer class="profile-box-content-footer">
                <span class="profile-box-nameuser">{{Auth::user()->name ?? auth()->user()->cellphone}}</span>
                <ul class="profile-account-navs">
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="{{route('home.user_profile')}}"
                            @class(['active'=>request()->routeIs('home.user_profile')]) ><i
                                class="mdi mdi-account-outline"></i>
                            پروفایل
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="{{route('home.user_profile.ordersList')}}"
                            @class(['active'=>request()->routeIs('home.user_profile.ordersList')])><i
                                class="mdi mdi-cart"></i>
                            همه سفارش ها
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="{{route('home.profile.wishlist.index')}}"
                            @class(['active'=>request()->routeIs('home.profile.wishlist.index')])><i
                                class="mdi mdi-heart"></i>
                            لیست علاقه مندی
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="{{route('home.addreses.index')}}"
                            @class(['active'=>request()->routeIs('home.addreses.index')])><i
                                class="mdi mdi-map-outline"></i>
                            آدرس ها
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="{{route('home.user_profile.commentsList')}}"
                            @class(['active'=>request()->routeIs('home.user_profile.commentsList')])><i
                                class="mdi mdi-email-open-outline"></i>
                            نظرات
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="{{route('home.compare.index')}}"
                            @class(['active'=>request()->routeIs('home.compare.index')])><i class="mdi mdi-compare"></i>
                            لیست مقایسه
                        </a>
                    </li>
                    <li class="profile-account-nav-item navigation-link-dashboard">
                        <a href="{{route('home.user_profile.edit')}}"
                            @class(['active'=>request()->routeIs('home.user_profile.edit')])><i
                                class="mdi mdi-tooltip-text-outline"></i>
                             ویرایش اطلاعات
                        </a>
                    </li>
                </ul>
                <div class="profile-box-tabs">
                    <a href="javascript:void(0);"
                       onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                       class="profile-box-tab-sign-out"><i class="mdi mdi-logout-variant"></i>خروج از حساب</a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                </div>
            </footer>
        </section>
    </div>
</div>
<div class="col-12">
    <button onclick="openAccountSidebar()" class="btn btn-sm btn-info d-lg-none mb-3"><i class="fas fa-ellipsis-v"></i> منو کاربری</button>
</div>


