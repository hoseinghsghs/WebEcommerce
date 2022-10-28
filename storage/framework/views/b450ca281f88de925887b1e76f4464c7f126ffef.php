<?php $__env->startSection('title', "خانه -". $product->slug); ?>
<?php $__env->startSection('content'); ?>
<div class="container-main">
    <div class="d-block">
        <div class="page-content page-row">
            <div class="main-row p-0">
                <div id="breadcrumb">
                    <i class="mdi mdi-home"></i>
                    <nav aria-label="breadcrumb" class="p-1">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">خانه</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home.products.search',$product->category->parent->slug)); ?>"><?php echo e($product->category->parent->name); ?></a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home.products.index',$product->category->slug)); ?>">
                                    <?php echo e($product->category->name); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($product->name); ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg">
                    <div class="product type-product">
                        <div class="col-lg-5 col-xs-12 pr d-block" style="padding: 0;">
                            <section class="product-gallery">
                                <div class="gallery">
                                    <div class="gallery-item">
                                        <div>
                                            <ul class="gallery-actions">
                                                <li>
                                                    <?php if(Auth::check()): ?>
                                                    <?php if($product->checkUserWishlist(auth()->user()->id)): ?>
                                                    <a href="#" data-product="<?php echo e($product->id); ?>" class="btn-option add-product-wishes active">
                                                        <i class="fa fa-heart-o"></i>
                                                        <span>محبوب</span>
                                                    </a>
                                                    <?php else: ?>
                                                    <a href="#" data-product="<?php echo e($product->id); ?>" class="btn-option add-product-wishes ">
                                                        <i class="fa fa-heart-o"></i>
                                                        <span>محبوب</span>
                                                    </a>
                                                    <?php endif; ?>
                                                    <?php else: ?>
                                                    <a href="#" data-product="<?php echo e($product->id); ?>" class="btn-option add-product-wishes ">
                                                        <i class="fa fa-heart-o"></i>
                                                        <span>محبوب</span>
                                                    </a>
                                                    <?php endif; ?>
                                                </li>
                                                <li class="option-social">
                                                    <a href="#" class="btn-option btn-option-social" data-toggle="modal" data-target="#option-social">
                                                        <i class="fa fa-share-alt"></i>
                                                        <span>اشتراک</span>
                                                    </a>
                                                    <!-- Modal-option-social -->
                                                    <div class="modal fade" id="option-social" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">اشتراک گذاری
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="title">با استفاده از روش‌های زیر
                                                                        می‌توانید این صفحه را با دیگران به اشتراک
                                                                        بگذارید. <div class="share-options">
                                                                            <div class="share-social-buttons text-center">
                                                                                <a href="https://www.linkedin.com/shareArticle?mini=true&title=<?php echo e(route('home.products.show' , ['product' => $product->slug])); ?>" class="share-social share-social-twitter">
                                                                                    <i class="mdi mdi-linkedin"></i>
                                                                                </a>
                                                                                <a href="https://telegram.me/share/url?url=<?php echo e(route('home.products.show' , ['product' => $product->slug])); ?>" class="share-social share-social-facebook">
                                                                                    <i class="mdi mdi-telegram"></i>
                                                                                </a>
                                                                                <a href="https://web.whatsapp.com/send?text=<?php echo e(route('home.products.show' , ['product' => $product->slug])); ?>" class="share-social share-social-whatsapp">
                                                                                    <i class="mdi mdi-whatsapp"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </li>
                                                <li class="Three-dimensional"> <?php if(session()->has('compareProducts')): ?>
                                                    <?php if(in_array($product->id,
                                                    session()->get('compareProducts')) ): ?>
                                                    <a href="product-comparison.html" data-product="<?php echo e($product->id); ?>" class="btn-option btn-compare" style="color: #651fff;">
                                                        <i class="fa fa-random"></i>
                                                        <span>مقایسه</span>
                                                    </a> <?php else: ?>
                                                    <a href="product-comparison.html" data-product="<?php echo e($product->id); ?>" class="btn-option btn-compare">
                                                        <i class="fa fa-random"></i>
                                                        <span>مقایسه</span>
                                                    </a>
                                                    <?php endif; ?> <?php else: ?>
                                                    <a href="product-comparison.html" data-product="<?php echo e($product->id); ?>" class="btn-option btn-compare">
                                                        <i class="fa fa-random"></i>
                                                        <span>مقایسه</span>
                                                    </a>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="gallery-item">
                                        <div class="gallery-img">
                                            <a href="#">
                                                <img class="zoom-img" id="img-product-zoom" src="<?php echo e(url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)); ?>" data-zoom-image="<?php echo e(url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)); ?>" width="411" />
                                                <div id="gallery_01f" style="width:420px;float:right;">
                                            </a>
                                            <ul class="gallery-items owl-carousel owl-theme" id="gallery-slider">
                                                <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="item">
                                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php echo e(url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value->image)); ?>" data-zoom-image="<?php echo e(url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value->image)); ?>">
                                                        <img src="<?php echo e(url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value->image)); ?>" width="100" /></a>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-7 col-xs-12 pl mt-5 d-block">
                            <section class="product-info">
                                <div class="product-headline">
                                    <h1 class="product-title">
                                        <?php echo e($product->name); ?>

                                    </h1>
                                    <div class="product-guaranteed" style="color: #651fff !important;">
                                        میزان رضایت:
                                        <span><span data-rating-stars="5" data-rating-readonly="true" data-rating-value="<?php echo e(ceil($product->rates->avg('satisfaction'))); ?>">
                                            </span></span>
                                    </div>
                                </div>
                                <div class="product-attributes">
                                    <div class="product-config">
                                        <span class="product-title-en">کد محصول: </span><span class="sku product-title-en"></span>
                                    </div>
                                </div>
                                <div class="product-config-wrapper">
                                    <div class="product-directory">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-archive"></i> دسته:
                                                </span>
                                                <a href="<?php echo e(route('home.products.search',$product->category->parent->slug)); ?>" class="product-link product-cat-title"><?php echo e($product->category->parent->name); ?></a>
                                                ,
                                                <a href="<?php echo e(route('home.products.index',$product->category->slug)); ?>" class="product-link product-cat-title"><?php echo e($product->category->name); ?></a>
                                            </li>
                                            <?php if($product->tags->count()>0): ?>
                                            <li>
                                                <span>
                                                    <i class="fa fa-tags"></i> برچسب:
                                                </span>
                                                <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <a href="<?php echo e(route('home.products.search',['tag'=>$tag->name])); ?>" class="product-link product-tag-title"><?php echo e($tag->name); ?> ،</a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </li>
                                            <?php endif; ?>
                                            <?php if($product->brand): ?>
                                            <li>
                                                <span>
                                                    برند:
                                                </span>
                                                <a href="<?php echo e(route('home.products.search',['brand'=>$product->brand->slug])); ?>" class="product-link product-tag-title"><?php echo e($product->brand->name); ?></a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <?php
                                    if($product->sale_check)
                                    {
                                    $variationProductSelected = $product->sale_check;
                                    }else{
                                    $variationProductSelected = $product->price_check;
                                    }
                                    ?>
                                    <div class="col=lg-6 col-md-6 col-xs-12 pr">
                                        <div class="product-params">
                                            <?php if($main_attributes->count()>0): ?>
                                            <ul data-title="ویژگی‌های محصول">
                                                <?php $__currentLoopData = $main_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <span><?php echo e($attribute->attribute->name); ?>:</span>
                                                    <span><?php echo e($attribute->value); ?></span>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <?php endif; ?>
                                            <?php if($product->quantity_check): ?>
                                            <ul data-title="<?php echo e(App\Models\Attribute::find($product->variations->first()->attribute_id)->name); ?>:">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8 col-xs-12 pr">
                                                            <select name="variation" id="var-select" style="display: inline; width: 75%;" class="select-var form-control form-control-sm" id="varition">
                                                                <?php
                                                                $var=$product->variations()->where('quantity', '>' ,
                                                                0)->get();
                                                                ?> <?php $__currentLoopData = $var; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e(json_encode($variation->only(['id' , 'sku' ,'guarantee' ,'time_guarantee' , 'quantity','is_sale' , 'sale_price' , 'price']))); ?>" <?php echo e($variationProductSelected->id == $variation->id ? 'selected' : ''); ?>>
                                                                    <?php echo e($variation->value); ?>

                                                                </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col=lg-6 col-md-6 col-xs-12 pr">
                                        <div class="product-seller-info">
                                            <div class="seller-info-changable">
                                                <div class="product-seller-row vendor">
                                                    <span class="title"> فروشنده:</span>
                                                    <a class="product-name"><?php echo e(env('APP_NAME')); ?></a>
                                                </div>
                                                <?php if($product->quantity_check): ?>
                                                <div class="product-seller-row guarantee1">
                                                    <span class="title"> گارانتی:</span>
                                                    <a class="product-name" id="guarantee"></a>
                                                </div>
                                                <div class="product-seller-row guarantee2">
                                                    <span class="title"> مدت گارانتی:</span>
                                                    <a class="product-name" id="time_guarantee"></a>
                                                </div>
                                                <?php endif; ?>
                                                <div class="product-seller-row price">
                                                    <span class="title"> قیمت:</span>
                                                    <a class="product-name variation-price">
                                                        <?php if($product->quantity_check): ?> <?php if($product->sale_check): ?>
                                                        <div class="amount">
                                                            <?php echo e(number_format($product->sale_check->sale_price)); ?>

                                                            تومان
                                                        </div> </br>
                                                        <del> <?php echo e(number_format($product->sale_check->price)); ?>

                                                            تومان </del>
                                                        <?php else: ?>
                                                        <span class="amount"><?php echo e(number_format($product->price_check->price)); ?>

                                                            تومان</span>
                                                        <?php endif; ?>
                                                        <?php else: ?>
                                                        <span class="amount">نا موجود</span>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="product-seller-row guarantee">
                                                    <span class="title mt-3"> تعداد:</span>
                                                    <div class="quantity pl">
                                                        <input type="number" class="numberstyle" min="1" step="1" name="qtybutton" id="qtybutton" readonly value="1">
                                                        <div class="quantity-nav">
                                                            <div class="quantity-button quantity-up">+</div>
                                                            <div class="quantity-button quantity-down">-</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if($product->quantity_check): ?> <input type="hidden" id="product_id" name="product" value="<?php echo e($product->id); ?>">
                                                <div class="product-seller-row add-to-cart">
                                                    <a href="#" class="btn-add-to-cart btn btn-primary" data-ishome="0">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span class="btn-add-to-cart-txt">افزودن به سبد خرید</span>
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabs" id="respon">
            <div class="tab-box">
                <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(count($errors) > 0 ? '' : 'active'); ?> " id="Review-tab" style="margin-left: -1.6rem;" data-toggle="tab" href="#Review" role="tab" aria-controls="Review" aria-selected="<?php echo e(count($errors) > 0 ? 'false' : 'true'); ?>">
                            <i class="mdi mdi-glasses"></i>
                            نقد و بررسی
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Specifications-tab" style="margin-left: -1.6rem;" data-toggle="tab" href="#Specifications" role="tab" aria-controls="Specifications" aria-selected="false">
                            <i class="mdi mdi-format-list-checks"></i>
                            مشخصات
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="User-comments-tab" style="margin-left: -1.6rem;" data-toggle="tab" href="#User-comments" role="tab" aria-controls="User-comments" aria-selected="false">
                            <i class="mdi mdi-comment-text-multiple-outline"></i>
                            نظرات کاربران
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(count($errors) > 0 ? 'active' : ''); ?>" style="margin-left: -1.6rem;" id="question-and-answer-tab" data-toggle="tab" href="#question-and-answer" role="tab" aria-controls="question-and-answer" aria-selected="<?php echo e(count($errors) > 0 ? 'true' : 'false'); ?>">
                            <i class="mdi mdi-comment-question-outline"></i>
                            پرسش و پاسخ
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg">
                <div class="tabs-content">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade <?php echo e(count($errors) > 0 ? '' : 'show active'); ?>" id="Review" role="tabpanel" aria-labelledby="Review-tab">
                            <h2 class="params-headline">نقد و بررسی اجمالی</h2>
                            <section class="content-expert-summary">
                                <div class="mask pm-3">
                                    <div class="mask-text">
                                        <p>
                                            <?php echo $product->description; ?>

                                        </p>
                                    </div>
                                    <a href="#" class="mask-handler">
                                        <span class="show-more">+ ادامه مطلب</span>
                                        <span class="show-less">- بستن</span>
                                    </a>
                                    <div class="shadow-box"></div>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="Specifications" role="tabpanel" aria-labelledby="Specifications-tab">
                            <article>
                                <h2 class="params-headline">مشخصات فنی
                                    <span><?php echo e($product->name); ?></span>
                                </h2>
                                <section>
                                    <ul class="params-list">
                                        <?php $__currentLoopData = $product->attributes()->with('attribute')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="params-list-item">
                                            <div class="params-list-key">
                                                <span class="block"><?php echo e($attribute->attribute->name); ?></span>
                                            </div>
                                            <div class="params-list-value">
                                                <span class="block">
                                                    <?php echo e($attribute->value); ?>

                                                </span>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </section>
                            </article>
                        </div>
                        <div class="tab-pane fade" id="User-comments" role="tabpanel" aria-labelledby="User-comments-tab">
                            <div class="comments">
                                <h2 class="params-headline">امتیاز کاربران به
                                    <span>Samsung Galaxy Note 10 Dual SIM 256GB Mobile Phone</span>
                                </h2>
                                <div class="comments-summary">
                                    <div class="col-lg-6 col-md-6 col-xs-12 pr">
                                        <div class="comments-summary-box">
                                            <ul class="comments-item-rating">
                                                <li>
                                                    <span class="cell-title">ارزش خرید نسبت به قیمت
                                                        :</span>
                                                    <span class="cell-value"></span>
                                                    <div class="rating-general">
                                                        <div class="rating-value" style="width: <?php echo e((ceil($product->rates->avg('cost'))*100)/5); ?>%;">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="cell-title">کیفیت:</span>
                                                    <span class="cell-value"></span>
                                                    <div class="rating-general">
                                                        <div class="rating-value" style="width: <?php echo e((ceil($product->rates->avg('quality'))*100)/5); ?>%;">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="cell-title">میزان رضایت کلی از محصول
                                                        :</span>
                                                    <span class="cell-value"></span>
                                                    <div class="rating-general">
                                                        <div class="rating-value" style="width: <?php echo e((ceil($product->rates->avg('satisfaction'))*100)/5); ?>%;">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12 pr">
                                        <div class="comments-summary-note">
                                            <h6>شما هم می‌توانید در مورد این کالا نظر بدهید.</h6>
                                            <p>
                                                برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود شوید. اگر این
                                                محصول را قبلا از دیجی‌کالا خریده باشید،
                                                نظر
                                                شما به عنوان مالک محصول ثبت خواهد شد.
                                            </p> <?php if(auth()->user()): ?>
                                            <?php $__currentLoopData = auth()->user()->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $cheak_item=App\Models\OrderItem::where('order_id' ,
                                            $order->id)->where('product_id'
                                            , $product->id)->first();
                                            ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($cheak_item)): ?>
                                            <button type="button" class="btn-add-comment btn btn-secondary" data-toggle="modal" data-target="#comment-modal">
                                                ارسال نظر
                                            </button>
                                            <?php endif; ?> <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="product-comment-list">
                                        <ul class="comment-list">
                                            <?php $__currentLoopData = $product->approvedComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li style="border: 1px solid #d4c2f7;border-radius: 20px;">
                                                <div class="col-lg-3 pr">
                                                    <section>
                                                        <div class="comments-user-shopping mt-3 mr-1 p-2 row">
                                                            <div class="col-6 mt-2">
                                                                <img src="/assets/home/images/man.png" alt="">
                                                            </div>
                                                            <div class="col-6">
                                                                <?php echo e($comment->user->name == null ? "بدون نام" : $comment->user->name); ?>

                                                                <div class="cell-date">
                                                                    <?php echo e(Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('Y/n/j')); ?>

                                                                </div> <span data-rating-stars="5" data-rating-readonly="true" data-rating-value="<?php echo e(ceil($comment->commentable->rates->avg('satisfaction'))); ?>">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div class="col-lg-9 pl">
                                                    <div class="article">
                                                        <ul class="comment-text">
                                                            <div class="header">
                                                                <div><?php echo e($comment->title); ?></div>
                                                                <p><?php echo e($comment->text); ?></p>
                                                            </div>
                                                            <div class="comments-evaluation">
                                                                <div class="comments-evaluation-positive">
                                                                    <span>نقاط قوت</span>
                                                                    <ul>
                                                                        <?php
                                                                        $comment['advantages'] =
                                                                        json_decode($comment->advantages);
                                                                        ?>
                                                                        <?php $__currentLoopData = $comment->advantages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li>
                                                                            <?php echo e($item); ?>

                                                                        </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                </div>
                                                                <div class="comments-evaluation-negative">
                                                                    <span>نقاط ضعف</span>
                                                                    <ul>
                                                                        <?php
                                                                        $comment['disadvantages'] =
                                                                        json_decode($comment->disadvantages);
                                                                        ?>
                                                                        <?php $__currentLoopData = $comment->disadvantages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li>
                                                                            <?php echo e($item); ?>

                                                                        </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade <?php echo e(count($errors) > 0 ? 'show active' : ''); ?>" id="question-and-answer" role="tabpanel" aria-labelledby="question-and-answer-tab">
                            <div class="faq">
                                <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class=" col-md-6 mb-4">
                                    <div class="alert alert-icon alert-error alert-bg alert-inline">
                                        <h4 class="alert-title">
                                            <i class="w-icon-times-circle"></i>
                                        </h4> <?php echo e($error); ?>

                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?> <form action="<?php echo e(route('home.questions.store' , ['product' => $product->id])); ?>" method="POST" class="review-form">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-faq-row mt-4">
                                        <div class="form-faq-col">
                                            <div class="ui-textarea">
                                                <label>نام شما</label>
                                                <input type="text" name="name" class="form-control" id="author" class="ui-textarea-field">
                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-faq-row mt-4">
                                        <div class="form-faq-col">
                                            <div class="ui-textarea">
                                                <label>ایمیل</label>
                                                <input type="text" name="email" class="form-control" id="email_1" class="ui-textarea-field">
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-faq-row mt-4">
                                        <div class="form-faq-col">
                                            <div class="ui-textarea">
                                                <textarea title="متن سوال" placeholder="متن پرسش و پاسخ ..... " name="text" cols="30" rows="6" id="review" class="ui-textarea-field"></textarea>
                                                <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-faq-row mt-4">
                                        <div class="form-faq-col form-faq-col-submit">
                                            <button class="btn-tertiary btn btn-secondary" type="submit">ثبت
                                                پرسش</button>
                                        </div>
                                    </div>
                                </form>
                                <div id="product-questions-list"> <?php $__currentLoopData = $product->approvedQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="questions-list mb-2">
                                        <ul class="faq-list">
                                            <li class="is-question">
                                                <div class="section">
                                                    <div class="faq-header">
                                                        <span class="icon-faq">?</span>
                                                        <p class="h5">
                                                            پرسش :
                                                            <span><?php echo e($question->user->name == null ? "بدون نام" : $question->user->name); ?></span>
                                                        </p>
                                                        <p><?php echo $question->text; ?></p>
                                                    </div>
                                                    <div class="faq-date">
                                                        <em><?php echo e(Hekmatinasser\Verta\Verta::instance($question->created_at)->format('Y/n/j')); ?></em>
                                                    </div>
                                                    <a onclick="reply('<?php echo e($question->id); ?>')" class="btn btn-link" id="btn-question-show">
                                                        پاسخ
                                                        <i class="fa fa-reply"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <form style="margin-right: 4rem;margin-left: 4px;display: none;" id="reply-form-<?php echo e($question->id); ?>" action="<?php echo e(route('questions.reply.add' , ['product' => $product->id , 'question' => $question->id])); ?>" method="POST" class="review-form ">
                                        <?php echo csrf_field(); ?> <div class="form-faq-col">
                                            <textarea name="text" cols="30" rows="5" style="background-color:#fbfbfb; border-radius: 1rem;" placeholder="پاسخ ..." class="form-control mt-2" id="review"></textarea>
                                            <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <button class="btn-tertiary btn btn-secondary mt-2" type="submit">ثبت
                                                پاسخ</button>
                                        </div>
                                    </form>
                                    <?php $__currentLoopData = $question->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($reply->approved == 1): ?>
                                    <div class="questions-list answer-questions">
                                        <ul class="faq-list">
                                            <li class="is-question">
                                                <div class="section">
                                                    <div class="faq-header">
                                                        <span class="icon-faq"><i class="fa fa-reply"></i></span>
                                                        <p class="h5">
                                                            پاسخ :
                                                            <span><?php echo e($reply->user->name == null ? "بدون نام" : $reply->user->name); ?></span>
                                                        </p>
                                                    </div>
                                                    <div style="word-wrap: break-word;">
                                                        <span><?php echo $reply->text; ?></span>
                                                    </div>
                                                    <div class="faq-date">
                                                        <em><?php echo e(Hekmatinasser\Verta\Verta::instance($reply->created_at)->format('Y/n/j')); ?></em>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> <?php $__currentLoopData = $reply->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($reply->approved == 1): ?>
                                    <div class="questions-list answer-questions" style="width: 89% !important;">
                                        <ul class="faq-list">
                                            <li class="is-question">
                                                <div class="section">
                                                    <div class="faq-header">
                                                        <span class="icon-faq" style="size:3rem ;"><i class="fa fa-reply-all"></i></span>
                                                        <p class="h5">
                                                            پاسخ :
                                                            <span><?php echo e($reply->user->name == null ? "بدون نام" : $reply->user->name); ?></span>
                                                        </p>
                                                    </div>
                                                    <p><?php echo $reply->text; ?></p>
                                                    <div class="faq-date">
                                                        <em><?php echo e(Hekmatinasser\Verta\Verta::instance($reply->created_at)->format('Y/n/j')); ?></em>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- modal -->
<div class="modal fade bd-example-modal-lg" id="comment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">نظر خریدار</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('home.comments.store' , ['product' => $product->id])); ?>" method="POST" id="addCommentForm">
                    <?php echo csrf_field(); ?> <section class="product-comment">
                        <div class="comments-product">
                            <div class="comments-product-row">
                                <div class="col-lg-12 col-md-12 col-xs-12 pull-left">
                                    <div class="comments-product-col-info">
                                        <div class="comments-product-attributes px-3">
                                            <div class="row">
                                                <div class="col-sm-12 col-12 mb-3">
                                                    <div class="comments-product-attributes-title">ارزش خرید نسبت به
                                                        قیمت</div> <input type="range" class="cost form-control-range" name="cost" id="formControlRange" min="1" max="5" step="1" onInput="setlable('cost')">
                                                </div>
                                                <center>
                                                    <span id="rangeva1" class="bg-primary text-white p-1" style="border-radius: 1rem;">
                                                        خوب
                                                    </span>
                                                </center>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-12 mb-3">
                                                    <div class="comments-product-attributes-title">کیفیت</div> <input type="range" class="quality form-control-range" name="quality" id="formControlRange" min="1" max="5" step="1" onInput="setlable('quality')">
                                                </div>
                                                <center>
                                                    <span id="rangeva2" class="bg-primary text-white p-1" style="border-radius: 1rem;">
                                                        خوب
                                                    </span>
                                                </center>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-12 mb-3">
                                                    <div class="comments-product-attributes-title">میزان رضایت کلی از
                                                        محصول</div> <input type="range" class="satisfaction form-control-range" name="satisfaction" id="formControlRange" min="1" max="5" step="1" onInput="setlable('satisfaction')">
                                                </div>
                                                <center>
                                                    <span id="rangeva3" class="bg-primary text-white p-1" style="border-radius: 1rem;">
                                                        خوب
                                                    </span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comments-add">
                                    <div class="comments-add-row d-inline-block">
                                        <div class="col-lg-12 col-md-12 col-xs-12 pull-right">
                                            <div class="comments-add-col-form">
                                                <div class="form-comment">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-ui">
                                                            <form class="px-5">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-row-title mb-2">عنوان نظر شما
                                                                            (اجباری)</div>
                                                                        <div class="form-row">
                                                                            <input class="input-ui pr-2" type="text" name="title" placeholder="عنوان نظر خود را بنویسید">
                                                                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 form-comment-title--positive mt-4">
                                                                        <div class="form-row-title mb-2 pr-3">
                                                                            نقاط قوت
                                                                        </div>
                                                                        <div id="advantages" class="form-row">
                                                                            <div class="ui-input--add-point">
                                                                                <input name="strengthss[]" class="input-ui pr-2 ui-input-field" type="text" id="advantage-input" autocomplete="off" value="">
                                                                                <button class="ui-input-point js-icon-form-add" type="button"></button>
                                                                                <?php $__errorArgs = ['strengthss'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="text-danger"><?php echo e($message); ?></span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                            <div class="form-comment-dynamic-labels js-advantages-list">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 form-comment-title--negative mt-2">
                                                                        <div class="form-row-title mb-2 pr-3">
                                                                            نقاط ضعف
                                                                        </div>
                                                                        <div id="disadvantages" class="form-row">
                                                                            <div class="ui-input--add-point">
                                                                                <input name="weak-points[]" class="input-ui pr-2 ui-input-field" type="text" id="disadvantage-input" autocomplete="off" value="">
                                                                                <button class="ui-input-point js-icon-form-add" type="button"></button>
                                                                                <?php $__errorArgs = ['weak-points'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="text-danger"><?php echo e($message); ?></span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                            <div class="form-comment-dynamic-labels js-disadvantages-list">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mt-3">
                                                                        <div class="form-row-title mb-2">متن نظر شما
                                                                            (اجباری)</div>
                                                                        <div class="form-row">
                                                                            <textarea class="input-ui pr-2 pt-2" name="text" rows="5" placeholder="متن خود را بنویسید" style="height:120px;"></textarea>
                                                                            <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<?php if(Session::get('status_show')): ?>
<script>
    $(function() {
        $('#comment-modal').modal('show');
    });
</script>
<?php endif; ?>
<script>
    function setlable(e) {
        if (e == "cost") {
            var lable = $(".cost").val();
        }
        if (e == "quality") {
            var lable = $(".quality").val();
        }
        if (e == "satisfaction") {
            var lable = $(".satisfaction").val();
        }
        if (lable == 1) {
            lable = "بد";
        }
        if (lable == 2) {
            lable = "متوسط";
        }
        if (lable == 3) {
            lable = "خوب";
        }
        if (lable == 4) {
            lable = "خیلی خوب";
        }
        if (lable == 5) {
            lable = "عالی";
        }
        if (e == "cost") {
            $("#rangeva1").html(lable);
        }
        if (e == "quality") {
            $("#rangeva2").html(lable);
        }
        if (e == "satisfaction") {
            $("#rangeva3").html(lable);
        }
    }
    $(document).ready(function(e) {
        if (typeof $('#var-select').val() === 'undefined' || typeof $('#var-select').val() === null) {
            variation = null;
        } else {
            variation = JSON.parse($('#var-select').val());
        }
        let variationPriceDiv = $('.variation-price');
        variationPriceDiv.empty();
        if (variation == null) {
            let spanPrice = $('<span />', {
                class: 'amount',
                text: 'ناموجود',
            });
            variationPriceDiv.append(spanPrice);
        } else {
            $('.sku').html(variation.sku);
            if (variation.time_guarantee === null) {
                $('.guarantee1').remove();
            } else {
                $('#time_guarantee').html(variation.time_guarantee);
            }
            if (variation.guarantee === null) {
                $('.guarantee2').remove();
            } else {
                $('#guarantee').html(variation.guarantee);
            }
            if (variation.is_sale) {
                let spanSale = $('<div />', {
                    class: 'amount text-danger',
                    text: number_format(variation.sale_price) + ' تومان'
                });
                let spanPrice = $('<del />', {
                    class: 'amount',
                    text: number_format(variation.price) + ' تومان'
                });
                variationPriceDiv.append(spanSale);
                variationPriceDiv.append(spanPrice);
            } else {
                let spanPrice = $('<span />', {
                    class: 'amount',
                    text: number_format(variation.price) + ' تومان'
                });
                variationPriceDiv.append(spanPrice);
            }
            $('.numberstyle').attr('max', variation.quantity);
            $('.numberstyle').val(1);
        }
    });
    $('#var-select').on('change', function() {
        let variation = JSON.parse(this.value);
        let variationPriceDiv = $('.variation-price');
        variationPriceDiv.empty();
        $('.sku').html(variation.sku);
        $('#time_guarantee').html(variation.time_guarantee);
        $('#guarantee').html(variation.guarantee);
        if (variation.is_sale) {
            let spanSale = $('<span />', {
                class: 'amount',
                text: number_format(variation.sale_price) + ' تومان'
            });
            let spanPrice = $('<del />', {
                class: 'amount',
                text: number_format(variation.price) + ' تومان'
            });
            variationPriceDiv.append(spanSale);
            variationPriceDiv.append(spanPrice);
        } else {
            let spanPrice = $('<span />', {
                class: 'amount',
                text: number_format(variation.price) + ' تومان'
            });
            variationPriceDiv.append(spanPrice);
        }
        $('.numberstyle').attr('max', variation.quantity);
        $('.numberstyle').val(1);
    });

    function reply(id) {
        let sid = 'reply-form-' + id;
        console.log(sid);
        $('#' + sid).toggle();
    }
</script>
<script>
    (function($) {
        $.fn.numberstyle = function(options) {
            /*
             * Default settings
             */
            var settings = $.extend({
                value: 0,
                step: undefined,
                min: undefined,
                max: undefined
            }, options);
            /*
             * Init every element
             */
            return this.each(function(i) {
                /*
                 * Base options
                 */
                var input = $(this);
                /*
                 * Add new DOM
                 */
                /*
                 * Attach events
                 */
                // use .off() to prevent triggering twice
                $(document).off('click', '.qty-btn').on('click', '.qty-btn', function(e) {
                    var input = $(this).siblings('input'),
                        sibBtn = $(this).siblings('.qty-btn'),
                        step = (settings.step) ? parseFloat(settings.step) : parseFloat(input.attr(
                            'step')),
                        min = (settings.min) ? settings.min : (input.attr('min')) ? input.attr(
                            'min') : undefined,
                        max = (settings.max) ? settings.max : (input.attr('max')) ? input.attr(
                            'max') : undefined,
                        oldValue = parseFloat(input.val()),
                        newVal; //Add value
                    if ($(this).hasClass('qty-add')) {
                        newVal = (oldValue >= max) ? oldValue : oldValue + step,
                            newVal = (newVal > max) ? max : newVal;
                        if (newVal == max) {
                            $(this).addClass('disabled');
                        }
                        sibBtn.removeClass('disabled'); //Remove value
                    } else {
                        newVal = (oldValue <= min) ? oldValue : oldValue - step,
                            newVal = (newVal < min) ? min : newVal;
                        if (newVal == min) {
                            $(this).addClass('disabled');
                        }
                        sibBtn.removeClass('disabled');
                    } //Update value
                    input.val(newVal).trigger('change');
                });
                input.on('change', function() {
                    const val = parseFloat(input.val()),
                        min = (settings.min) ? settings.min : (input.attr('min')) ? input.attr(
                            'min') : undefined,
                        max = (settings.max) ? settings.max : (input.attr('max')) ? input.attr(
                            'max') : undefined;
                    if (val > max) {
                        input.val(max);
                    }
                    if (val < min) {
                        input.val(min);
                    }
                });
            });
        };
        $('.numberstyle').numberstyle();
    }(jQuery));
</script><?php $__env->stopPush(); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/assets/home/css/number.css')); ?>" />
<style>
    .owl-carousel {
        touch-action: manipulation;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/products/show.blade.php ENDPATH**/ ?>