@extends('admin.layout.MasterAdmin')
@section('title','ویرایش کامنت')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش نظر </h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href={{route('admin.comments.index')}}> لیست نظرات</a>
                        </li>
                        <li class="breadcrumb-item active">ویرایش
                        </li>
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
                        <div class="header p-0">
                            <h2><strong>مشخصات</strong></h2>
                        </div>
                        <hr>
                        <form id="form_advanced_validation" class="needs-validation"
                            action={{route('admin.comments.update',$comment->id)}} method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <label for="title">نام نویسنده</label>
                                    <div class="form-group">
                                        <input type="text" id="title" disabled
                                            class="form-control @error('name') is-invalid @enderror"
                                            value='{{$comment->user->name == null ? "بدون نام" : $comment->user->name }}'>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="date">تاریخ</label>
                                    <div class="form-group">
                                        <input type="text" id="date" disabled
                                            class="form-control @error('date') is-invalid @enderror"
                                            value="{{old('date') ?? Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('Y/n/j')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="product">محصول</label>
                                    <div class="form-group">
                                        <input type="text" id="product" disabled
                                            class="form-control @error('date') is-invalid @enderror"
                                            value="{{old('product') ?? $comment->commentable->cellphone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <label for="summernote2">دیدگاه</label>
                                    <div class="form-group">
                                        <textarea name="text" id="summernote2" minlength="3" required
                                            class="form-control summernote-editor">{{old('text') ?? $comment->text}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-raised btn-primary waves-effect">ویرایش</button>
                            </div>
                        </form>

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="body">

                                        <div class="header p-0">
                                            <h2><strong>نظر خریدار</strong></h2>
                                        </div>
                                        <hr>
                                        @if (isset($comment->user->rate->cost))
                                        <span class="cell-title">ارزش خرید
                                            :</span>
                                        <div class="progress m-b-5 my-2 mb-4">
                                            <div class="progress-bar progress-bar-success progress-bar-striped"
                                                role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"
                                                style="width: {{(ceil($comment->user->rate->first()->cost)*100)/5}}%;">
                                                <span
                                                    class="sr-only">{{(ceil($comment->user->rate->first()->cost)*100)/5}}%;
                                                </span>
                                            </div>
                                        </div>
                                        @endif

                                        @if (isset($comment->user->rate->quality))
                                        <span class="cell-title">کیفیت
                                            :</span>
                                        <div class="progress m-b-5 my-2 mb-4">
                                            <div class="progress-bar progress-bar-info progress-bar-striped"
                                                role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"
                                                style="width: {{(ceil($comment->user->rate->first()->quality)*100)/5}}%;">
                                                <span
                                                    class="sr-only">{{(ceil($comment->user->rate->first()->quality)*100)/5}}%;

                                                    (میزان رضایت)</span>
                                            </div>
                                        </div>
                                        @endif

                                        @if (isset($comment->user->rate->satisfaction))
                                        <span class="cell-title">میزان رضایت کلی از محصول
                                            :</span>
                                        <div class="progress m-b-5 my-2 mb-4">
                                            <div class="progress-bar progress-bar-warning progress-bar-striped"
                                                role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"
                                                style="width: {{(ceil($comment->user->rate->first()->satisfaction)*100)/5}}%;">
                                                <span
                                                    class="sr-only">{{(ceil($comment->user->rate->first()->satisfaction)*100)/5}}%;

                                                    (میزان رضایت)</span>
                                            </div>
                                        </div>
                                        @else
                                        بدون نظر سنجی
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($comment['advantages'])
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <span class="text-success">نقاط قوت :</span>
                                    <div class="body">
                                        <ul class="list-group">
                                            @php
                                            $comment['advantages'] =
                                            json_decode($comment->advantages);
                                            @endphp
                                            @foreach ($comment->advantages as $item )
                                            <li class="list-group-item">
                                                {{ $item }}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($comment['disadvantages'])
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <span class="text-danger">نقاط ضعف :</span>
                                    <div class="body">
                                        <ul class="list-group">
                                            @php
                                            $comment['disadvantages'] =
                                            json_decode($comment->disadvantages);
                                            @endphp
                                            @foreach ($comment->disadvantages as $item )
                                            <li class="list-group-item ">
                                                {{ $item }}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif



                        <div class="header p-0">
                            <h2><strong>پاسخ ها</strong></h2>
                        </div>
                        <hr>
                        <form
                            action="{{route('admin.comments.store' , ['comment_id' => $comment->id , 'product_id' => $comment->commentable_id])}}"
                            id="form_advanced_validation" class="needs-validation" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="summernote">دیدگاه</label>
                                    <div class="form-group">
                                        <textarea name="text" id="summernote" minlength="5" required
                                            placeholder="پاسخ ادمین...." class="form-control summernote-editor"></textarea>
                                    </div>
                                </div>
                                <button type="submit onclick=" loadbtn(event)"
                                    class="btn btn-raised btn-success waves-effect">
                                    پاسخ به این نظر </button>
                            </div>
                        </form>
                        <hr>
                        @foreach ($comment->replies as $comment)


                        @if($comment->approved ==0)
                        @php
                        $color="danger";
                        $title="عدم انتشار";
                        @endphp
                        @else
                        @php
                        $color="success";
                        $title="انتشار";
                        @endphp
                        @endif

                        @livewire('admin.replay.list-replay', key($comment->id) , ['question' =>
                        $comment , 'color' => $color , 'title' => $title , 'isquestion' => 0])

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Hover Rows -->
    </div>

</section>
@endsection
@flasher_render
@flasher_render
