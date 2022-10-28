<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <form wire:submit.prevent="save" id="form_advanced_validation">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group form-float col-md-4">
                            <div class="form-line">
                                <label class="form-label">عنوان سایت</label>
                                <input wire:model.defer="site_name" type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-float col-md-4">
                            <label class="form-label">ایمیل</label>
                            <div class="input-group mb-1">
                                <input wire:model.defer="email" type="email" class="form-control">
                                <div class="input-group-append">
                                    <button wire:click="addEmail" wire:loading.attr="disabled" wire:target="addEmail" class="btn btn-info m-0" type="button">
                                        <strong>افزودن</strong>
                                        <span wire:loading wire:target="addEmail" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            <?php if(isset($emails)): ?>
                            <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="input-group mb-1" wire:key="email-<?php echo e($index); ?>">
                                <input type="text" class="form-control" value="<?php echo e($email); ?>" readonly>
                                <div class="input-group-append">
                                    <button wire:click="removeEmail(<?php echo e($index); ?>)" wire:loading.attr="disabled" wire:target="removeEmail(<?php echo e($index); ?>)" type="button" class="btn btn-warning m-0"><i class="zmdi zmdi-delete" wire:target="removeEmail(<?php echo e($index); ?>)" wire:loading.remove></i>
                                        <span wire:loading wire:target="removeEmail(<?php echo e($index); ?>)" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="form-group form-float col-md-4">
                            <label class="form-label">شماره تماس</label>
                            <div class="input-group mb-1">
                                <input wire:model.defer="phone" type="number" class="form-control without-spin">
                                <div class="input-group-append">
                                    <button wire:click="addPhone" wire:loading.attr="disabled" wire:target="addPhone" class="btn btn-info m-0" type="button">
                                        <strong>افزودن</strong>
                                        <span wire:loading wire:target="addPhone" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            <?php if(isset($phones)): ?>
                            <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="input-group mb-1" wire:key="phone-<?php echo e($index); ?>">
                                <input type="text" class="form-control" value="<?php echo e($phone); ?>" readonly>
                                <div class="input-group-append">
                                    <button wire:click="removePhone(<?php echo e($index); ?>)" wire:loading.attr="disabled" wire:target="removePhone(<?php echo e($index); ?>)" type="button" class="btn btn-warning m-0"><i wire:target="removePhone(<?php echo e($index); ?>)" wire:loading.remove class="zmdi zmdi-delete"></i>
                                        <span wire:loading wire:target="removePhone(<?php echo e($index); ?>)" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="w-100"></div>
                        <div class="form-group form-float col-md-4">
                            <div class="form-line">
                                <label class="form-label">لینک اینستاگرام </label>
                                <input type="text" wire:model="instagram" class="form-control">
                            </div>
                        </div>

                        <div class="form-group form-float col-md-4">
                            <div class="form-line">
                                <label class="form-label">لینک واتس آپ</label>
                                <input type="text" wire:model="whatsapp" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-float col-md-4">
                            <div class="form-line">
                                <label class="form-label">لینک تلگرام</label>
                                <input type="text" wire:model="telegram" class="form-control">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="form-group form-float col-md-6">
                            <div class="form-line">
                                <label class="form-label">آدرس</label>
                                <input wire:model.defer="address" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-float col-md-6">
                            <div class="form-line">
                                <label class="form-label">ساعات کاری</label>
                                <input type="text" class="form-control" wire:model.defer="work_days">
                            </div>
                        </div>
                        <div class="w-100"></div>

                        <div class="form-group col-12 mb-1"><label class="form-label">مکان روی نقشه:</label></div>
                        <div class="form-group form-float col-md-6">
                            <small>طول جغرافیایی</small>
                            <div class="form-line">
                                <input type="number" step=any wire:model.defer="longitude" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-float col-md-6">
                            <div class="form-line">
                                <small>عرض جغرافیایی</small>
                                <input type="number" step=any wire:model.defer="latitude" class="form-control">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="form-group col-md-12">
                            <div class="form-line">
                                <label class="form-label">توضیحات</label>
                                <textarea wire:model.defer="description" rows="4" class="form-control no-resize"><?php echo e($description); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-line" wire:ignore>
                                <label class="form-label">حریم خصوصی</label>
                                <textarea id="privacy-summernote"><?php echo e($site_privacy); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-line" wire:ignore>
                                <label class="form-label">قوانین و مقررات</label>
                                <textarea id="rules-summernote"><?php echo e($site_rules); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group form-float col-12">
                            <label class="form-label">لینک های مفید</label>
                            <div class="input-group mb-2 col-md-6">
                                <input type="text" class="form-control <?php $__errorArgs = ['group_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model.defer="group_name" placeholder="عنوان دسته" />
                                <div class="input-group-append">
                                    <button wire:click="addGroupName" wire:loading.attr="disabled" wire:target="addGroupName" class="btn btn-info m-0" type="button">
                                        <strong>افزودن</strong>
                                        <span wire:loading wire:target="addGroupName" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                <?php if(isset($links)): ?>
                                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="panel panel-primary" wire:key="heading-<?php echo e($index); ?>">
                                    <div class="panel-heading" role="tab" id="heading_<?php echo e($index); ?>">
                                        <h4 class="panel-title">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-10 col-md-6">
                                                    <div class="row">
                                                        <div class="col-md">
                                                            <div class="input-group my-1">
                                                                <input type="text" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-control','is-invalid'=>$errors->has('links.'.$index.'.name')]) ?>" wire:model.defer="links.<?php echo e($index); ?>.name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-auto">
                                                            <button wire:click="addLink(<?php echo e($index); ?>)" wire:loading.attr="disabled" wire:target="addLink(<?php echo e($index); ?>)" class="btn btn-info ml-2" data-collaps-id="${collaps_id}" type="button"><i wire:target="addLink(<?php echo e($index); ?>)" wire:loading.remove class="zmdi zmdi-hc-fw"></i>لینک
                                                                <span wire:loading wire:target="addLink(<?php echo e($index); ?>)" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            </button>
                                                            <button wire:click="removeGroupName(<?php echo e($index); ?>)" wire:loading.attr="disabled" wire:target="removeGroupName(<?php echo e($index); ?>)" class="btn btn-warning ml-2" data-collaps-id="${collaps_id}" type="button"><i class="zmdi zmdi-delete" wire:target="removeGroupName(<?php echo e($index); ?>)" wire:loading.remove></i>
                                                                <span wire:loading wire:target="removeGroupName(<?php echo e($index); ?>)" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2 col-md">
                                                    <a class="text-center text-md-left" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_<?php echo e($index); ?>" aria-expanded="true" aria-controls="collapse_<?php echo e($index); ?>">
                                                        <span>&#10095</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </h4>
                                    </div>
                                    <div id="collapse_<?php echo e($index); ?>" class="panel-collapse collapse bg-ghostwhite in show" role="tabpanel" aria-labelledby="heading_<?php echo e($index); ?>">
                                        <div class="panel-body">
                                            <?php if(isset( $parent['children'] )): ?>
                                            <?php $__currentLoopData = $parent['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="input-group mb-2 mr-2" wire:key="body-<?php echo e($index); ?>-<?php echo e($key); ?>">
                                                <input wire:model.defer="links.<?php echo e($index); ?>.children.<?php echo e($key); ?>.title" type="text" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-control','is-invalid'=>$errors->has('links.'.$index.'.children.'.$key.'.title')]) ?>" placeholder="عنوان لینک">
                                                <input wire:model.defer="links.<?php echo e($index); ?>.children.<?php echo e($key); ?>.url" type="url" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-control','is-invalid'=>$errors->has('links.'.$index.'.children.'.$key.'.url')]) ?>" placeholder="آدرس لینک">
                                                <div class="input-group-append">
                                                    <button wire:click="removeLink(<?php echo e($index); ?>,<?php echo e($key); ?>)" wire:loading.attr="disabled" wire:target="removeLink(<?php echo e($index); ?>,<?php echo e($key); ?>)" type="button" class="btn btn-warning m-0"><i class="zmdi zmdi-delete" wire:target="removeLink(<?php echo e($index); ?>,<?php echo e($key); ?>)" wire:loading.remove></i>
                                                        <span wire:loading wire:target="removeLink(<?php echo e($index); ?>,<?php echo e($key); ?>)" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <?php if(empty($parent['children'])): ?>
                                            <div class="text-center text-muted">لینکی وجود ندارد</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="exampleFormControlFile1">آپلود لوگوی سایت <span wire:loading wire:target="logo" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></label>
                            <div class="custom-file d-flex flex-row-reverse">
                                <input wire:model="logo" type="file" class="custom-file-input" id="customFile" lang="ar" dir="rtl">
                                <label class="custom-file-label text-right" for="customFile">انتخاب عکس</label>
                            </div>
                            <?php if($logo || $logo_url): ?>
                            <img src="<?php echo e(isset($logo) ? $logo->temporaryUrl() : asset('storage/logo/'.$logo_url)); ?>" class="rounded mx-auto d-block img-fluid img-thumbnail preview-img mt-2">
                            <?php endif; ?>
                        </div>
                    </div>
                    <button type="submit" wire:loading.attr="disabled" class="btn btn-raised btn-primary waves-effect">
                        ذخیره
                        <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#privacy-summernote').summernote({
            height: 100,
            callbacks: {
                onChange: function(contents, $editable) {
                    Livewire.emit('privacyChanged',contents);
                }
            }
        });
        $('#rules-summernote').summernote({
            height: 100,
            callbacks: {
                onChange: function(contents, $editable) {
                    Livewire.emit('rulesChanged',contents);
                }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/public_html/WebEcommerce/resources/views/livewire/admin/settings/setting.blade.php ENDPATH**/ ?>