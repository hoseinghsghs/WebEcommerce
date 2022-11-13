@extends('admin.layout.MasterAdmin')
@section('title','ویرایش کاربر')

@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش کاربر</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">کاربران</a></li>
                        <li class="breadcrumb-item active">ویرایش کاربر</li>
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
                            <form id="form_advanced_validation" class="needs-validation" action="{{route('admin.users.update',$user->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <label for="title">نام</label>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="text">شماره تلفن</label>
                                        <div class="form-group">
                                            <input type="number" name="cellphone" class="form-control without-spin @error('cellphone') is-invalid @enderror" value="{{old('cellphone') ?? $user->cellphone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="text">ایمیل</label>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email') ?? $user->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="type">نقش کاربری</label>
                                        <select id="positionSelect" name="role" data-placeholder="انتخاب نقش" class="form-control ms select2">
                                            <option value='false'>بدون نقش</option>
                                            @forelse ($roles as $role)
                                            <option value="{{$role->name}}" @selected(in_array($role->id,$user->roles->pluck('id')->toArray()))>{{$role->display_name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading" role="tab" id="headingOne_1">
                                                    <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">مجوز ها<span class="float-left">&#10095</span></a> </h4>
                                                </div>
                                                <div id="collapseOne_1" class="panel-collapse collapse bg-ghostwhite show in" role="tabpanel" aria-labelledby="headingOne_1">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            @forelse ($permissions as $index=>$permission)
                                                            <div class="col-sm-3">
                                                                <div class="checkbox">
                                                                    <input id="checkbox-{{$index}}" type="checkbox" name="permissions[]" value="{{$permission->name}}" @checked(in_array($permission->id,$user->permissions->pluck('id')->toArray()))>
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
                                    <a href="{{route('admin.users.index')}}" class="btn btn-secondary ml-md-3">بازگشت</a>
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
