@extends('home.layout.MasterHome')
@section('title', "خانه -". $post->title)
@section('content')
<main class="main-row d-block p-0">
    <div id="breadcrumb">
        <i class="mdi mdi-home"></i>
        <nav aria-label="breadcrumb" class="p-1">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
                <li class="breadcrumb-item"><a
                        href="{{route('home.posts.list' , $post->category)}}">{{$post->category}}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{route('home.posts.show' , ['post' => $post->slug] )}}">{{$post->title}}</a></li>
            </ol>
        </nav>
    </div>
    <div class="container-main">
        <div class="d-block">
            <div class="col-lg-9 col-md-8 col-xs-12 pr ">
                <section class="blog-home">
                    <article class="post-item">
                        <header class="entry-header mb-3">
                            <div class="post-meta date">
                                <i
                                    class="mdi mdi-calendar-month"></i>{{Hekmatinasser\Verta\Verta::instance($post->created_at)->format('Y/n/j')}}
                            </div>
                            <div class="post-meta author">
                                <i class="mdi mdi-account-circle-outline"></i>
                                ارسال شده توسط <a href=""> {{$post->user->name}} </a>
                            </div>
                            <div class="post-meta category">
                                <i class="mdi mdi-folder"></i>
                                <a href="{{route('home.posts.list' , $post->category)}}">{{$post->category}}</a>
                            </div>
                            <!-- <div class="post-meta Visit">
                                <i class="mdi mdi-eye"></i>
                                996 بازدید
                            </div> -->
                        </header>
                        <div class="post-thumbnail">
                            <img src="{{url('storage/'.$post->image->url)}}" alt="{{$post->title}}">
                        </div>
                        <div class="title">
                            <a>
                                <h1 class="title-tag">{{$post->title}}</h1>
                            </a>
                        </div>
                        <div class="content-blog">
                            <p>
                                {!! $post->body !!}
                            </p>
                        </div>
                        <div class="article-share">
                            <ul class="social">
                                <span>اشتراک گذاری:</span>
                                <a href="https://web.whatsapp.com/send?text={{route('home.posts.show' , ['post' => $post->slug] )}}"
                                    target="_blank" title="اشتراک در واتس‌اپ" rel="nofollow" class="p-2"><i
                                        class="fa fa-whatsapp"></i></a>

                                <a href="https://telegram.me/share/url?url={{route('home.posts.show' , ['post' => $post->slug] )}}"
                                    title="اشتراک گزاری در تلگرام" target="_blank" rel="noopener noreferrer" class="p-2"
                                    target="_blank"><i class="fa fa-telegram"></i></a>


                                <a href="https://www.linkedin.com/shareArticle?mini=true&title={{$post->title}}&url={{route('home.posts.show' , ['post' => $post->slug] )}}"
                                    title="اشتراک گذاری در لینکدین" target="_blank" rel="noopener noreferrer"
                                    class="p-2" target="_blank"><i class="fa fa-linkedin"></i></a>

                            </ul>
                        </div>
                    </article>
                    <div class="post-comments">
                        <div class="comments-area">
                            <h2 class="comments-title">
                                <i class="fa fa-comment-o"></i>
                                نظرات کاربران
                            </h2>
                            <ol class="comment-list">
                                @foreach ($post->approvedComments as $comment )
                                <li class="comment-even">
                                    <div class="comment-body">
                                        <header class="comment-meta">
                                            <div class="comment-author">

                                                <img src="/assets/home/images/man.png" class="">
                                                توسط
                                                {{$comment->user->name == " " ? "بدون نام" : $comment->user->name }} در
                                                تاریخ
                                                {{Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('Y/n/j')}}
                                            </div>
                                        </header>
                                        <p>{{$comment->text}}</p>

                                    </div>
                                </li>
                                @foreach ($comment->replies as $reply)
                                <li class="comment-even mr-5">
                                    <div class="comment-body">
                                        <header class="comment-meta">
                                            <div class="comment-author">
                                                <img src="/assets/home/images/man.png" class="">

                                                پاسخ :
                                                {{$reply->user->name == null ? "بدون نام" : $reply->user->name }}
                                                در
                                                تاریخ :
                                                <em>{{Hekmatinasser\Verta\Verta::instance($reply->created_at)->format('Y/n/j')}}</em>

                                            </div>
                                            <div style="word-wrap: break-word;">
                                                <span>{!!$reply->text!!}</span>
                                            </div>
                                    </div>
                                </li>
                                @endforeach
                                @endforeach
                            </ol>
                            <form action="{{route('home.comments.poststore' , ['post' => $post->id])}}" method="POST">
                                @csrf
                                <div class="form-comment" id='scform'>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-ui">
                                            <div class="row">

                                                <div class="col-12 mt-5">
                                                    <div class="form-row-title mb-2">متن نظر شما (اجباری)</div>
                                                    <div class="form-row">
                                                        <textarea class="input-ui pr-2 pt-2" rows="5" name="text"
                                                            placeholder="متن خود را بنویسید"
                                                            style="height:120px;"></textarea>
                                                        @error('text')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <br>
                                                <div class="col-12 mt-5 px-0">
                                                    <button class="btn comment-submit-button" type="submit">
                                                        ثبت نظر
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-12 pr mt-3 sticky-sidebar">
                <div class="shortcode-widget-area-sidebar">
                    <section class="widget-posts">
                        <div class="header-sidebar mb-3">
                            <h3>دسته بندی ها</h3>
                        </div>
                        <div class="content-sidebar">
                            <div class="widget widget_categories">
                                @foreach ($posts_category as $post_category)
                                <div class="item">
                                    <div class="item-inner">
                                        <a href="{{route('home.posts.list' , $post_category->category)}}">{{$post_category->category}}
                                            <span
                                                class="post-count">({{\App\Models\Post::where('category', $post_category->category)->count()}})</span></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </section>
                    @if ($posts->count())
                    <section class="widget-posts">
                        <div class="header-sidebar mb-3">
                            <h3>محبوب ترین ها</h3>
                        </div>
                        <div class="content-sidebar">
                            @foreach ($posts as $post )
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-thumb">
                                        <a href="{{route('home.posts.show' , ['post' => $post->slug] )}}"
                                            class="img-holder d-block">
                                            <img src="{{url('storage/'.$post->image->url)}}" alt="{{$post->title}}">
                                        </a>
                                    </div>

                                    <div class="title">
                                        <a href="{{route('home.posts.show' , ['post' => $post->slug] )}}">
                                            <h2 class="title-tag ">{{$post->title}}
                                                <p class="mt-2">
                                                    {{Hekmatinasser\Verta\Verta::instance($post->created_at)->format('Y/n/j')}}
                                                </p>
                                            </h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif

                </div>
            </div>
        </div>
    </div>
</main>
@endsection