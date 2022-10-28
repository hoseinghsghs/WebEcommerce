<?php $__env->startSection('title','لیست کاربران'); ?>

<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست کاربران</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">کاربران</a></li>
                        <li class="breadcrumb-item active">لیست کاربران</li>
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
    $html = \Livewire\Livewire::mount('admin.users.users-list')->html();
} elseif ($_instance->childHasBeenRendered('mONkJyG')) {
    $componentId = $_instance->getRenderedChildComponentId('mONkJyG');
    $componentTag = $_instance->getRenderedChildComponentTagName('mONkJyG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('mONkJyG');
} else {
    $response = \Livewire\Livewire::mount('admin.users.users-list');
    $html = $response->html();
    $_instance->logRenderedChild('mONkJyG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/users/index.blade.php ENDPATH**/ ?>