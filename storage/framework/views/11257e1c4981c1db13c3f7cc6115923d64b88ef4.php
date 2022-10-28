<?php $__env->startSection('title' , 'لیست پرسش و پاسخ'); ?>
<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست پرسش و پاسخ</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item active">لیست پرسش و پاسخ</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Hover Rows -->

            <!-- Hover Rows -->
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.questions.questions-list')->html();
} elseif ($_instance->childHasBeenRendered($questions->id)) {
    $componentId = $_instance->getRenderedChildComponentId($questions->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($questions->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($questions->id);
} else {
    $response = \Livewire\Livewire::mount('admin.questions.questions-list');
    $html = $response->html();
    $_instance->logRenderedChild($questions->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <?php echo e($questions->links('vendor.pagination.bootstrap-4')); ?>

                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/questions/index.blade.php ENDPATH**/ ?>