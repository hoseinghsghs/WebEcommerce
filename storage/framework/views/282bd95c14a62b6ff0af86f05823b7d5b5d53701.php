<?php $__env->startSection('title','لیست بنر ها'); ?>

<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست بنر ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item active">لیست بنر ها</li>
                    </ul>
                    </br>
                    <a onclick="loadbtn(event)" href="<?php echo e(route('admin.banners.create')); ?>"
                        class="btn btn-raised btn-info waves-effect">
                        افزودن<i class="zmdi zmdi-plus mr-1 align-middle"></i></a>
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
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.banners.banner-list')->html();
} elseif ($_instance->childHasBeenRendered('F1bREaR')) {
    $componentId = $_instance->getRenderedChildComponentId('F1bREaR');
    $componentTag = $_instance->getRenderedChildComponentTagName('F1bREaR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('F1bREaR');
} else {
    $response = \Livewire\Livewire::mount('admin.banners.banner-list');
    $html = $response->html();
    $_instance->logRenderedChild('F1bREaR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/banners/index.blade.php ENDPATH**/ ?>