<div>
    <!-- Hover Rows -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-4 col-sm-6">
                            <input type="text" placeholder="عنوان" name="name" wire:model.defer="tag_name" class="form-control">
                            @error('tag_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <button wire:click="addTag" wire:loading.attr="disabled" class="btn btn-raised {{$is_edit ? 'btn-warning' : 'btn-primary'}}  waves-effect">
                                {{$is_edit ? 'ویرایش' : 'افزودن'}}
                                <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="addTag"></span>
                            </button>
                            @if ($is_edit)
                            <button class="btn btn-raised btn-info waves-effect" wire:loading.attr="disabled" wire:click="ref">صرف نظر
                                <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="ref"></span>
                            </button>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- #END# Hover Rows -->
    <!-- لیست -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>لیست تگ ها </strong>( {{$tags->total()}} )</h2>
                </div>
                <div class="body">
                    @if(count($tags)===0)
                    <p>هیچ رکوردی وجود ندارد</p>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th class="text-center js-sweetalert">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                <tr wire:key="{{ $tag->name}} {{$tag->id }}" wire:loading.attr="disabled">
                                    <td scope="row">{{$tag->id}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td class="text-center js-sweetalert">

                                        <button wire:click="edit_tag({{$tag->id}})" wire:loading.attr="disabled" {{$display}} class="btn btn-raised btn-info waves-effect scroll">
                                            <i class="zmdi zmdi-edit"></i>
                                            <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="edit_tag({{$tag->id}}) "></span>
                                        </button>

                                        <button class="btn btn-raised btn-danger waves-effect" wire:loading.attr="disabled" wire:click="del_tag({{$tag->id}})" {{$display}}>
                                            <i class="zmdi zmdi-delete"></i>

                                            <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="del_tag({{$tag->id}})"></span>
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

        </div>
    </div>
    <!-- پایان لیست -->
</div>
@push('scripts')
<script>
    $('.scroll').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
</script>

@endpush
