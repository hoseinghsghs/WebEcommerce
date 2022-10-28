  <!-- slider-main--------------------------->
  <div class="container-main">
      <div class="d-block">
          <div class="col-lg-12 col-xs-12 pr  p-0">
              <div class="slider-main-container d-block">
                  <div id="carouselExampleIndicators" class="carousel slide" data-interval="5000" data-touch="true"
                      data-ride="carousel">
                      <ol class="carousel-indicators">
                          <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($loop->first): ?>
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <?php else: ?>
                          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($key); ?>"></li>
                          <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ol>
                      <div class="carousel-inner">
                          <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($loop->first): ?>
                          <a href="<?php echo e($slider->link); ?>">
                              <div class="carousel-item carousel-item-h4 active">
                                  <?php else: ?>
                                  <a href="<?php echo e($slider->link); ?>">
                                      <div class="carousel-item carousel-item-h4">
                                          <?php endif; ?>
                                          <img src="<?php echo e(url(env('BANNER_IMAGES_PATCH').$slider->image)); ?>"
                                              class="d-block w-100 h-four-img" alt="<?php echo e($slider->title); ?>">

                                          <div class="carousel-caption d-none d-md-block">
                                              <a href="<?php echo e($slider->link); ?>" type="submit"
                                                  class="btn btn-warning btn-buy mt-4"><?php echo e($slider->button_text); ?></a>
                                          </div>
                                      </div>
                                  </a>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                  data-slide="prev">
                                  <span class="fa fa-angle-left" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                  data-slide="next">
                                  <span class="fa fa-angle-right" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                              </a>
                      </div>
                  </div>
              </div>
          </div>
      </div><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/partial/SliderMain.blade.php ENDPATH**/ ?>