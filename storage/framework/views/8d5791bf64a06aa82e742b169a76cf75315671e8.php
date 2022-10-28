<?php $__env->startSection('title','تنظیمات سایت'); ?>
<?php $__env->startPush('styles'); ?>
<style>
    .custom-file-label::after {
        left: 0;
        right: auto;
        border-left-width: 0;
        border-right: inherit;
    }
    .preview-img{
        max-height: 18em;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>تنظیمات</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i> خانه</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">تنظیمات</a></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.settings.setting')->html();
} elseif ($_instance->childHasBeenRendered('ogd8bNG')) {
    $componentId = $_instance->getRenderedChildComponentId('ogd8bNG');
    $componentTag = $_instance->getRenderedChildComponentTagName('ogd8bNG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ogd8bNG');
} else {
    $response = \Livewire\Livewire::mount('admin.settings.setting');
    $html = $response->html();
    $_instance->logRenderedChild('ogd8bNG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/settings/setting.blade.php ENDPATH**/ ?>