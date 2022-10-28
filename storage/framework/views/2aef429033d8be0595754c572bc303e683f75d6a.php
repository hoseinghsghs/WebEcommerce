<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <form wire:submit.prevent="$refresh">
                    <div class="header">
                        <h2>
                            جست و جو
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" wire:model="name"
                                            placeholder="نام کاربر">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" wire:model="product_name"
                                            placeholder="نام محصول">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="body">
                    <div class="loader" wire:loading.flex>
                        درحال بارگذاری ...
                    </div>
                    <?php if(count($questions)===0): ?>
                    <p>هیچ رکوردی وجود ندارد</p>
                    <?php else: ?>
                    <p>برای تایید نظر روی وضعیت آن کلیک کنید</p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نوشته توسط</th>
                                    <th>تاریخ</th>
                                    <th>نام محصول</th>
                                    <th>تعداد پاسخ ها</th>
                                    <th>وضعیت</th>
                                    <th>
                                        <center>
                                            عملیات
                                        </center>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <tr wire:key="name_<?php echo e($question->id); ?>">
                                    <td scope=" row"><?php echo e($question->id); ?></td>
                                    <td><?php echo e($question->user->name == null ? "بدون نام" : $question->user->cellphone); ?>

                                    </td>
                                    <td><?php echo e(Hekmatinasser\Verta\Verta::instance($question->created_at)->format('Y/n/j')); ?>

                                    </td>
                                    <td>
                                        <a
                                            href="<?php echo e(route('admin.products.show',['product' => $question->product->id])); ?>">
                                            <?php echo e($question->product->name); ?>

                                        </a>

                                    </td>
                                    <td>
                                        <span class="badge badge-success p-2"><?php echo e($question->appro(1)->count()); ?></span>
                                        <?php if($question->appro(0)->count() > 0): ?>
                                        <span class="badge badge-danger p-2"><?php echo e($question->appro(0)->count()); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($question->approved==0): ?>
                                        <?php
                                        $color="danger";
                                        $title="عدم انتشار";
                                        ?>
                                        <?php else: ?>
                                        <?php
                                        $color="success";
                                        $title="انتشار";
                                        ?>
                                        <?php endif; ?>
                                        <div class="row clearfix">
                                            <div class="col-12">
                                                <a wire:click="ChengeActive_question(<?php echo e($question->id); ?>)"
                                                    wire:loading.attr="disabled"
                                                    class="btn btn-raised btn-<?php echo e($color); ?> waves-effect"><span
                                                        style="color:white;"><?php echo e($title); ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center js-sweetalert">
                                        <center>
                                            <a href="<?php echo e(route('admin.questions.edit',$question->id)); ?>"
                                                wire:loading.attr="disabled"
                                                class="btn btn-raised btn-info waves-effect">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>

                                            <button class="btn btn-raised btn-danger waves-effect"
                                                wire:loading.attr="disabled"
                                                wire:click="delquestion(<?php echo e($question->id); ?>)">
                                                <i class="zmdi zmdi-delete"></i>
                                                <span class="spinner-border spinner-border-sm text-light" wire:loading
                                                    wire:target="delquestion(<?php echo e($question->id); ?>)"></span>
                                            </button>
                                        </center>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($questions->links()); ?>

                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/admin/questions/questions-list.blade.php ENDPATH**/ ?>