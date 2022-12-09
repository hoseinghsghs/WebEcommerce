@extends('admin.layout.MasterAdmin')
@section('title','سرویس ها')

@section('Content')
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>لیست سرویس ها</h2>
                        </br>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                    خانه</a></li>
                            <li class="breadcrumb-item active">لیست سرویس ها</li>
                        </ul>
                        </br>
                        <a onclick="loadbtn(event)" href="{{route('admin.services.create')}}"
                           class="btn btn-raised btn-info waves-effect">
                            افزودن سرویس </a>
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
                            {{-- <div class="header">
                                <h2><strong>ردیف های</strong> شناور</h2>
                                <ul class="header-dropdown">
                                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                            data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="zmdi zmdi-more"></i> </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="javascript:void(0);">اقدام</a></li>
                                            <li><a href="javascript:void(0);">اقدام دیگر</a></li>
                                            <li><a href="javascript:void(0);">چیز دیگری</a></li>
                                        </ul>
                                    </li>
                                    <li class="remove">
                                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                    </li>
                                </ul>
                            </div> --}}
                            <div class="body">
                                @if(count($services)===0)
                                    <p>هیچ رکوردی وجود ندارد</p>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-hover c_table theme-color">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>تصویر</th>
                                                <th>عنوان</th>
                                                <th>توضیحات</th>
                                                <th>ترتیب</th>
                                                <th class="text-center">عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($services as $key => $service)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>
                                                                <a href="{{asset('storage/services/'.$service->image)}}"
                                                                   data-lightbox="{{'service-'.$service->id}}"
                                                                   data-title="{{$service->title}}"><img
                                                                        class="rounded avatar"
                                                                        src="{{asset('storage/services/'.$service->image)}}"
                                                                        width="55" alt="{{$service->title}}"></a>
                                                            </td>
                                                            <td>{{$service->title}}</td>
                                                            <td>{{$service->description}}</td>
                                                            <td>{{$service->service_order}}</td>
                                                            <td class="text-center js-sweetalert">
                                                                <a onclick="loadbtn(event)"
                                                                   href="{{route('admin.services.edit',$service->id)}}"
                                                                   class="btn btn-raised btn-info waves-effect">
                                                                    ویرایش
                                                                </a>
                                                                <button class="btn btn-raised btn-danger waves-effect"
                                                                        data-type="confirm"
                                                                        data-form-id="del-service-{{$service->id}}">حذف
                                                                </button>
                                                                <form
                                                                    action="{{route('admin.services.destroy',$service->id)}}"
                                                                    id="del-service-{{$service->id}}" method="POST">
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
                    </div>
                </div>
                <!-- #END# Hover Rows -->
            </div>
        </div>
    </section>
@endsection
