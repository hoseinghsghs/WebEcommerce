@extends('admin.layout.MasterAdmin')
@section('title','لیست دسته بندی ها')
@push('styles')
    <style>
        .ui-sortable-handle {
            background-color: #f0f0f0;
            padding: 0.5rem;
            cursor: move;
            border-radius: 10px;
        }
    </style>
@endpush
@section('Content')
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>لیست دسته بندی ها</h2>
                        </br>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                    خانه</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">دسته بندی</a></li>
                            <li class="breadcrumb-item active">لیست دسته بندی ها</li>
                        </ul>
                        </br>
                        <a onclick="loadbtn(event)" href="{{route('admin.categories.create')}}"
                           class="btn btn-raised btn-info waves-effect">
                            افزودن<i class="zmdi zmdi-plus mr-1 align-middle"></i></a>
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
                <!-- Hover Rows -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                @if(count($categories)===0)
                                    <p>هیچ رکوردی وجود ندارد</p>
                                @else
                                    <ol class="sortable col-md-8 mx-auto">
                                        @foreach ($categories->where('parent_id',0)->sortBy('order') as $category )
                                            <li class="my-2" id="list_{{$category->id}}">
                                                <div><i class="zmdi zmdi-hc-fw"></i>
                                                    <strong>{{$category->name}}</strong>
                                                    @if ($category->is_active)
                                                        <span class="badge badge-success">فعال</span>
                                                    @else
                                                        <span class="badge badge-warning">غیرفعال</span>
                                                    @endif
                                                    <a href="{{route('admin.categories.edit',$category->id)}}"
                                                       class="btn btn-raised btn-info waves-effect m-0 btn-sm float-left"
                                                       onclick="loadbtn(event)">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                </div>
                                                @if($category->children->count()>0)
                                                    <ol>
                                                        @foreach ($category->children->loadCount('products')->sortBy('order') as $category2 )
                                                            <li class="my-2" id="list_{{$category2->id}}">
                                                                <div><i class="zmdi zmdi-hc-fw"></i>
                                                                    <strong>{{$category2->name}}</strong>
                                                                    @if ($category2->is_active)
                                                                        <span class="badge badge-success">فعال</span>
                                                                    @else
                                                                        <span class="badge badge-warning">غیرفعال</span>
                                                                    @endif
                                                                    <span class="badge badge-info">{{$category2->products_count}} محصول</span>
                                                                    <a href="{{route('admin.categories.edit',$category2->id)}}"
                                                                       class="btn btn-raised btn-info waves-effect m-0 btn-sm float-left"
                                                                       onclick="loadbtn(event)">
                                                                        <i class="zmdi zmdi-edit"></i>
                                                                    </a>
                                                                </div>
                                                                @if($category2->children->count()>0)
                                                                    <ol>
                                                                        @foreach ($category2->children->loadCount('products')->sortBy('order') as $category3 )
                                                                            <li class="my-2"
                                                                                id="list_{{$category3->id}}">
                                                                                <div><i class="zmdi zmdi-hc-fw"></i>
                                                                                    <strong>{{$category3->name}}</strong>
                                                                                    @if ($category3->is_active)
                                                                                        <span
                                                                                            class="badge badge-success">فعال</span>
                                                                                    @else
                                                                                        <span
                                                                                            class="badge badge-warning">غیرفعال</span>
                                                                                    @endif
                                                                                    <span class="badge badge-info">{{$category3->products_count}} محصول</span>
                                                                                    <a href="{{route('admin.categories.edit',$category3->id)}}"
                                                                                       class="btn btn-raised btn-info waves-effect m-0 btn-sm float-left"
                                                                                       onclick="loadbtn(event)">
                                                                                        <i class="zmdi zmdi-edit"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    </ol>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ol>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Hover Rows -->
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.sortable').nestedSortable({
                handle: 'div',
                items: 'li',
                toleranceElement: '> div',
                disableParentChange: true,
                rtl: true,
                relocate: function () {
                    var serializedData = window.JSON.stringify(
                        $('.sortable').nestedSortable('toArray', {
                            startDepthCount: 0
                        })
                    );
                    $(this).parents("div.body").append(`<div class="mb-3 text-center" id="order-loading"><div class="spinner-border text-info" role="status">
                                                   <span class="sr-only">Loading...</span>
                                                   </div><span class="text-muted"> درحال بارگذاری...</span></div>`);
                    $.post(
                        "{{route('admin.category.order')}}", {
                            _token: "{{csrf_token()}}",
                            data: serializedData,
                        },
                        function (response, status) {
                        },
                        "json"
                    )
                        .fail(function () {
                            swal({
                                title: 'خطا',
                                text: "خطا در برقراری ارتباط!",
                                icon: "warning",
                                confirmButtonText: "تایید",
                            })
                        })
                        .always(function () {
                            $('#order-loading').remove();
                        });
                }
            });
        });
    </script>
@endpush
