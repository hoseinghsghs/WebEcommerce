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
                                            placeholder="نام محصول">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select data-placeholder="دسته بندی" class="form-control ms"
                                            wire:model.deferred="category" class="form-control ms select2">
                                            <option value="">دسته بندی</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select data-placeholder="وضعیت" class="form-control ms"
                                            wire:model.deferred="status" class="form-control ms select2">
                                            <option value="">وضعیت</option>
                                            <option value="1">انتشار</option>
                                            <option value="0">عدم انتشار</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="header">
                    <h2><strong>لیست محصولات </strong>( {{$products->total()}} )</h2>
                </div>
                <div class="body">
                    <div class="loader" wire:loading.flex>
                        درحال بارگذاری ...
                    </div>
                    @if(count($products)===0)
                    <p>هیچ رکوردی وجود ندارد</p>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عکس</th>
                                    <th>نام</th>
                                    <th>دسته بندی</th>
                                    <th> تاریخ و زمان ثبت </th>
                                    <th>وضعیت</th>

                                    <th>بایگانی</th>
                                    <th class="text-center">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr wire:key="name_{{ $product->id }}">
                                    <td scope="row">{{$key+1}}</td>
                                    <td>
                                        <a data-lightbox="brand-{{$loop->index}}" data-title="{{$product->name}}"
                                            href="{{asset('storage/primary_image/'.$product->primary_image)}}">
                                            <img src="{{asset('storage/primary_image/'.$product->primary_image)}}"
                                                alt="{{$product->name}}" width="48" class="img-fluid rounded"
                                                style="min-height: 3rem;">
                                        </a>
                                    </td>
                                    <td><a
                                            href="{{route('admin.products.show',['product' => $product->id ])}}">{{$product->name}}</a>
                                    </td>
                                    <td><a
                                            href="{{route('admin.categories.edit',['category' => $product->category->id ])}}">{{$product->category->name}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.products.show',['product' => $product->id ])}}">
                                            {{verta($product->created_at)->format('H:i Y/n/j')}}
                                        </a>
                                    </td>
                                    @if ($product->is_active==0)
                                    @php
                                    $color="danger";
                                    $title="عدم انتشار";
                                    @endphp
                                    @else
                                    @php
                                    $color="success";
                                    $title="انتشار";
                                    @endphp
                                    @endif
                                    <td>
                                        <div class="row clearfix">
                                            <div class="col-6">
                                                <a wire:click="ChengeActive_product({{$product->id}})"
                                                    wire:loading.attr="disabled"
                                                    class="btn btn-raised btn-{{$color}} waves-effect"><span
                                                        style="color:white;">{{$title}}</span>
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                    @if ($product->is_archive==0)
                                    @php
                                    $color="danger";
                                    $title="بایگانی کردن";
                                    @endphp
                                    @else
                                    @php
                                    $color="success";
                                    $title="خروج از بایگانی";
                                    @endphp
                                    @endif
                                    <td>
                                        <div class="row clearfix">
                                            <div class="col-6">
                                                <a wire:click="ChengeArchive_product({{$product->id}})"
                                                    wire:loading.attr="disabled"
                                                    class="btn btn-raised btn-{{$color}} waves-effect"><span
                                                        style="color:white;">{{$title}}</span>
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center js-sweetalert">

                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-md btn-warning btn-outline-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}"
                                                    class="dropdown-item text-right"> ویرایش محصول </a>

                                                <a href="{{ route('admin.products.images.edit', ['product' => $product->id]) }}"
                                                    class="dropdown-item text-right"> ویرایش تصاویر </a>

                                                <a href="{{ route('admin.products.category.edit', ['product' => $product->id]) }}"
                                                    class="dropdown-item text-right"> ویرایش دسته بندی و ویژگی </a>

                                            </div>
                                        </div>
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
</div>