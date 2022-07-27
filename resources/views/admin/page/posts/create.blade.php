@extends('admin.layout.MasterAdmin')

@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ایجاد خبر</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">خبر</a></li>
                        <li class="breadcrumb-item active">ایجاد خبر</li>
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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form id="form_advanced_validation" class="needs-validation"
                                action={{route('admin.posts.store')}} method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">عنوان</label>
                                        <input type="text" name="title" class="form-control" maxlength="100"
                                            minlength="3" value="{{ old('title') }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <label class="form-label">توضیحات</label>
                                        <textarea name="body" rows="4" class="form-control" minlength="5"
                                            required>{{ old('body') }}</textarea>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="body">
                                        <div class="summernote">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">آپلود عکس</label>
                                    <div class="col-lg-12 px-0">
                                        <input name="image" type="file" class="dropify"
                                            data-allowed-file-extensions="jpg png jpeg" data-max-file-size="1024K"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="switch">وضعیت</label>
                                    <div class="switchToggle">
                                        <input type="checkbox" name="status" id="switch"
                                            {{old('is_active') ? 'checked' : null}}>
                                        <label for="switch">Toggle</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-raised btn-primary waves-effect">
                                    ذخیره
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="/assets/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="/assets/summernote/dist/summernote.css" />
@endpush

@push('scripts')
<script src="/assets/summernote/dist/summernote.js"></script>
@endpush