<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>{{$is_edit ? ' ویرایش ' : 'افزودن'}} مجوز </strong></h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="form-group">
                                <label>نام نمایشی</label>
                                <input type="text" name="display_name" class="form-control @error('display_name') is-invalid @enderror" wire:model.defer="display_name">
                                @error('display_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="form-group">
                                <label>عنوان مجوز</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" wire:model.defer="name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col m-auto">
                            <button wire:click="addPermission" wire:loading.attr="disabled" class="mt-md-3 btn btn-raised {{$is_edit ? 'btn-warning' : 'btn-primary'}}  waves-effect">
                                {{$is_edit ? 'ویرایش' : 'افزودن'}}
                                <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="addPermission"></span>
                            </button>
                            @if ($is_edit)
                            <button class="btn btn-raised btn-info waves-effect mt-md-3" wire:loading.attr="disabled" wire:click="ref">صرف نظر
                                <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="ref"></span>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>لیست مجوزها</strong></h2>
                </div>
                @if(count($permissions)===0)
                <p>هیچ رکوردی وجود ندارد</p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover c_table theme-color">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام نمایشی</th>
                                <th>نام</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $permission)
                            <tr wire:key={{$key}}>
                                <td scope="row">{{$permissions->firstItem() + $key}}</td>
                                <td>{{$permission->display_name}}</td>
                                <td>{{$permission->name}}</td>
                                <td class="text-center">
                                    <button wire:click="edit_permission({{$permission->id}})" wire:loading.attr="disabled" {{$display}} class="btn btn-raised btn-info waves-effect scroll">
                                        <i class="zmdi zmdi-edit"></i>
                                        <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="edit_permission({{$permission->id}}) "></span>
                                    </button>
                                    <button class="btn btn-raised btn-danger waves-effect" wire:loading.attr="disabled" wire:click="del_permission({{$permission->id}})" {{$display}}>
                                        <i class="zmdi zmdi-delete"></i>
                                        <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="del_permission({{$permission->id}})"></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            {{ $permissions->onEachSide(1)->links() }}
        </div>
    </div>
</div>
