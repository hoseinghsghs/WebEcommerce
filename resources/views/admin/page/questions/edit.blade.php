@extends('admin.layout.MasterAdmin')
@section('title','ویرایش پرسش و پاسخ')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>لیست پرسش و پاسخ</h2>
                        </br>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                    خانه</a></li>
                            <li class="breadcrumb-item"><a href={{route('admin.questions.index')}}>لیست پرسش و
                                    پاسخ </a></li>
                            <li class="breadcrumb-item active">ویرایش</li>
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
                            action={{route('admin.questions.update',$question->id)}} method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <label for="title">نام نویسنده</label>
                                    <div class="form-group">
                                        <input type="text" id="title" disabled
                                            class="form-control @error('name') is-invalid @enderror"
                                            value='{{$question->user->name == null ? "بدون نام" : $question->user->name }}'>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="date">تاریخ</label>
                                    <div class="form-group">
                                        <input type="text" id="date" disabled
                                            class="form-control @error('date') is-invalid @enderror"
                                            value="{{old('date') ?? Hekmatinasser\Verta\Verta::instance($question->created_at)->format('Y/n/j')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="product">محصول</label>
                                    <div class="form-group">
                                        <input type="text" id="product" disabled
                                            class="form-control @error('date') is-invalid @enderror"
                                            value="{{old('product') ?? $question->product->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <label for="summernote2">دیدگاه</label>
                                    <div class="form-group">
                                        <textarea name="text" id="summernote2" minlength="3" required
                                            class="form-control summernote-editor"><?= old('text') ?? $question->text ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-raised btn-primary waves-effect">ویرایش</button>
                            </div>
                        </form>
                        <div class="header p-0">
                            <h2><strong>پاسخ ها</strong></h2>
                        </div>
                        <hr>
                        <form
                            action="{{route('admin.questions.store' , ['question_id' => $question->id , 'product_id' => $question->product->id])}}"
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
                                <button type="submit onclick=" loadbtn(event)
                                    class="btn btn-raised btn-success waves-effect">
                                    پاسخ به این سوال </button>
                            </div>
                        </form>
                        <hr>
                        @foreach ($question->replies as $question)


                        @if($question->approved ==0)
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

                        @livewire('admin.replay.list-replay', key($question->id) , ['question' =>
                        $question , 'color' => $color , 'title' => $title , 'isquestion' => 1])

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
