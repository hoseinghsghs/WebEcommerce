@extends('admin.layout.MasterAdmin')
@section('title','لیست دسته بندی ها')
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
                    <a onclick="loadbtn(event)" href="{{route('admin.categories.create')}}" class="btn btn-raised btn-info waves-effect">
                        افزودن<i class="zmdi zmdi-plus mr-1 align-middle"></i></a>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
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
                            <div class="dd nestable-with-handle m-3">
                                <ol class="dd-list">
                                    @foreach ($categories->where('parent_id',0)->sortBy('order') as $category )
                                    <li class="dd-item dd3-item" data-id="{{$category->id}}">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">
                                            <strong>{{$category->name}}</strong>
                                            @if ($category->is_active)
                                            <span class="badge badge-success">فعال</span>
                                            @else
                                            <span class="badge badge-warning">غیرفعال</span>
                                            @endif
                                            <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-raised btn-info waves-effect m-0 btn-sm float-left" onclick="loadbtn(event)">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        </div>
                                        @if($categories->where('parent_id',$category->id))
                                        <ol class="dd-list">
                                            @foreach ($categories->where('parent_id',$category->id)->sortBy('order') as $category )
                                            <li class="dd-item dd3-item" data-id="{{$category->id}}">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content">
                                                    {{$category->name}}
                                                    @if ($category->is_active)
                                                    <span class="badge badge-success">فعال</span>
                                                    @else
                                                    <span class="badge badge-warning">غیرفعال</span>
                                                    @endif
                                                    <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-raised btn-info waves-effect m-0 btn-sm float-left" onclick="loadbtn(event)">
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
                            </div>
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
    $(".dd").on("change", function() {
        var $this = $(this);
        var serializedData = window.JSON.stringify(
            $($this).nestable("serialize")
        );
        $this.parents("div.body").prepend(`<div class="mb-3 text-center" id="loading"><div class="spinner-border text-info" role="status">
  <span class="sr-only">Loading...</span>
</div><span class="text-muted"> درحال بارگذاری...</span></div>`);
        $.post(
                "{{route('admin.category.order')}}", {
                    _token: "{{csrf_token()}}",
                    data: serializedData,
                },
                function(response, status) {},
                "json"
            )
            .fail(function() {
                swal({
                    title: 'خطا',
                    text: "خطا در برقراری ارتباط!",
                    icon: "warning",
                    confirmButtonText: "تایید",
                })
            })
            .always(function() {
                $this.parents("div.body").find('#loading').remove();
            });
    });
</script>
@endpush