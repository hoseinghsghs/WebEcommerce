<?php $__env->startSection('title','لیست محصولات'); ?>
<?php $__env->startSection('Content'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>زمان بندی رویداد ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?php echo e(route('admin.home')); ?>><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item active">زمان بندی رویداد ها</li>
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
            <div class="row clearfix">
                <div class="col-sm-12">
                    <ul class="cbp_tmtimeline">
                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if($event->eventable_type == "App\Models\Order"){
                                $icon="zmdi zmdi-case";
                                $bg="bg-green";
                                $url=route('admin.orders.show' , $event->eventable_id );
                            }elseif($event->eventable_type == "App\Models\Comment"){
                                $icon="zmdi zmdi-assignment";
                                $bg="bg-blus";
                                $url=route('admin.comments.edit' , $event->eventable_id );
                            }elseif($event->eventable_type == "App\Models\User"){
                                $icon="zmdi zmdi-account";
                                $bg="";
                                $url=route('admin.users.show' , $event->eventable_id );
                            }
                        ?>
                        <li>
                            <div class="cbp_tmicon <?php echo e($bg); ?>"><i class="<?php echo e($icon); ?>"></i></div>
                            <div class="cbp_tmlabel empty">
                                <h5><a href="<?php echo e($url); ?>"><?php echo e($event->title); ?></a></h5>
                                <div>
                                    <?php echo e($event->body); ?>

                                </div>
                                <?php
                                $v2 = Hekmatinasser\Verta\Verta::instance($event->created_at);
                                $v3=$v2->diffMinutes();
                                $v4=$v3." " ."دقیقه";
                                if($v3 <= 0){ $v4=" لحظاتی پیش " ; } if($v3>60){
                                    $v3=$v2->diffHours();
                                    $v4=$v3." " ."ساعت";
                                    if($v3>60){
                                    $v3=$v2->diffDays();
                                    $v4=$v3." " ."روز";
                                    }
                                    }

                                    ?>

                                    <p class="mt-2"><i class="zmdi zmdi-time"></i><span> <?php echo e($v4); ?> پیش
                                        </span></p>

                                    <form style="float: left;" action="<?php echo e(route('admin.timeline.destroy', $event->id)); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-raised btn-danger waves-effect"
                                            type="submit">حذف</button>
                                    </form>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <?php echo e($events->links('vendor.pagination.bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.MasterAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/admin/page/timeline/index.blade.php ENDPATH**/ ?>