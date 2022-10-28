 <!-- footer------------------------------------------->
 <footer class="footer-main-site">
     <section class="d-block d-xl-block d-lg-block d-md-block d-sm-block order-1">
         <div class="footer-shopping-features">
             <div class="container-fluid">
                 <div class="col-12">
                     <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="item">
                         <span class="icon-shopping">
                             <i class="<?php echo e($service->icon); ?>"></i>
                         </span>
                         <span class="title-shopping"><?php echo e($service->title); ?></span>
                         <span class="desc-shopping"><?php echo e($service->description); ?></span>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </div>
             </div>
         </div>
     </section>
     <section class="d-block d-xl-block d-lg-block d-md-block d-sm-block order-1">
         <div class="container-fluid">
             <div class="col-12">
                 <div class="footer-middlebar">
                     <?php if(!empty(json_decode($setting->links,true))): ?>
                     <div class="col-lg-8 d-block pr">
                         <div class="footer-links">
                             <?php $__currentLoopData = json_decode($setting->links,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <div class="col-lg-3 col-md-3 col-xs-12 pr">
                                 <div class="row">
                                     <section class="footer-links-col">
                                         <div class="headline-links">
                                             <a href="#">
                                                 <?php echo e($pLink['name']); ?>

                                             </a>
                                         </div>
                                         <?php if(isset($pLink['children'])): ?>
                                         <ul class="footer-menu-ul">
                                             <?php $__currentLoopData = $pLink['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <li class="menu-item-type-custom">
                                                 <a href="<?php echo e($link['url']); ?>">
                                                     <?php echo e($link['title']); ?>

                                                 </a>
                                             </li>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </ul>
                                         <?php endif; ?>
                                     </section>
                                 </div>
                             </div>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </div>
                     </div>
                     <?php endif; ?>
                     <?php if($setting->instagram || $setting->whatsapp || $setting->telegram): ?>
                     <div class="col-lg-4 d-block pl">
                         <div class="shortcode-widget-area">
                             <form action="#" class="form-newsletter">
                                 <fieldset>
                                     <span class="form-newsletter-title"> با عضویت در کانال‌های ما، از آخرین اخبار و
                                         محصولات سایت مطلع شوید...</span>
                                     <div class="social-container">
                                         <ul class="social-icons">
                                             <?php if(isset($setting->instagram)): ?>
                                             <li><a href="<?php echo e($setting->instagram); ?>"><i class="fa fa-instagram"></i></a>
                                             </li>
                                             <?php endif; ?>
                                             <?php if(isset($setting->whatsapp)): ?>
                                             <li><a href="<?php echo e($setting->whatsapp); ?>"><i class="fa fa-whatsapp"></i></a>
                                             </li>
                                             <?php endif; ?>
                                             <?php if(isset($setting->telegram)): ?>
                                             <li><a href="<?php echo e($setting->telegram); ?>"><i class="fa fa-telegram"></i></a>
                                             </li>
                                             <?php endif; ?>
                                         </ul>
                                 </fieldset>
                             </form>
                         </div>
                     </div>
                     <?php endif; ?>
                     <div class="footer-more-info">
                         <?php if($setting->site_name || $setting->description): ?>
                         <div class="col-lg-10 pr">
                             <div class="footer-content d-block">
                                 <div class="text pr-1">
                                     <?php if(isset($setting->site_name)): ?>
                                     <h2 class="title">فروشگاه اینترنتی <?php echo e($setting->site_name); ?></h2>
                                     <?php endif; ?>
                                     <?php if(isset($setting->description)): ?>
                                     <p class="desc"><?php echo e($setting->description); ?></p>
                                     <?php endif; ?>
                                 </div>
                             </div>
                         </div>
                         <?php endif; ?>
                         <div class="col-lg-2 pl">
                             <div class="footer-safety-partner">
                                 <div class="widget widget-product card mb-0">
                                     <div
                                         class="product-carousel-symbol owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                         <div class="owl-stage-outer">
                                             <div class="owl-stage"
                                                 style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                                 <div class="owl-item active"
                                                     style="width: 300.75px; margin-left: 10px;">
                                                     <div class="item">
                                                         <a href="#" class="d-block hover-img-link">
                                                             <img src="/assets/home/images/footer/license/L-1.png"
                                                                 class="img-fluid img-brand" alt="">
                                                         </a>
                                                     </div>
                                                 </div>
                                                 <div class="owl-item active"
                                                     style="width: 300.75px; margin-left: 10px;">
                                                     <div class="item">
                                                         <a href="#" class="d-block hover-img-link mt-0">
                                                             <img src="/assets/home/images/footer/license/L-2.png"
                                                                 class="img-fluid img-brand" alt="">
                                                         </a>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="footer-copyright">
                             <div class="footer-copyright-text">
                                 <p>تمامی حقوق متعلق به سایت فروشگاهی <?php echo e($setting->site_name); ?> می باشد.</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </footer>
 <!-- footer---------------------------------->
<?php /**PATH /home/public_html/WebEcommerce/resources/views/home/partial/Footer.blade.php ENDPATH**/ ?>