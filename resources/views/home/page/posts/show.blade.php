@extends('home.layout.MasterHome')
@section('title', "خانه -". $post->title)
@section('content')
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">"{{$post->title}}"</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li><a href="{{route('home.posts.index')}}">وبلاگ </a></li>
                <li>{{$post->title}}</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-8">
        <div class="container">
            <div class="">
                <div class="main-content post-single-content">
                    <div class="post post-grid post-single">
                        <figure class="post-media br-sm">
                            <img src="{{url('storage/'.$post->image->url)}}" alt="{{$post->title}}" width="530"
                                height="300" />
                        </figure>
                        <div class="post-details">
                            <div class="post-meta">
                                توسط <a href="{{route('home.posts.show' , ['post' => $post->id] )}}"
                                    class="post-author">{{$post->user->name}} </a>
                                - <a href="{{route('home.posts.show' , ['post' => $post->id] )}}"
                                    class="post-date">{{Hekmatinasser\Verta\Verta::instance($post->created_at)->format('Y/n/j')}}</a>
                                <a href="{{route('home.posts.show' , ['post' => $post->id] )}}" class="post-comment"><i
                                        class="w-icon-comments"></i><span>0</span>نظرات </a>
                            </div>
                            <h2 class="post-title"><a
                                    href="{{route('home.posts.show' , ['post' => $post->id] )}}">{{$post->title}}</a>
                            </h2>
                            <div class="post-content">
                                <p>
                                    {{$post->body}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Post Author Detail -->

                    <!-- End Post Navigation -->
                    <h4 class="title title-lg font-weight-bold mt-10 pt-1 mb-5">پست های اخیر </h4>
                    <div class="post-slider owl-carousel owl-theme owl-nav-top row cols-lg-3 cols-md-4 cols-sm-3 cols-xs-2 cols-1 pb-2"
                        data-owl-options="{
                                'nav': true,
                                'dots': false,
                                'margin': 20,
                                'responsive': {
                                    '0': {
                                        'items': 1
                                    },
                                    '576': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3
                                    },
                                    '992': {
                                        'items': 2
                                    },
                                    '1200': {
                                        'items': 3
                                    }
                                }
                            }">
                        @foreach ($posts as $post )

                        <div class="post post-grid">
                            <figure class="post-media br-sm">
                                <a href="{{route('home.posts.show' , ['post' => $post->id] )}}">
                                    <img src="{{url('storage/'.$post->image->url)}}" alt="{{$post->title}}" width="296"
                                        height="190" style="background-color: #bcbcb4;" />
                                </a>
                            </figure>
                            <div class="post-details text-center">
                                <div class="post-meta">
                                    توسط <a href="{{route('home.posts.show' , ['post' => $post->id] )}}"
                                        class="post-author">{{$post->user->name}}</a>
                                    - <a href="{{route('home.posts.show' , ['post' => $post->id] )}}"
                                        class="post-date">{{Hekmatinasser\Verta\Verta::instance($post->created_at)->format('Y/n/j')}}</a>
                                </div>
                                <h4 class="post-title mb-3"><a
                                        href="{{route('home.posts.show' , ['post' => $post->id] )}}">{{$post->title}}</a>
                                </h4>
                                <a href="{{route('home.posts.show' , ['post' => $post->id] )}}"
                                    class="btn btn-link btn-dark btn-underline font-weight-normal">ادامه مطلب <i
                                        class="w-icon-long-arrow-left"></i></a>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
                <!-- End of Main Content -->
                <aside class="sidebar right-sidebar blog-sidebar sidebar-fixed sticky-sidebar-wrapper">
                    <div class="sidebar-overlay">
                        <a href="#" class="sidebar-close">
                            <i class="close-icon"></i>
                        </a>
                    </div>
                    <a href="#" class="sidebar-toggle">
                        <i class="fas fa-chevron-left"></i>
                    </a>

                </aside>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
@endsection