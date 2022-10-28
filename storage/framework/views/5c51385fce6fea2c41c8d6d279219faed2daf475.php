<?php $__env->startSection('title', "خانه - پست ها"); ?>
<?php $__env->startSection('content'); ?>
<!-- Start of Main -->
<main class="main-row p-0">
    <div id="breadcrumb">
        <i class="mdi mdi-home"></i>
        <nav aria-label="breadcrumb" class="p-1">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">خانه</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('home.posts.index')); ?>">بلاگ</a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="container-main">
        <div class="d-block">
            <section class="content-widget">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-4 col-lg-4 col-xl-4 items-2 pr">
                    <article class="blog-item">
                        <figure class="figure">
                            <div class="post-thumbnail"> <img src="<?php echo e(url('storage/'.$post->image->url)); ?>"
                                    alt="<?php echo e($post->title); ?>">
                            </div>
                            <div class="post-title">
                                <a href="<?php echo e(route('home.posts.show' , ['post' => $post->slug] )); ?>" class="d-block">
                                    <h4><?php echo e($post->title); ?></h4>
                                </a>
                                <span class="post-date">
                                    <i class="fa fa-calendar"></i>
                                    <?php echo e(Hekmatinasser\Verta\Verta::instance($post->created_at)->format('Y/n/j')); ?>

                                </span>
                            </div>
                        </figure>
                    </article>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>
            <div class="pagination-product pr-3 pl-3 pr">
                <nav aria-label="Page navigation example">
                    <?php echo e($posts->links()); ?> </nav>
            </div>
        </div>
    </div>
</main>
<!-- End of Main --><?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.MasterHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/home/page/posts/index.blade.php ENDPATH**/ ?>