@extends('home.layout.MasterHome')
@section('title', "خانه - پست ها")
@section('content')

<!-- Start of Main -->
<main class="main-row p-0">
    <div id="breadcrumb">
        <i class="mdi mdi-home"></i>
        <nav aria-label="breadcrumb" class="p-1">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
                <li class="breadcrumb-item"><a href="{{route('home.posts.index')}}">بلاگ</a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="container-main">
        <div class="d-block">
            <section class="content-widget">
                @foreach ($posts as $post)
                <div class="col-12 col-md-4 col-lg-4 col-xl-4 items-2 pr">
                    <article class="blog-item">
                        <figure class="figure">
                            <div class="post-thumbnail">

                                <img src="{{url('storage/'.$post->image->url)}}" alt="{{$post->title}}">
                            </div>

                            <div class="post-title">
                                <a href="{{route('home.posts.show' , ['post' => $post->slug] )}}" class="d-block">
                                    <h4>{{$post->title}}</h4>
                                </a>
                                <span class="post-date">
                                    <i class="fa fa-calendar"></i>
                                    {{Hekmatinasser\Verta\Verta::instance($post->created_at)->format('Y/n/j')}}
                                </span>
                            </div>
                        </figure>
                    </article>
                </div>
                @endforeach

            </section>
            <div class="pagination-product pr-3 pl-3 pr">
                <nav aria-label="Page navigation example">
                    {{ $posts->links() }}

                </nav>
            </div>
        </div>
    </div>
</main>
<!-- End of Main -->

@endsection