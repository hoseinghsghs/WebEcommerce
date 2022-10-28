<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <form wire:submit.prevent="$refresh">
                    <div class="header">
                        <h2>
                            جست و جو
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" wire:model="name" placeholder="نام محصول">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select data-placeholder="دسته بندی" class="form-control ms" wire:model.deferred="category" class="form-control ms select2">
                                            <option value="">دسته بندی</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>">
                                                <?php echo e($category->name); ?>

                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select data-placeholder="وضعیت" class="form-control ms" wire:model.deferred="status" class="form-control ms select2">
                                            <option value="">وضعیت</option>
                                            <option value="1">انتشار</option>
                                            <option value="0">عدم انتشار</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="header d-flex align-items-center">
                    <h2><strong>لیست محصولات </strong> ( <?php echo e($products->total()); ?> )</h2>
                    <a onclick="loadbtn(event)" href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-raised btn-info waves-effect mr-auto">
                        افزودن<i class="zmdi zmdi-plus mr-1"></i></a>
                </div>
                <div class="body">
                    <div class="loader" wire:loading.flex>
                        درحال بارگذاری ...
                    </div>
                    <?php if(count($products)===0): ?>
                    <p>هیچ رکوردی وجود ندارد</p>
                    <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عکس</th>
                                    <th>نام</th>
                                    <th>دسته بندی</th>
                                    <th> تاریخ و زمان ثبت </th>
                                    <th>وضعیت</th>

                                    <th>بایگانی</th>
                                    <th class="text-center">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr wire:key="name_<?php echo e($product->id); ?>">
                                    <td scope="row"><?php echo e($key+1); ?></td>
                                    <td>
                                        <a data-lightbox="brand-<?php echo e($loop->index); ?>" data-title="<?php echo e($product->name); ?>" href="<?php echo e(asset('storage/primary_image/'.$product->primary_image)); ?>">
                                            <img src="<?php echo e(asset('storage/primary_image/'.$product->primary_image)); ?>" alt="<?php echo e($product->name); ?>" width="48" class="img-fluid rounded" style="min-height: 3rem;">
                                        </a>
                                    </td>
                                    <td><a href="<?php echo e(route('admin.products.show',['product' => $product->id ])); ?>"><?php echo e($product->name); ?></a>
                                    </td>
                                    <td><a href="<?php echo e(route('admin.categories.edit',['category' => $product->category->id ])); ?>"><?php echo e($product->category->name); ?></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.products.show',['product' => $product->id ])); ?>">
                                            <?php echo e(verta($product->created_at)->format('H:i Y/n/j')); ?>

                                        </a>
                                    </td>
                                    <?php if($product->is_active==0): ?>
                                    <?php
                                    $color="danger";
                                    $title="عدم انتشار";
                                    ?>
                                    <?php else: ?>
                                    <?php
                                    $color="success";
                                    $title="انتشار";
                                    ?>
                                    <?php endif; ?>
                                    <td>
                                        <div class="row clearfix">
                                            <div class="col-6">
                                                <a wire:click="ChengeActive_product(<?php echo e($product->id); ?>)" wire:loading.attr="disabled" class="btn btn-raised btn-<?php echo e($color); ?> waves-effect"><span style="color:white;"><?php echo e($title); ?></span>
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                    <?php if($product->is_archive==0): ?>
                                    <?php
                                    $color="danger";
                                    $title="بایگانی کردن";
                                    ?>
                                    <?php else: ?>
                                    <?php
                                    $color="success";
                                    $title="خروج از بایگانی";
                                    ?>
                                    <?php endif; ?>
                                    <td>
                                        <div class="row clearfix">
                                            <div class="col-6">
                                                <a wire:click="ChengeArchive_product(<?php echo e($product->id); ?>)" wire:loading.attr="disabled" class="btn btn-raised btn-<?php echo e($color); ?> waves-effect"><span style="color:white;"><?php echo e($title); ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-md btn-warning btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <a href="<?php echo e(route('admin.products.edit', ['product' => $product->id])); ?>" class="dropdown-item text-right"> ویرایش محصول </a>

                                                <a href="<?php echo e(route('admin.products.images.edit', ['product' => $product->id])); ?>" class="dropdown-item text-right"> ویرایش تصاویر </a>

                                                <a href="<?php echo e(route('admin.products.category.edit', ['product' => $product->id])); ?>" class="dropdown-item text-right"> ویرایش دسته بندی و ویژگی </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php echo e($products->onEachSide(1)->links()); ?>

        </div>
    </div>
</div>
<?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/admin/products/product-component.blade.php ENDPATH**/ ?>