<?php $__env->startSection('title', "خانه - مقایسه"); ?>
<?php $__env->startSection('content'); ?>
<!-- product-comparison-------------------->
<main class="main-row p-0">
    <div class="container-main">
        <div class="col-12">
            <div id="breadcrumb">
                <i class="mdi mdi-home"></i>
                <nav aria-label="breadcrumb" class="p-1">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">خانه</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home.user_profile')); ?>">پروفایل</a></li>
                        <li class="breadcrumb-item active open" aria-current="page">لیست مقایسه</li>
                    </ol>
                </nav>
            </div>
            <div class="comparison m-0">
                <table class="table mt-5 mb-5">
                    <thead>
                        <tr>
                            <td class="align-middle">
                                <div class="form-ui px-0">
                                    <center>
                                        <h6>تصویر و نام محصول</h6>
                                    </center>
                                </div>
                                <div class="form-auth-row pr">
                                </div>
                            </td>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <div class="comparison-item">
                                    <span class="remove-item">
                                        <a href="<?php echo e(route('home.compare.remove' , ['product' => $product->id])); ?>">
                                            <i class="mdi mdi-close"></i>
                                        </a>
                                    </span>
                                    <a class="comparison-item-thumb"
                                        href="<?php echo e(route('home.products.show' , ['product' => $product->slug])); ?>">
                                        <img src="<?php echo e(url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)); ?>"
                                            alt="<?php echo e($product->title); ?>">
                                    </a>
                                    <a class="comparison-item-title"
                                        href="<?php echo e(route('home.products.show' , ['product' => $product->slug])); ?>">
                                        <?php echo e($product->name); ?></a>
                                </div>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- رتبه بندی -->
                        <tr>
                            <th>
                                <center>
                                    رتبه بندی ها و نظرات
                                </center>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <center>
                                    <span data-rating-stars="5" data-rating-readonly="true"
                                        data-rating-value="<?php echo e(ceil($product->rates->avg('rate'))); ?>">
                                    </span>
                                </center>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <!-- دسته بندی -->
                        <tr>
                            <th>
                                <center>
                                    دسته بندی
                                </center>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <center>
                                    <div class="compare-col compare-value">
                                        <?php echo e($product->category->parent->name); ?> - <?php echo e($product->category->name); ?>

                                    </div>
                                </center>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <!-- قیمت محصول -->
                        <tr>
                            <th>
                                <center>
                                    قیمت محصول
                                </center>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <center>
                                    <?php if($product->quantity_check): ?>
                                    <?php if($product->sale_check): ?>
                                    <div class="compare-col compare-value">
                                        <div class="product-price">
                                            <span class="new-price"><?php echo e(number_format($product->sale_check->sale_price)); ?>

                                                تومان</span></br>
                                            <del>
                                                <span class="old-price"><?php echo e(number_format($product->sale_check->price)); ?>

                                                    تومان</span>
                                            </del>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="compare-col compare-value">
                                        <div class="product-price">
                                            <span class="new-price"><?php echo e(number_format($product->price_check->price)); ?>

                                                تومان</span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <div class="compare-col compare-value">
                                        <div class="product-price">
                                            <span class="new-price">نا موجود</span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </center>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <!-- توضیح محصول -->
                        <tr>
                            <th>
                                <center>
                                    توضیحات
                                </center>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <center>
                                    <?php echo e($product->description); ?>

                                </center>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <!-- ویژگی ها -->
                        <tr>
                            <th>
                                <center>
                                    ویژگی متغییر
                                </center>
                            </th>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <center>
                                    <?php echo e(App\Models\Attribute::find($product->variations->first()->attribute_id)->name); ?>:
                                    <?php $__currentLoopData = $product->variations()->where('quantity', '>' , 0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($variation->value); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </center>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <!-- ویژگی اصلی -->
                        <?php $__currentLoopData = $product->attributes()->with('attribute')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th>
                                <center>
                                    <?php echo e($attribute->attribute->name); ?>

                                </center>
                            </th>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <center>
                                    <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pattributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pattributes->attribute_id == $attribute->attribute_id): ?>
                                    <?php echo e($pattributes->value); ?>

                                    <?php else: ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </center>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- product-comparison-------------------->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/compare/index.blade.php ENDPATH**/ ?>