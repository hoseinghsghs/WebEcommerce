 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog mt-5" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">جستجو</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="header-search text-right">
                     <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.sections.search-box')->html();
} elseif ($_instance->childHasBeenRendered('DWKQOH6')) {
    $componentId = $_instance->getRenderedChildComponentId('DWKQOH6');
    $componentTag = $_instance->getRenderedChildComponentTagName('DWKQOH6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('DWKQOH6');
} else {
    $response = \Livewire\Livewire::mount('home.sections.search-box');
    $html = $response->html();
    $_instance->logRenderedChild('DWKQOH6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="nav-categories-overlay"></div>
 <div class="overlay-search-box"></div>
 <!-- header-------------------------------->
<?php /**PATH /home/public_html/WebEcommerce/resources/views/home/partial/Modal.blade.php ENDPATH**/ ?>