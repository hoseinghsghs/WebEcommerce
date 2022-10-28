<div class="navbar-right">
    <ul class="navbar-nav">

        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown"
                role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">اطلاعیه ها</li>

                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.events.event-list')->html();
} elseif ($_instance->childHasBeenRendered('ca6hozn')) {
    $componentId = $_instance->getRenderedChildComponentId('ca6hozn');
    $componentTag = $_instance->getRenderedChildComponentTagName('ca6hozn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ca6hozn');
} else {
    $response = \Livewire\Livewire::mount('admin.events.event-list');
    $html = $response->html();
    $_instance->logRenderedChild('ca6hozn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <li class="footer"> <a href=<?php echo e(route('admin.timeline')); ?>>مشاهده تمام اعلان ها</a> </li>
            </ul>
        </li>
        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i
                    class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li><a aria-disabled="true" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a>
            <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
        </li>
    </ul>
</div><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/partial/RightIconSidebar.blade.php ENDPATH**/ ?>