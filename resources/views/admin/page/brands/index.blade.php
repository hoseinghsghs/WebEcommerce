@extends('admin.layout.MasterAdmin')
@section('title','مشاهده برند')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست برند ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">برند</a></li>
                        <li class="breadcrumb-item active">لیست برند ها</li>
                    </ul>
                    </br>
                    <a onclick="loadbtn(event)" href="{{route('admin.brands.create')}}" class="btn btn-raised btn-info waves-effect">
                        اضافه کردن برند </a>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <!-- Hover Rows -->
            @livewire('admin.brands.brand-controll')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        {{$brands->links('vendor.pagination.bootstrap-4')}}
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
    function test(event) {
        event.target.lightGallery({
            thumbnail: true,
            selector: 'a'
        });
    }
</script>
@endpush