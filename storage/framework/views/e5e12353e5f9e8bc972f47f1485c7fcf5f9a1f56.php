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

                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" wire:model="code"
                                            placeholder="کد سفارش">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" wire:model="name"
                                            placeholder="نام و نام خانوادگی">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" wire:model="paying_amount"
                                            placeholder="مبلغ پرداختی">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select data-placeholder="وضعیت" class="form-control ms"
                                            wire:model.deferred="payment_status" class="form-control ms select2">
                                            <option value="">وضعیت سفارش</option>
                                            <option value="0">در
                                                انتظار پرداخت
                                            </option>
                                            <option value="1">آماده برای ارسال</option>
                                            <option value="2">محصول ارسال شد</option>
                                            <option value="3">مرجوعی</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select data-placeholder="وضعیت" class="form-control ms"
                                            wire:model.deferred="status" class="form-control ms select2">
                                            <option value="">وضعیت پرداخت</option>
                                            <option value="0">پرداخت ناموفق</option>
                                            <option value="1">پرداخت موفق</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header">
                        <h2>
                            جست و جو بر اساس تاریخ
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>تاریخ شروع
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="startDate"
                                                wire:model="startDate" name="startDate" readonly="readonly">
                                            <input type="hidden" id="startDate-alt" name="expired_at">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label> تاریخ پایان </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="endDate" wire:model="endDate"
                                                name="endDate" readonly="readonly">
                                            <input type="hidden" id="endDate-alt" name="expired_at">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="header">
                    <h2><strong>کل سفارشات </strong>( <?php echo e($orders->total()); ?> )</h2>
                </div>

                <div class="body">
                    <div class="loader" wire:loading.flex>
                        درحال بارگذاری ...
                    </div>

                    <?php if(count($orders)===0): ?>
                    <p>هیچ رکوردی وجود ندارد</p>
                    <?php else: ?>
                    <div wire:loading.remove class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کد سفارش</th>
                                    <th>کاربر</th>
                                    <th>مبلغ پرداختی</th>
                                    <th>وضعیت پرداهت</th>
                                    <th>وضعیت سفارش</th>
                                    <th>تاریخ</th>
                                    <th class="text-center">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td scope="row"><?php echo e($key+1); ?></td>
                                    <td scope="row"><?php echo e($order->id); ?></td>
                                    <td><?php echo e($order->user->name == null ? $order->user->cellphone : $order->user->name); ?>

                                    </td>
                                    <td><?php echo e(number_format($order->paying_amount)); ?> تومان</td>
                                    <td>
                                        <?php if($order->payment_status =="ناموفق"): ?>
                                        <span class="badge badge-danger p-2">پرداخت
                                            <?php echo e($order->payment_status); ?></span>
                                        <?php elseif($order->payment_status =="موفق"): ?>
                                        <span class="badge badge-success p-2">پرداخت
                                            <?php echo e($order->payment_status); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($order->status =="در انتظار پرداخت"): ?>
                                        <span class="badge badge-warning p-2">
                                            <?php echo e($order->status); ?></span>
                                        <?php elseif($order->status =="آماده برای ارسال"): ?>
                                        <span class="badge badge-info p-2">
                                            <?php echo e($order->status); ?></span>
                                        <?php elseif($order->status =="محصول ارسال شد"): ?>
                                        <span class="badge badge-success p-2">
                                            <?php echo e($order->status); ?></span>
                                        <?php elseif($order->status =="مرجوعی"): ?>
                                        <span class="badge badge-danger p-2">
                                            <?php echo e($order->status); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(Hekmatinasser\Verta\Verta::instance($order->created_at)->format('Y/n/j')); ?>

                                    </td>


                                    <td class="text-center js-sweetalert">
                                        <a onclick="loadbtn(event)" href="<?php echo e(route('admin.orders.edit',$order->id)); ?>"
                                            class="btn btn-raised btn-warning waves-effect">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a onclick="loadbtn(event)" href="<?php echo e(route('admin.orders.show',$order->id)); ?>"
                                            class="btn btn-raised btn-info waves-effect">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>

                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <?php echo e($orders->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('styles'); ?>
<!-- تاریخ -->
<link rel="stylesheet" type="text/css"
    href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css" />
<!-- تاریخ پایان-->
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
<script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
<script>
$("#startDate").pDatepicker({
    format: "YYYY-MM-DD",

    onSelect: function(startDate) {
        console.log(startDate);
        var startdate = $("#startDate").val();
        window.livewire.find('<?php echo e($_instance->id); ?>').set('startDate', startdate);
    }
});

$("#endDate").pDatepicker({
    format: "YYYY-MM-DD",

    onSelect: function(endDate) {
        var enddate = $("#endDate").val();
        window.livewire.find('<?php echo e($_instance->id); ?>').set('endDate', enddate);
    }
});
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/admin/orders/order-list.blade.php ENDPATH**/ ?>