<?php $__env->startSection('title','فروشگاه اینترنتی کالا مارکت'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('home.partial.SliderMain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('home.partial.Adplacement', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- slidre-product------------------------>
<!-- فروش ویژه -->
<?php if($Products_special->count()): ?>
<section class="section-slider amazing-section pt-0">
    <div class="container-amazing col-12">
        <div class="col-lg-3 display-md-none pull-right">
            <div class="amazing-product text-center">
                <a href="#">
                    <img src="assets/home/images/slider-amazing/shopping-cart.svg" alt="special">
                </a>
                </br>
                <a href="<?php echo e(route('home.products.search',['label'=>'فروش ویژه'])); ?>" class="title-one text-white ">مشاهده همه <i class="fa fa-angle-left"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-9 col-md-12 pull-left pr-1">
            <div class="slider-widget-products mb-0">
                <div class="widget widget-product card" style="padding:10px ;">
                    <header class="card-header">
                        <span class="title-one">فروش ویژه</span>
                        <a href="<?php echo e(route('home.products.search',['label'=>'فروش ویژه'])); ?>" class="card-title">مشاهده همه <i class="fa fa-angle-left"></i></a>
                    </header>
                    <div class="product-carousel productcar owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 827px;">
                                <?php echo $__env->renderEach('home.components.ProductCart2', $Products_special,
                                'Product_special'); ?>
                            </div>
                        </div>
                        <div class="owl-nav">
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!--  پایان محصولات ویژه -->
<!-- پیشنهاد ما -->
<div class="container-main">
    <div class="d-block">
        <?php if($Products_our_suggestion->count()): ?>
        <div
            class="<?php echo e($Products_our_suggestion_units->count() ? 'col-lg-9 col-md-9 col-xs-12 pr order-1 d-block' : 'col-lg-12 col-md-12 col-xs-12 pr order-1 d-block'); ?>">
            <div class="slider-widget-products">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">پیشنهاد ما</span>
                        <a href="<?php echo e(route('home.products.search',['label'=>'پیشنهاد ما'])); ?>"><span class="title-one-0 pl">مشاهده همه <i class="fa fa-angle-left"></i></span></a>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                <?php echo $__env->renderEach('home.components.ProductCart1', $Products_our_suggestion,
                                'Product_special'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- پایان پیشنهاد ما -->
        <input type="hidden" value="1" id="qtybutton">
        <!-- slider-moment پیشنهاد لحظه ای------------------------->
        <?php if($Products_our_suggestion_units->count()): ?>
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
                                <?php echo $__env->renderEach('home.components.ProductSuggestion', $Products_our_suggestion_units,
                                'Products_our_suggestion_unit'); ?>
                            </div>
                        </div>
                    </div>
                    <div id="progressBar">
                        <div class="slide-progress" style="width: 100%; transition: width 5000ms ease 0s;"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- پایان پیشنهاد لحظه ای -->
        <!-- بنر های دوتایی وسط -->
        <div class="container-main">
            <div class="adplacement-container-row">
                <?php $__currentLoopData = $centers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $center): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-lg-6 col-md-6 pr">
                    <a href="<?php echo e($center->link); ?>" class="adplacement-item">
                        <div class="adplacement-sponsored_box">
                            <img src="<?php echo e(url(env('BANNER_IMAGES_PATCH').$center->image)); ?>">
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!--پایان بنر های دوتایی وسط -->
        <!-- slider-product------------------------------->
        <?php $__currentLoopData = $products_is_show; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_is_show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-12 col-md-12 col-xs-12 pr order-1 d-block">
            <div class="slider-widget-products">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one"><?php echo e($product_is_show->name); ?></span>
                        <a href="<?php echo e(route('home.products.index',$product_is_show->slug)); ?>"><span class="title-one-0 pl">مشاهده همه <i class="fa fa-angle-left"></i></span></a>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                <?php echo $__env->renderEach('home.components.ProductCart1', $product_is_show->products,
                                'Product_special'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- slider-product end------------------------------->


        <!-- brand--------------------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pr order-1 d-block">
            <div class="slider-widget-products">
                <div class="widget widget-product card mb-0">
                    <div class="product-carousel-brand owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="owl-item active" style="width: 190.75px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="<?php echo e($brand->link); ?>" class="d-block hover-img-link">
                                            <img src="<?php echo e(url(env('BRAND_IMAGES_PATCH').$brand->image)); ?>"
                                                class="img-fluid img-brand" alt="<?php echo e($brand->slug); ?>">
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand end----------------------------------------->
    </div>
</div>
<!-- footer------------------------------------------->

<?php $__env->startPush('styles'); ?>
<style>
.owl-carousel {
    touch-action: manipulation;
}
</style>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>


<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/home.blade.php ENDPATH**/ ?>