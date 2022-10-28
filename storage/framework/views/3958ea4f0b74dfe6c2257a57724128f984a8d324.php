<aside id="leftsidebar" class="sidebar">

    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="<?php echo e(route('home')); ?>"><img
        src="<?php echo e($setting->logo ? asset('storage/logo/'.$setting->logo):'/images/logo.png'); ?>"
        style="margin-right:20px;max-height: 3rem;" alt="meta-webs"><span class="m-l-10"></span></a>
    </div>
    <div class="navbar-brand p-0 d-flex justify-content-around d-md-none">
        <span class="dropdown p-2">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown"
                role="button"><i class="zmdi zmdi-notifications text-black"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu js-right-sidebar">
                <li class="header">اطلاعیه ها</li>

                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.events.event-list')->html();
} elseif ($_instance->childHasBeenRendered('tVkD2Tb')) {
    $componentId = $_instance->getRenderedChildComponentId('tVkD2Tb');
    $componentTag = $_instance->getRenderedChildComponentTagName('tVkD2Tb');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('tVkD2Tb');
} else {
    $response = \Livewire\Livewire::mount('admin.events.event-list');
    $html = $response->html();
    $_instance->logRenderedChild('tVkD2Tb', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <li class="footer"> <a href="javascript:void(0);">مشاهده تمام اعلان ها</a> </li>
            </ul>
        </span>
        <span class="p-2"><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i
                    class="zmdi zmdi-settings zmdi-hc-spin text-black"></i></a></span>
        <span class="p-2"><a href="#"
                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class=""
                title="Sign Out"><i class="zmdi zmdi-power"></i></a>
            <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
        </span>
    </div>
    <div class="menu">
        <ul class="list pb-4" id="myList">
            <li>
                <div class="user-info">
                    <a class="image" href="#"><img default=""
                            src="<?php echo e(auth()->user()->avatar ? asset('storage/profile/'.auth()->user()->avatar) : asset('img/profile.png')); ?>"></a>
                    <div class="detail">
                        <h6><strong><?php echo e(auth()->user()->name??auth()->user()->cellphone); ?></strong></h6>
                        <small><?php echo e(auth()->user()->roles->first()->display_name); ?></small>
                    </div>
                </div>
            </li>

            <li>
                <div class="form-group row mr-1" id="search-item">
                    <label for="inputEmail3" class="col-11 col-form-label">جستجو </label>
                    <div class="col-11">
                        <input id="searchInput" class="form-control col-md-11" placeholder="یک عبارت بنویسید....">
                    </div>
                </div>
            </li>

            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.home')]) ?>">
                <a href="<?php echo e(route('admin.home')); ?>"><i class="zmdi zmdi-view-dashboard zmdi-hc-1x"></i><span>
                        داشبورد</span>
                </a>
            </li>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['users','roles','permissions'])): ?>
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active open'=>request()->routeIs('admin.users.*','admin.permissions','admin.roles.*')]) ?>"> <a
                    href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-hc-fw"></i><span>کاربران</span></a>
                <ul class="ml-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.users.*')]) ?>"><a
                            href=<?php echo e(route('admin.users.index')); ?>>لیست کاربران</a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles')): ?>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.roles.*')]) ?>"><a
                            href=<?php echo e(route('admin.roles.index')); ?>>گروه های کاربری</a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions')): ?>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.permissions')]) ?>"><a
                            href=<?php echo e(route('admin.permissions')); ?>>مجوز ها</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['products','categories','attributes','coupons'])): ?>
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active open'=>
                request()->routeIs('admin.archive','admin.products.*','admin.categories.*','admin.attributes.*','admin.coupons.*')]) ?>">
                <a href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-hc-fw"></i><span>فروشگاه</span></a>
                <ul class="ml-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products')): ?>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.products.index')]) ?>"><a
                            href=<?php echo e(route('admin.products.index')); ?>>لیست محصولات</a></li>

                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.archive')]) ?>"><a
                            href=<?php echo e(route('admin.archive')); ?>>لیست محصولات بایگانی شده</a></li>

                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.products.create')]) ?>"><a
                            href=<?php echo e(route('admin.products.create')); ?>>ایجاد محصول</a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories')): ?>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.categories.index')]) ?>"><a
                            href=<?php echo e(route('admin.categories.index')); ?>>دسته بندی ها</a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attributes')): ?>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.attributes.index')]) ?>"><a
                            href=<?php echo e(route('admin.attributes.index')); ?>>ویژگی ها</a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupons')): ?>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.coupons.index')]) ?>"><a
                            href=<?php echo e(route('admin.coupons.index')); ?>>کد تخفیف</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['orders','transactions'])): ?>
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active open'=> request()->routeIs('admin.orders.*','admin.transactions.*')]) ?>"> <a
                    href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-assignment-o"></i><span>سفارشات</span></a>
                <ul class="ml-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders')): ?>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.orders.index')]) ?>"><a
                            href=<?php echo e(route('admin.orders.index')); ?>>لیست سفارشات</a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transactions')): ?>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.transactions.index')]) ?>"><a
                            href=<?php echo e(route('admin.transactions.index')); ?>>لیست تراکنش ها</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('posts')): ?>
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active open'=> request()->routeIs('admin.posts.*')]) ?>"> <a href="javascript:void(0);"
                    class="menu-toggle"><i class="zmdi zmdi-border-color"></i><span>وبلاگ</span></a>
                <ul class="ml-menu">
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.posts.index')]) ?>"><a
                            href=<?php echo e(route('admin.posts.index')); ?>>لیست مطالب</a></li>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.posts.create')]) ?>"><a
                            href=<?php echo e(route('admin.posts.create')); ?>>ایجاد مطلب</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brands')): ?>
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active open'=> request()->routeIs('admin.brands.*')]) ?>"> <a href="javascript:void(0);"
                    class="menu-toggle"><i class="zmdi zmdi-star-circle"></i><span>برند
                        ها</span></a>
                <ul class="ml-menu">
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.brands.index')]) ?>"><a
                            href=<?php echo e(route('admin.brands.index')); ?>>لیست برند ها</a></li>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.brands.create')]) ?>"><a
                            href=<?php echo e(route('admin.brands.create')); ?>>ایجاد برند</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('banners')): ?>
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active open'=>request()->routeIs('admin.banners.*')]) ?>"> <a href="javascript:void(0);"
                    class="menu-toggle"><i class="zmdi zmdi-aspect-ratio-alt"></i><span>بنر
                        ها</span></a>
                <ul class="ml-menu">
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.banners.index')]) ?>"><a
                            href=<?php echo e(route('admin.banners.index')); ?>>لیست بنر ها</a></li>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.banners.create')]) ?>"><a
                            href=<?php echo e(route('admin.banners.create')); ?>>ایجاد بنر</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('services')): ?>
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active open'=>request()->routeIs('admin.services.*')]) ?>"> <a href="javascript:void(0);"
                    class="menu-toggle"><i class="zmdi zmdi-check-circle-u"></i><span>سرویس
                        ها</span></a>
                <ul class="ml-menu">
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.services.index')]) ?>"><a
                            href=<?php echo e(route('admin.services.index')); ?>>لیست سرویس ها</a></li>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.services.create')]) ?>"><a
                            href=<?php echo e(route('admin.services.create')); ?>>ایجاد سرویس</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tags')): ?>
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.tags.*')]) ?>"> <a href=<?php echo e(route('admin.tags.create')); ?>><i
                        class="zmdi zmdi-label"></i><span>تگ
                        ها</span></a>
            </li>
            <?php endif; ?>
            <li>
                <a target="_blank" href="https://app.raychat.io/login"><i class="zmdi zmdi-hc-fw"></i>
                    <span>چت آنلاین</span>
                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comments')): ?>
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.comments.*')]) ?>"> <a href=<?php echo e(route('admin.comments.index')); ?>>
                    <i class="zmdi zmdi-hc-fw"></i><span>نظرات</span></a>
            </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('events')): ?>
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.timeline.*')]) ?>"> <a href=<?php echo e(route('admin.timeline')); ?>>
                    <i class="zmdi zmdi-notifications"></i><span>مدیریت رویداد ها</span></a>
            </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('questions')): ?>
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.questions.*')]) ?>"> <a href=<?php echo e(route('admin.questions.index')); ?>>
                    <i class="zmdi zmdi-help-outline"></i><span>پرسش و پاسخ</span></a>
            </li>
            <?php endif; ?>

            <!-- تنظیمات -->
            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active open'=>request()->routeIs('admin.settings.*','admin.profile.*')]) ?>"> <a
                    href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-settings zmdi-hc-spin"></i><span>تنظیمات</span></a>
                <ul class="ml-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings')): ?>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.settings.show')]) ?>"><a
                            href="<?php echo e(route('admin.settings.show')); ?>">سایت</a></li>
                    <?php endif; ?>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.profile.edit')]) ?>"><a
                            href="<?php echo e(route('admin.profile.edit')); ?>">ویرایش پروفایل کاربری </a></li>
                    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>request()->routeIs('admin.profile.change-pass')]) ?>"><a
                            href="<?php echo e(route('admin.profile.change-pass')); ?>">تغییر کلمه عبور </a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$(document).ready(function() {
    if ($("#cheack_collapsed").hasClass("ls-toggle-menu")) {
        $('#search-item').hide();
    } else {
        $('#search-item').show();
    }

    $('.btn-menu').on('click', function() {
        if ($("#cheack_collapsed").hasClass("ls-toggle-menu")) {
            $('#search-item').hide();
        } else {
            $('#search-item').show();
        }
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/partial/LeftSidebar.blade.php ENDPATH**/ ?>