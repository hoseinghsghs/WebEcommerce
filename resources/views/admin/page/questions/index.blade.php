@extends('admin.layout.MasterAdmin')
@section('title' , 'لیست پرسش و پاسخ')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست پرسش و پاسخ</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item active">لیست پرسش و پاسخ</li>
                    </ul>
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

            <!-- Hover Rows -->
            @livewire('admin.questions.questions-list',key($questions->id))
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        {{$questions->links('vendor.pagination.bootstrap-4')}}
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
@endsection