<?php $__env->startSection('title','ویژگی ها'); ?>
<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویژگی‌ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">ویژگی</a></li>
                        <li class="breadcrumb-item active">لیست ویژگی‌ها</li>
                    </ul>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.attributes.attribute-list')->html();
} elseif ($_instance->childHasBeenRendered('XSrn65x')) {
    $componentId = $_instance->getRenderedChildComponentId('XSrn65x');
    $componentTag = $_instance->getRenderedChildComponentTagName('XSrn65x');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XSrn65x');
} else {
    $response = \Livewire\Livewire::mount('admin.attributes.attribute-list');
    $html = $response->html();
    $_instance->logRenderedChild('XSrn65x', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/attributes/index.blade.php ENDPATH**/ ?>