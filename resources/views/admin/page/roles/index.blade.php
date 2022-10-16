@extends('admin.layout.MasterAdmin')
@section('title','لیست نقش ها')

@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست نقش ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">نقش ها</a></li>
                        <li class="breadcrumb-item active">لیست نقش ها</li>
                    </ul>
                    </br>
                    <a onclick="loadbtn(event)" href="{{route('admin.roles.create')}}" class="btn btn-raised btn-info waves-effect">
                        افزودن<i class="zmdi zmdi-plus mr-1 align-middle"></i></a>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            @if(count($roles)===0)
                            <p>هیچ رکوردی وجود ندارد</p>
                            @else
                            <div class="table-responsive">
                                <table class="table table-hover c_table theme-color">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>نام نمایشی</th>
                                            <th>نام</th>
                                            <th class="text-center">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $key => $role)
                                        <tr>
                                            <td scope="row">{{$roles->firstItem() + $key}}</td>
                                            <td>{{$role->display_name}}</td>
                                            <td>{{$role->name}}</td>
                                            <td class="text-center js-sweetalert">
                                                <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-raised btn-info waves-effect" onclick="loadbtn(event)">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <button class="btn btn-raised btn-danger waves-effect" data-type="confirm" data-form-id="del-role-{{$role->id}}"><i class="zmdi zmdi-delete"></i></button>
                                                <form action="{{route('admin.roles.destroy',$role->id)}}" id="del-role-{{$role->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                    {{ $roles->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
