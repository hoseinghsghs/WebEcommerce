@extends('admin.layout.MasterAdmin')
@section('title','تنظیمات سایت')
@push('styles')
<style>
    .custom-file-label::after {
        left: 0;
        right: auto;
        border-left-width: 0;
        border-right: inherit;
    }
    .preview-img{
        max-height: 18em;
    }
</style>
@endpush

@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>تنظیمات</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i> خانه</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">تنظیمات</a></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @livewire('admin.settings.setting')
        </div>
    </div>
</section>
@endsection
