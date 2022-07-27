<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                @if(count($banners)===0)
                <p>هیچ رکوردی وجود ندارد</p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover c_table theme-color">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>تصویر</th>
                                <th>عنوان</th>
                                <th>نوع</th>
                                <th>اولویت</th>
                                <th>وضعیت</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($banners as $key => $banner)
                            <tr >
                                <td scope="row">{{$banners->firstItem() + $key}}</td>
                                <td><a href="{{asset('storage/banners/'.$banner->image)}}" data-lightbox="{{'banner-'.$banner->id}}" data-title="{{$banner->title}}"><img class="rounded avatar" src="{{asset('storage/banners/'.$banner->image)}}" width="55" alt="{{$banner->title}}"></a></td>
                                <td>{{$banner->title}}</td>
                                <td>{{$banner->type}}</td>
                                <td>{{$banner->priority}}</td>
                                <td>@if ($banner->is_active)
                                    <span class="badge badge-success p-2">فعال</span>
                                    @else
                                    <span class="badge badge-warning p-2">غیرفعال</span>
                                    @endif
                                </td>
                                <td class="text-center js-sweetalert">
                                    <a href="{{route('admin.banners.edit',$banner->id)}}" wire:loading.attr="disabled" class="btn btn-raised btn-info waves-effect">
                                        <i class="zmdi zmdi-edit"></i>
                                        <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="edit_banner({{$banner->id}}) "></span>
                                    </a>

                                    <button class="btn btn-raised btn-danger waves-effect" wire:loading.attr="disabled" wire:click="del_banner({{$banner->id}})">
                                        <i class="zmdi zmdi-delete"></i>
                                        <span class="spinner-border spinner-border-sm text-light" wire:loading wire:target="del_banner({{$banner->id}})"></span>
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
        {{ $banners->links() }}
    </div>
</div>
