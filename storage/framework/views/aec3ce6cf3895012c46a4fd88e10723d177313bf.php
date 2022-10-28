<div class="col-lg-3 col-md-4 col-sm-6 col-6 p-1 order-1 d-block mb-3">
    <section class="product-box product product-type-simple h-100 ">
        <div class="thumb">
            <a href="<?php echo e(route('home.products.show' , ['product' => $product->slug])); ?>" class="d-block">
                <?php if($product->quantity_check && $product->sale_check): ?>
                <div class="promotion-badge">فروش ویژه</div>
                <?php endif; ?>
                <span><span data-rating-stars="5" data-rating-readonly="true"
                        data-rating-value="<?php echo e(ceil($product->rates->avg('satisfaction'))); ?>">
                    </span></span>

                <div class="position-relative d-inline-block">
                    <div style="position: absolute;left:0;top:1rem">
                        <ul>
                            <!-- علاقه مندی -->
                            <?php if(Auth::check()): ?>
                            <?php if($product->checkUserWishlist(1)): ?>
                            <li class="action-item like">
                                <button data-product="<?php echo e($product->id); ?>" class="btn btn-link add-product-wishes active"
                                    type="submit">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </li>

                            <?php else: ?>
                            <li class="action-item like">
                                <button data-product="<?php echo e($product->id); ?>" class="btn btn-link add-product-wishes"
                                    type="submit">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </li>
                            <?php endif; ?>
                            <?php else: ?>
                            <li class="action-item like">
                                <button data-product="<?php echo e($product->id); ?>" class="btn btn-link add-product-wishes"
                                    type="submit">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </li>
                            <?php endif; ?>
                            <!-- پایان علاقه مندی -->
                            <!-- مقایسه -->
                            <?php if(session()->has('compareProducts')): ?>
                            <?php if(in_array($product->id, session()->get('compareProducts')) ): ?>
                            <li class="action-item compare">
                                <button data-product="<?php echo e($product->id); ?>" id="compare" class="btn btn-link btn-compare"
                                    style="color: #651fff;" type="submit">
                                    <i class="fa fa-random"></i>
                                </button>
                            </li>
                            <?php else: ?>
                            <li class="action-item compare">
                                <button data-product="<?php echo e($product->id); ?>" id="compare" class="btn btn-link btn-compare"
                                    type="submit">
                                    <i class="fa fa-random"></i>
                                </button>
                            </li>
                            <?php endif; ?>

                            <?php else: ?>
                            <li class="action-item compare">
                                <button data-product="<?php echo e($product->id); ?>" class="btn btn-link btn-compare" type="submit">
                                    <i class="fa fa-random"></i>
                                </button>
                            </li>
                            <?php endif; ?>
                            <!-- پایان علاقه مندی ها -->
                            <?php if($product->variations()->where('quantity', '>' , 0)->get()->count() == 1): ?>
                            <?php
                            $variation=$product->variations()->where('quantity', '>' , 0)->first();
                            $rowId = $product->id . '-' . $variation->id;
                            ?>

                            <form class="cart-form" style="display:inline">
                                <input type="hidden" id="product_id" name="productid">
                                <input type="hidden" id="variation_value" name="productvar">
                                <input type="hidden" value="1" id="qtybutton">

                                <li class="action-item add-to-cart">
                                    <button class="btn btn-link btn-add-to-cart" data-ishome="1"
                                        data-product="<?php echo e($product->id); ?>"
                                        data-varition="<?php echo e(json_encode($variation->only(['id' , 'sku' , 'quantity','is_sale' , 'sale_price' , 'price']))); ?>"
                                        type="submit">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>

                                </li>
                            </form>

                            <?php endif; ?>
                        </ul>
                    </div>
                    <img src="<?php echo e(url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$product->primary_image)); ?>"
                        alt="<?php echo e($product->slug); ?>" height="77%" width="77%" class="pr-2">
                </div>
            </a>
        </div>
        <div class="title">
            <a href="<?php echo e(route('home.products.show' , ['product' => $product->slug])); ?>"><?php echo e($product->name); ?></a>
        </div>
        <div class="price">
            <?php if($product->quantity_check): ?>
            <?php if($product->sale_check): ?>
            <del><span><?php echo e(number_format($product->sale_check->price)); ?><span>تومان</span></span></del>
            <ins><span class="amount"><?php echo e(number_format($product->sale_check->sale_price)); ?><span>تومان</span></span>
                <?php
                $percents=$product->discountPercent();
                ?>
                <?php if($product->quantity_check && $product->sale_check && $percents): ?>
                <div class="discount-d">
                    <?php if(count($percents)==1): ?>
                    <span><?php echo e($percents[0]); ?>٪</span>
                    <?php else: ?>
                    <span><?php echo e(end($percents)); ?>٪ - <?php echo e($percents[0]); ?>٪</span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </ins>
            <?php else: ?>
            <ins><span class="amount"><?php echo e(number_format($product->price_check->price)); ?><span>تومان</span></span></ins>
            <?php endif; ?>
            <?php else: ?>
            <ins><span>ناموجود</span></ins>
            <?php endif; ?>
        </div>
    </section>
</div><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/components/ProductCart3.blade.php ENDPATH**/ ?>