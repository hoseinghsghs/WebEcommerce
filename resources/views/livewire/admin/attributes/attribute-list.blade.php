<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>{{$is_edit ? ' ویرایش ' : 'افزودن'}} ویژگی </strong></h2>
                </div>
                <div class="body">
                    <form wire:submit.prevent="">
                        <div class="row clearfix">
                            <div class="col-md-4 col-sm-6">
                                <input type="text" name="name"
                                       class="form-control @error('attribute_name') is-invalid @enderror"
                                       placeholder="عنوان" wire:model.defer="attribute_name">
                                @error('attribute_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <button type="submit" wire:click="addAttribute" wire:loading.attr="disabled"
                                        class="btn btn-raised {{$is_edit ? 'btn-warning' : 'btn-primary'}}  waves-effect">
                                    {{$is_edit ? 'ویرایش' : 'اضافه کردن'}}
                                    <span class="spinner-border spinner-border-sm text-light" wire:loading
                                          wire:target="addAttribute"></span>
                                </button>
                                @if ($is_edit)
                                    <button type="button" class="btn btn-raised btn-info waves-effect"
                                            wire:loading.attr="disabled" wire:click="ref">صرف نظر
                                        <span class="spinner-border spinner-border-sm text-light" wire:loading
                                              wire:target="ref"></span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>لیست ویژگی ها </strong>( {{$attributes->total()}} )</h2>
                </div>
                <div class="body">
                    @if(count($attributes)===0)
                        <p>هیچ رکوردی وجود ندارد</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover c_table theme-color">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th class="text-center">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($attributes as $key => $attribute)
                                    <tr wire:key="attribute-field-{{ $attribute->id }}">
                                        <td scope="row">{{$attributes->firstItem() + $key}}</td>
                                        <td>{{$attribute->name}}</td>
                                        <td class="text-center">
                                            <button wire:click="edit_attribute({{$attribute->id}})"
                                                    wire:loading.attr="disabled"
                                                    {{$display}} class="btn btn-raised btn-info waves-effect scroll">
                                                <i class="zmdi zmdi-edit"></i>
                                                <span class="spinner-border spinner-border-sm text-light" wire:loading
                                                      wire:target="edit_attribute({{$attribute->id}}) "></span>
                                            </button>

                                            <button class="btn btn-raised btn-danger waves-effect"
                                                    wire:loading.attr="disabled"
                                                    wire:click="del_attribute({{$attribute->id}})" {{$display}}>
                                                <i class="zmdi zmdi-delete"></i>
                                                <span class="spinner-border spinner-border-sm text-light" wire:loading
                                                      wire:target="del_attribute({{$attribute->id}})"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            {{ $attributes->onEachSide(1)->links() }}
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $('.scroll').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    </script>
@endpush
