<div class="header-search-box">
    <form autocomplete="off" wire:submit.prevent="search" class="form-search">
        <div class="form1">
            <i class="fa fa-search" wire:click="search" wire:loading.remove></i>
            <i class="mdi mdi-loading mdi-spin" wire:loading></i>
            <input type="text" class="form-control form-input" value="<?php echo e(session('search')??''); ?>"
                wire:model.debounce.500ms="search" placeholder="محصول خود را جستجو کنید...">
            <span class="left-pan1">
                <select class="custom-select border-0" id="search-input" wire:model="categoryId">
                    <option value="">همه دسته ها</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </span>
        </div>
    </form>
    <?php if($sProducts && !$errors->has('search')): ?>
    <div class="search-result">
        <ul class="search-result-list mb-0">
            <?php $__empty_1 = true; $__currentLoopData = $sProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li>
                <a class="d-flex align-items-center border-bottom border-light"
                    href="<?php echo e(route('home.products.show',$product->slug)); ?>"><i class="mdi mdi-clock-outline"></i>
                    <img src="<?php echo e(asset('storage/primary_image/'.$product->primary_image)); ?>" alt="image" width="60"
                        height="60" class="suggestion-image border rounded">
                    <span class="mr-2"><?php echo e($product->name); ?></span>
                    <span class="mr-auto ml-1"><?php echo e($product->category->parent->name); ?> /
                        <?php echo e($product->category->name); ?></span>
                    <button class="btn btn-light btn-continue-search" type="submit">
                        <i class="fa fa-angle-left"></i>
                    </button>
                </a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li class="mx-auto mt-3 mb-3">
                <p class="text-muted text-center">موردی یافت نشد!</p>
            </li>
            <?php endif; ?>
        </ul>
        <div class="localSearchSimple"></div>
    </div>
    <?php endif; ?>
</div><?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/home/sections/search-box.blade.php ENDPATH**/ ?>