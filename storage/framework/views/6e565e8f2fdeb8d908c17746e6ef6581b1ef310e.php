<?php $__env->startSection('title','لیست دسته بندی ها'); ?>
<?php $__env->startPush('styles'); ?>
<style>
    .ui-sortable-handle {
        background-color: #f0f0f0;
        padding: 0.5rem;
        cursor: move;
        border-radius: 10px;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست دسته بندی ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">دسته بندی</a></li>
                        <li class="breadcrumb-item active">لیست دسته بندی ها</li>
                    </ul>
                    </br>
                    <a onclick="loadbtn(event)" href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-raised btn-info waves-effect">
                        افزودن<i class="zmdi zmdi-plus mr-1 align-middle"></i></a>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <?php if(count($categories)===0): ?>
                            <p>هیچ رکوردی وجود ندارد</p>
                            <?php else: ?>
                            <ol class="sortable col-md-8 mx-auto">
                                <?php $__currentLoopData = $categories->where('parent_id',0)->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="my-2" id="list_<?php echo e($category->id); ?>">
                                    <div><i class="zmdi zmdi-hc-fw"></i> <strong><?php echo e($category->name); ?></strong> <?php if($category->is_active): ?>
                                        <span class="badge badge-success">فعال</span>
                                        <?php else: ?>
                                        <span class="badge badge-warning">غیرفعال</span>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('admin.categories.edit',$category->id)); ?>" class="btn btn-raised btn-info waves-effect m-0 btn-sm float-left" onclick="loadbtn(event)">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                    </div>
                                    <?php if($categories->where('parent_id',$category->id)): ?>
                                    <ol>
                                        <?php $__currentLoopData = $categories->where('parent_id',$category->id)->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="my-2" id="list_<?php echo e($category->id); ?>">
                                            <div><i class="zmdi zmdi-hc-fw"></i> <strong><?php echo e($category->name); ?></strong> <?php if($category->is_active): ?>
                                                <span class="badge badge-success">فعال</span>
                                                <?php else: ?>
                                                <span class="badge badge-warning">غیرفعال</span>
                                                <?php endif; ?>
                                                <a href="<?php echo e(route('admin.categories.edit',$category->id)); ?>" class="btn btn-raised btn-info waves-effect m-0 btn-sm float-left" onclick="loadbtn(event)">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ol>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
            toleranceElement: '> div',
            disableParentChange: true,
            rtl: true,
            relocate: function() {
                var serializedData = window.JSON.stringify(
                    $('.sortable').nestedSortable('toArray', {
                        startDepthCount: 0
                    })
                );
                $(this).parents("div.body").append(`<div class="mb-3 text-center" id="order-loading"><div class="spinner-border text-info" role="status">
                                                   <span class="sr-only">Loading...</span>
                                                   </div><span class="text-muted"> درحال بارگذاری...</span></div>`);
                $.post(
                        "<?php echo e(route('admin.category.order')); ?>", {
                            _token: "<?php echo e(csrf_token()); ?>",
                            data: serializedData,
                        },
                        function(response, status) {},
                        "json"
                    )
                    .fail(function() {
                        swal({
                            title: 'خطا',
                            text: "خطا در برقراری ارتباط!",
                            icon: "warning",
                            confirmButtonText: "تایید",
                        })
                    })
                    .always(function() {
                        $('#order-loading').remove();
                    });
            }
        });
    });
   </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/categories/index.blade.php ENDPATH**/ ?>