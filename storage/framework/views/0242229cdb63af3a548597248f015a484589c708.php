<?php $__env->startSection('title','لیست محصولات'); ?>
<div class="container-main">
    <div class="d-block">
        <div class="page-content page-row">
            <div class="main-row">
                <div id="breadcrumb">
                    <i class="mdi mdi-home"></i>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">خانه</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home.products.search')); ?>">فروشگاه</a></li>
                            <?php if($category): ?>
                            <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(["breadcrumb-item","acive"=>!$filterd['search'] && !$filterd['tag']]) ?>">
                                <?php if($filterd['search'] || $filterd['tag']): ?>
                                <a href="<?php echo e(route('home.products.search',$category->slug)); ?>"><?php echo e($category->name); ?></a>
                                <?php else: ?>
                                <?php echo e($category->name); ?>

                                <?php endif; ?>
                            </li>
                            <?php endif; ?>
                            <?php if($filterd['search']): ?>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php echo e('جستجوی: "'.$filterd['search'].'"'); ?>

                            </li>
                            <?php elseif($filterd['tag']): ?>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php echo e($filterd['tag']); ?>

                            </li>
                            <?php endif; ?>
                        </ol>
                    </nav>
                </div>

                <!-- start sidebar--------------------->
                <div class="col-md-3 d-none d-md-block pr sticky-sidebar">
                    <div class="shop-archive-sidebar">
                        <div class="sidebar-archive mb-3">
                            <section class="widget-product-categories">
                                <header class="cat-header">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-right" data-toggle="collapse"
                                            href="#headingOne" role="button" aria-expanded="false"
                                            aria-controls="headingOne">
                                            <?php if($routeName == 'home.products.index'): ?>
                                            <?php echo e($category->parent->name); ?>

                                            <?php elseif($routeName == 'home.products.search' && isset($category)): ?>
                                            <?php echo e($category->name); ?>

                                            <?php else: ?>
                                            دسته بندی ها
                                            <?php endif; ?>
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                    </h2>
                                </header>
                                <div class="product-filter">
                                    <div class="card">
                                        <div class="collapse show" id="headingOne">
                                            <div class="card-main mb-0">
                                                <?php if($routeName == 'home.products.index'): ?>
                                                <?php $__currentLoopData = $category->parent->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('home.products.index',$child->slug)); ?>">
                                                    <div class="form-auth-row">
                                                        <?php if($child->name == $category->name): ?>
                                                        <label for="#" class="ui-checkbox">
                                                            <input checked type="checkbox" disabled
                                                                id="check-<?php echo e($loop->index); ?>">
                                                            <span class="ui-checkbox-check"></span>
                                                        </label>
                                                        <label for="check-<?php echo e($loop->index); ?>"
                                                            class="remember-me"><?php echo e($child->name); ?></label>
                                                        <?php else: ?>
                                                        <label class="remember-me"
                                                            style="cursor: pointer;"><?php echo e($child->name); ?></label>
                                                        <?php endif; ?>
                                                    </div>
                                                </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php elseif($routeName == 'home.products.search' && isset($category)): ?>
                                                <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('home.products.index',$child->slug)); ?>">
                                                    <div class="form-auth-row">
                                                        <label for="#" class="ui-checkbox">
                                                            <input type="checkbox" id="check-<?php echo e($loop->index); ?>">
                                                            <span class="ui-checkbox-check"></span>
                                                        </label>
                                                        <label for="check-<?php echo e($loop->index); ?>" class="remember-me"
                                                            style="cursor: pointer;"><?php echo e($child->name); ?></label>
                                                    </div>
                                                </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('home.products.search',['slug'=>$category->slug])); ?>">
                                                    <div class="form-auth-row">
                                                        <label for="#" class="ui-checkbox">
                                                            <input type="checkbox" id="check-<?php echo e($loop->index); ?>">
                                                            <span class="ui-checkbox-check"></span>
                                                        </label>
                                                        <label for="check-<?php echo e($loop->index); ?>" class="remember-me"
                                                            style="cursor: pointer;"><?php echo e($category->name); ?></label>
                                                    </div>
                                                </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="widget-product-categories">
                                <header class="cat-header">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-right" data-toggle="collapse"
                                            href="#headingThree" role="button" aria-expanded="false"
                                            aria-controls="headingThree">
                                            محدوده قیمت
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                    </h2>
                                </header>
                                <div class="product-filter">
                                    <div class="card">
                                        <div class="collapse show" id="headingThree">
                                            <div class="card-main mb-0">
                                                <div class="box-data">
                                                    <div class="mt-5 mb-4">
                                                        <div wire:ignore id="slider-non-linear-step"></div>
                                                    </div>
                                                    <div class="filter-range mt-2 mb-2 pr">
                                                        <span>قیمت: </span>
                                                        <?php echo e(number_format($filterd['price']['low'])); ?> -
                                                        <?php echo e(number_format($filterd['price']['high'])); ?> تومان
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php if(isset($attributes)): ?>
                            <!-- filter between attributes -->
                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <section class="widget-product-categories" wire:key="attr-<?php echo e($attribute->id); ?>">
                                <header class="cat-header">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-right" data-toggle="collapse"
                                            href="#attribute-<?php echo e($attribute->id); ?>" role="button" aria-expanded="false"
                                            aria-controls="attribute-<?php echo e($attribute->id); ?>">
                                            <?php echo e($attribute->name); ?>

                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                    </h2>
                                </header>
                                <div class="product-filter">
                                    <div class="card">
                                        <div class="collapse show" id="attribute-<?php echo e($attribute->id); ?>">
                                            <div class="card-main mb-0">
                                                <?php $__currentLoopData = $attribute->categoryValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-auth-row"
                                                    wire:key="attr-<?php echo e($attribute->id); ?>-<?php echo e($loop->index); ?>">
                                                    <label for="#" class="ui-checkbox">
                                                        <input id="attr-<?php echo e($attribute->id); ?>-<?php echo e($loop->index); ?>"
                                                            <?php if(array_key_exists($attribute->id,$filterd['attribute'])
                                                        &&
                                                        in_array($value->value,$filterd['attribute'][$attribute->id])): echo 'checked'; endif; ?>
                                                        wire:click="addFilter('attribute','<?php echo e($attribute->id); ?>','<?php echo e($value->value); ?>')"
                                                        type="checkbox" value="1">
                                                        <span class="ui-checkbox-check"></span>
                                                    </label>
                                                    <label for="attr-<?php echo e($attribute->id); ?>-<?php echo e($loop->index); ?>"
                                                        class="remember-me"><?php echo e($value->value); ?></label>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if(isset($variation) && count($variation->variationValues) > 0): ?>
                            <!-- filter between variation -->
                            <section class="widget-product-categories">
                                <header class="cat-header">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-right" data-toggle="collapse"
                                            href="#variation-<?php echo e($variation->id); ?>" role="button" aria-expanded="false"
                                            aria-controls="variation-<?php echo e($variation->id); ?>">
                                            <?php echo e($variation->name); ?>

                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                    </h2>
                                </header>
                                <div class="product-filter">
                                    <div class="card">
                                        <div class="collapse show" id="variation-<?php echo e($variation->id); ?>">
                                            <div class="card-main mb-0">
                                                <?php $__currentLoopData = $variation->variationValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-auth-row" wire:key="var-<?php echo e($loop->index); ?>">
                                                    <label for="#" class="ui-checkbox">
                                                        <input id="var-<?php echo e($loop->index); ?>"
                                                            <?php if(array_key_exists($variation->id,$filterd['variation'])
                                                        &&
                                                        in_array($value->value,$filterd['variation'][$variation->id])): echo 'checked'; endif; ?>
                                                        wire:click="addFilter('variation','<?php echo e($variation->id); ?>','<?php echo e($value->value); ?>')"

                                                        type="checkbox" value="1">
                                                        <span class="ui-checkbox-check"></span>
                                                    </label>
                                                    <label for="var-<?php echo e($loop->index); ?>"
                                                        class="remember-me"><?php echo e($value->value); ?></label>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-xs-12 pl">
                    <div class="shop-archive-content mt-3 d-block">
                        <button class="btn mb-3 products-filter-btn d-md-none" onclick="openSidebar(event)">
                            <i class="fas fa-filter"></i> فیلترها
                        </button>
                        <div class="archive-header d-flex flex-wrap align-items-center">
                            <h2 class="archive-header-title ml-sm-auto">لیست محصولات</h2>
                            <?php if($initialFilter !== $filterd): ?>
                            <div class="ml-2">
                                <button class="btn btn-range" wire:click="resetFilters()">
                                    X حذف فیلترها
                                </button>
                            </div>
                            <?php endif; ?>
                            <div class="d-flex align-items-center">
                                <div class="sort-tabs mt-0 d-inline-block">
                                    <i class="fas fa-sort-amount-down"></i>
                                </div>
                                <div class="nav-sort-tabs-res ml-3 mr-1">
                                    <select class="custom-select custom-select-sm" wire:model="filterd.orderBy">
                                        <option value="default">پیش فرض</option>
                                        <option value="date-old">قدیمی ترین</option>
                                        <option value="date-new">جدیدترین</option>
                                        <option value="price-low">قیمت: کم به زیاد</option>
                                        <option value="price-high">قیمت: زیاد به کم</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="sort-tabs mt-0 d-inline-block">
                                    <i class="fas fa-th"></i>
                                </div>
                                <div class="nav-sort-tabs-res mr-1">
                                    <select class="custom-select custom-select-sm" wire:model="filterd.displayCount">
                                        <option value=12>نمایش 12</option>
                                        <option value=16>نمایش 16</option>
                                        <option value=24>نمایش 24</option>
                                        <option value=36>نمایش 36</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="product-items">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Most-visited" role="tabpanel"
                                    aria-labelledby="Most-visited-tab">
                                    <div class="row m-0">
                                        <?php echo $__env->renderEach('home.components.ProductCart3',$products,'product','home.partial.empty-products-list'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="pagination-product">
                            <?php echo e($products->onEachSide(1)->links()); ?>

                        </div>
                        <div class="loader" wire:loading.flex wire:target="filterd,addFilter">
                            درحال بارگذاری ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile product filter sidebar -->
    <div id="filter-sidebar" class="sidebar bg-light p-2">
        <div class="shop-archive-sidebar">
            <div class="pl-2 pb-2">
                <button class="sidebar-close mr-auto" onclick="closeSidebar(event)"><span
                        aria-hidden="true">X</span></button>
            </div>
            <div class="sidebar-archive mb-3">
                <section class="widget-product-categories">
                    <header class="cat-header">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-right" data-toggle="collapse" href="#headingOne"
                                role="button" aria-expanded="false" aria-controls="headingOne">
                                <?php if($routeName == 'home.products.index'): ?>
                                <?php echo e($category->parent->name); ?>

                                <?php elseif($routeName == 'home.products.search' && isset($category)): ?>
                                <?php echo e($category->name); ?>

                                <?php else: ?>
                                دسته بندی ها
                                <?php endif; ?>
                                <i class="mdi mdi-chevron-down"></i>
                            </button>
                        </h2>
                    </header>
                    <div class="product-filter">
                        <div class="card">
                            <div class="collapse show" id="headingOne">
                                <div class="card-main mb-0">
                                    <?php if($routeName == 'home.products.index'): ?>
                                    <?php $__currentLoopData = $category->parent->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('home.products.index',$child->slug)); ?>">
                                        <div class="form-auth-row">
                                            <?php if($child->name == $category->name): ?>
                                            <label for="#" class="ui-checkbox">
                                                <input checked type="checkbox" disabled id="check-<?php echo e($loop->index); ?>">
                                                <span class="ui-checkbox-check"></span>
                                            </label>
                                            <label for="check-<?php echo e($loop->index); ?>"
                                                class="remember-me"><?php echo e($child->name); ?></label>
                                            <?php else: ?>
                                            <label class="remember-me" style="cursor: pointer;"><?php echo e($child->name); ?></label>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php elseif($routeName == 'home.products.search' && isset($category)): ?>
                                    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('home.products.index',$child->slug)); ?>">
                                        <div class="form-auth-row">
                                            <label for="#" class="ui-checkbox">
                                                <input type="checkbox" id="check-<?php echo e($loop->index); ?>">
                                                <span class="ui-checkbox-check"></span>
                                            </label>
                                            <label for="check-<?php echo e($loop->index); ?>" class="remember-me"
                                                style="cursor: pointer;"><?php echo e($child->name); ?></label>
                                        </div>
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('home.products.search',['slug'=>$category->slug])); ?>">
                                        <div class="form-auth-row">
                                            <label for="#" class="ui-checkbox">
                                                <input type="checkbox" id="check-<?php echo e($loop->index); ?>">
                                                <span class="ui-checkbox-check"></span>
                                            </label>
                                            <label for="check-<?php echo e($loop->index); ?>" class="remember-me"
                                                style="cursor: pointer;"><?php echo e($child->name); ?></label>
                                        </div>
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="widget-product-categories">
                    <header class="cat-header">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-right" data-toggle="collapse" href="#headingThree"
                                role="button" aria-expanded="false" aria-controls="headingThree">
                                محدوده قیمت
                                <i class="mdi mdi-chevron-down"></i>
                            </button>
                        </h2>
                    </header>
                    <div class="product-filter">
                        <div class="card">
                            <div class="collapse show" id="headingThree">
                                <div class="card-main mb-0">
                                    <div class="box-data">
                                        <div class="mt-5 mb-4">
                                            <div wire:ignore id="slider-non-linear-step2"></div>
                                        </div>
                                        <div class="filter-range mt-2 mb-2 pr">
                                            <span>قیمت: </span>
                                            <?php echo e(number_format($filterd['price']['low'])); ?> -
                                            <?php echo e(number_format($filterd['price']['high'])); ?> تومان
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php if(isset($attributes)): ?>
                <!-- filter between attributes -->
                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <section class="widget-product-categories" wire:key="attr-side-<?php echo e($attribute->id); ?>">
                    <header class="cat-header">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-right" data-toggle="collapse"
                                href="#attribute-side-<?php echo e($attribute->id); ?>" role="button" aria-expanded="false"
                                aria-controls="attribute-side-<?php echo e($attribute->id); ?>">
                                <?php echo e($attribute->name); ?>

                                <i class="mdi mdi-chevron-down"></i>
                            </button>
                        </h2>
                    </header>
                    <div class="product-filter">
                        <div class="card">
                            <div class="collapse show" id="attribute-side-<?php echo e($attribute->id); ?>">
                                <div class="card-main mb-0">
                                    <?php $__currentLoopData = $attribute->categoryValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-auth-row" wire:key="attr-side-<?php echo e($attribute->id); ?>-<?php echo e($loop->index); ?>">
                                        <label for="#" class="ui-checkbox">
                                            <input id="attr-side-<?php echo e($attribute->id); ?>-<?php echo e($loop->index); ?>"
                                                <?php if(array_key_exists($attribute->id,$filterd['attribute']) &&
                                            in_array($value->value,$filterd['attribute'][$attribute->id])): echo 'checked'; endif; ?>
                                            wire:click="addFilter('attribute','<?php echo e($attribute->id); ?>','<?php echo e($value->value); ?>')"
                                            type="checkbox" value="1">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="attr-side-<?php echo e($attribute->id); ?>-<?php echo e($loop->index); ?>"
                                            class="remember-me"><?php echo e($value->value); ?></label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if(isset($variation) && count($variation->variationValues) > 0): ?>
                <!-- filter between variation -->
                <section class="widget-product-categories">
                    <header class="cat-header">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-right" data-toggle="collapse"
                                href="#variation-side-<?php echo e($variation->id); ?>" role="button" aria-expanded="false"
                                aria-controls="variation-side-<?php echo e($variation->id); ?>">
                                <?php echo e($variation->name); ?>

                                <i class="mdi mdi-chevron-down"></i>
                            </button>
                        </h2>
                    </header>
                    <div class="product-filter">
                        <div class="card">
                            <div class="collapse show" id="variation-side-<?php echo e($variation->id); ?>">
                                <div class="card-main mb-0">
                                    <?php $__currentLoopData = $variation->variationValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-auth-row" wire:key="var-side-<?php echo e($loop->index); ?>">
                                        <label for="#" class="ui-checkbox">
                                            <input id="var-side-<?php echo e($loop->index); ?>"
                                                <?php if(array_key_exists($variation->id,$filterd['variation']) &&
                                            in_array($value->value,$filterd['variation'][$variation->id])): echo 'checked'; endif; ?>
                                            wire:click="addFilter('variation','<?php echo e($variation->id); ?>','<?php echo e($value->value); ?>')"
                                            type="checkbox" value="1">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="var-side-<?php echo e($loop->index); ?>"
                                            class="remember-me"><?php echo e($value->value); ?></label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div onclick="closeSidebar(event)" class="filter-sidebar-overlay d-none"></div>
    <!-- end mobile product filter sidebar -->
</div>

<?php $__env->startPush('scripts'); ?>
<script>
// price range slider
var nonLinearStepSlider = document.getElementById("slider-non-linear-step");
var nonLinearStepSlider2 = document.getElementById("slider-non-linear-step2");

Livewire.on('filterReset', () => {
    nonLinearStepSlider.noUiSlider.reset();
    nonLinearStepSlider2.noUiSlider.reset()
})
if ($("#slider-non-linear-step").length) {
    noUiSlider.create(nonLinearStepSlider, {
        start: [0, parseInt("<?php echo e($filterd['price']['high']); ?>")],
        connect: true,
        step: 1000,
        direction: "rtl",
        format: wNumb({
            decimals: 0,
        }),
        range: {
            min: [0],
            max: [parseInt("<?php echo e($filterd['price']['high']); ?>")],
        },
    });

    nonLinearStepSlider.noUiSlider.on("change", function(values) {
        values.forEach((element, index) => {
            values[index] = parseInt(element);
        });
        Livewire.emit('priceRangeUpdated', values);
        nonLinearStepSlider2.noUiSlider.set(values);
    });
}
// sidebar price range slider
if ($("#slider-non-linear-step2").length) {
    noUiSlider.create(nonLinearStepSlider2, {
        start: [0, parseInt("<?php echo e($filterd['price']['high']); ?>")],
        connect: true,
        step: 1000,
        direction: "rtl",
        format: wNumb({
            decimals: 0,
        }),
        range: {
            min: [0],
            max: [parseInt("<?php echo e($filterd['price']['high']); ?>")],
        },
    });
    nonLinearStepSlider2.noUiSlider.on("change", function(values) {
        values.forEach((element, index) => {
            values[index] = parseInt(element);
        });
        Livewire.emit('priceRangeUpdated', values)
        nonLinearStepSlider.noUiSlider.set(values);
    });
}

function openSidebar() {
    $('#filter-sidebar').addClass('open')
    $('.filter-sidebar-overlay').removeClass('d-none');
}

function closeSidebar(event) {
    $('#filter-sidebar').removeClass('open')
    $('.filter-sidebar-overlay').addClass('d-none');
}
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/home/products-list.blade.php ENDPATH**/ ?>