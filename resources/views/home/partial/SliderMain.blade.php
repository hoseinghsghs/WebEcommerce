<!-- slider-main--------------------------->
<div class="container-main">
    <div class="d-block">
        <div class="col-lg-12 col-xs-12 pr  p-0">
            <div class="slider-main-container d-block">
                <div id="carouselExampleIndicators" class="carousel slide" data-touch="true"
                     data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($sliders as $key=>$slider)
                            @if ($loop->first)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}"
                                    class="active"></li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}"></li>
                            @endif
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($sliders as $slider)
                            <a href="{{$slider->button_link}}">
                                <div @class(["carousel-item carousel-item-h4","active"=>$loop->first])>
                                    <picture>
                                        <source srcset="{{url(env('BANNER_IMAGES_PATCH').$slider->image)}}" media="(min-width: 970px)">
                                        <source srcset="{{route('fly-manipulation',['name'=>$slider->image,'width'=>1750,'height'=>700])}}" media="(min-width: 768px)">
                                        <source srcset="{{route('fly-manipulation',['name'=>$slider->image,'width'=>1500,'height'=>500])}}" media="(min-width: 270px)">
                                        <img class="d-block w-100 h-four-img" srcset="{{url(env('BANNER_IMAGES_PATCH').$slider->image)}}" alt="…">
                                    </picture>
                                    {{--<img src="{{route('fly-manipulation',['name'=>$slider->image,'width'=>360,'height'=>270])}}"
                                         class="d-block w-100 h-four-img" alt="{{$slider->title}}">--}}
                                    <div class="carousel-caption d-none d-md-block">
                                        @if($slider->title && $slider->text)
                                            <h3>{{$slider->title}}</h3>
                                            <p>{{$slider->text}}</p>
                                        @endif
                                        @isset($slider->button_text)
                                            <a href="{{$slider->button_link}}" type="submit"
                                               class="btn liko-danger-btn mt-4">@isset($slider->button_icon)
                                                    <i class="{{$slider->button_icon}}"></i>
                                                @endisset {{$slider->button_text}}</a>
                                        @endisset
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    @if(count($sliders)>1)
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
