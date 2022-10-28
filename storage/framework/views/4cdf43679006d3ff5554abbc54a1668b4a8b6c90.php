<?php $__env->startSection('title','لیست برندها'); ?>
<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست برندها</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item active">لیست برندها</li>
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
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.brands.brand-controll')->html();
} elseif ($_instance->childHasBeenRendered('BK2FQTf')) {
    $componentId = $_instance->getRenderedChildComponentId('BK2FQTf');
    $componentTag = $_instance->getRenderedChildComponentTagName('BK2FQTf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('BK2FQTf');
} else {
    $response = \Livewire\Livewire::mount('admin.brands.brand-controll');
    $html = $response->html();
    $_instance->logRenderedChild('BK2FQTf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/brands/index.blade.php ENDPATH**/ ?>