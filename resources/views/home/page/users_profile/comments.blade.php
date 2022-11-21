@extends('home.layout.MasterHome')
@section('title' , 'پروفایل کاربری - علاقه مندی ها')
@section('content')
    <div class="container-main">
        <div class="d-block">
            <section class="profile-home">
                <div class="col-lg">
                    <div class="post-item-profile order-1 d-block">
                        @include('home.page.users_profile.partial.right_side')
                        <div class="col-lg-9 col-12 pl">
                            <div class="profile-content">
                                <h5 class="text-secondary">لیست نظرات</h5>
                                <div class="profile-stats">
                                    <div class="profile-comment">
                                        @if (!$comments->count())
                                            <div class="cart-empty text-center d-block p-5">
                                                <p class="cart-empty-title">لیست نظرات خالی است</p>
                                                <div class="return-to-shop">
                                                    <a href="{{route('home')}}" class="backward btn btn-warning">بازگشت
                                                        به
                                                        خانه</a>
                                                </div>
                                            </div>
                                        @else
                                            <table class="table table-borderless table-profile-comment">
                                                <thead>
                                                <tr style="border-bottom:solid 1px #dddddd;">
                                                    <th scope="col"></th>
                                                    <th scope="col">نام محصول</th>
                                                    <th scope="col">نظر</th>
                                                    <th scope="col">وضعیت</th>
                                                    <th scope="col">تاریخ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($comments as $comment )
                                                    <tr>
                                                        <td scope="row" class="th-img">
                                                            <div class="thumb-img">
                                                                <a
                                                                    href="{{route('home.products.show' , ['product' => $comment->commentable->slug])}}">
                                                                    <img
                                                                        src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$comment->commentable->primary_image)}}"
                                                                        height="50px" width="50px">
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{route('home.products.show' , ['product' => $comment->commentable->slug])}}">
                                                                {{$comment->commentable->name}}
                                                            </a>
                                                        </td>
                                                        <td>{{$comment->text}}</td>
                                                        <td>
                                                            @if ($comment->approved==1)
                                                                <span
                                                                    class="profile-comment-status-approved">تایید شده</span>
                                                            @else
                                                                <span class=" text-danger">تایید
                                                        نشده</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('Y/n/j')}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            @foreach ($comments as $comment )
                                                <div class="profile-comment-thumb p-2 my-2"
                                                     style="border: solid 1px #dddddd; border-radius: 1rem;">
                                                    <div class="profile-comment-img">
                                                        <a href="{{route('home.products.show' , ['product' => $comment->commentable->slug])}}"">
                                                        <img src="
                                                {{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$comment->commentable->primary_image)}}">
                                                        </a>
                                                    </div>
                                                    <div class="profile-comment-content">
                                                        <h4>
                                                            <a
                                                                href="{{route('home.products.show' , ['product' => $comment->commentable->slug])}}">
                                                                {{$comment->commentable->name}}
                                                            </a>
                                                            @if ($comment->approved==1)
                                                                <span
                                                                    class="profile-comment-status-review">تایید شده</span>
                                                            @else
                                                                <span class="bg-danger text-white">تایید
                                                    نشده</span>
                                                            @endif
                                                            <p>{{$comment->text}}</p>
                                                            <p>
                                                                تاریخ:{{Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('Y/n/j')}}
                                                            </p>
                                                        </h4>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-product m-0 p-2">
                                {{$comments->onEachSide(1)->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

