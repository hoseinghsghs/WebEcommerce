@extends('admin.layout.MasterAdmin')
@section('title','ایجاد نقش')

@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ایجاد نقش</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">نقش ها</a></li>
                        <li class="breadcrumb-item active">ایجاد نقش</li>
                    </ul>
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
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="zmdi zmdi-block"></i>
                            </div>
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                    <div class="card">
                        <div class="body">
                            <form id="form_advanced_validation" class="needs-validation" action={{route('admin.roles.store')}} method="POST">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <label for="display_name">عنوان نمایشی نقش</label>
                                        <div class="form-group">
                                            <input type="text" name="display_name" id="display_name" class="form-control @error('display_name') is-invalid @enderror" value="{{old('display_name')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="name">نام</label>
                                        <div class="form-group">
                                            <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading" role="tab" id="headingOne_1">
                                                    <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">مجوز ها<span class="float-left">&#10095</span></a> </h4>
                                                </div>
                                                <div id="collapseOne_1" class="panel-collapse bg-ghostwhite collapse show in" role="tabpanel" aria-labelledby="headingOne_1">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            @forelse ($permissions as $index=>$permission)
                                                            <div class="col-sm-3">
                                                                <div class="checkbox">
                                                                    <input id="checkbox-{{$index}}" type="checkbox" name="permissions[]" value="{{$permission->name}}">
                                                                    <label for="checkbox-{{$index}}">{{$permission->display_name}}</label>
                                                                </div>
                                                            </div>
                                                            @empty
                                                            <div class="text-center text-muted">مجوزی وجود ندارد</div>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-raised btn-primary waves-effect">ذخیره</button>
                                </div>
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
