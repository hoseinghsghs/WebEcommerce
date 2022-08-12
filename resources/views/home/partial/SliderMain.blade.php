  <!-- slider-main--------------------------->
  <div class="container-main">
      <div class="d-block">
          <div class="col-lg-12 col-xs-12 pr mb-4 p-0">
              <div class="slider-main-container d-block">
                  <div id="carouselExampleIndicators" class="carousel slide" data-interval="5000" data-touch="true"
                      data-ride="carousel">
                      <ol class="carousel-indicators">
                          @foreach ($sliders as $key=>$slider)
                          @if ($loop->first)
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          @else
                          <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}"></li>
                          @endif
                          @endforeach
                      </ol>
                      <div class="carousel-inner">
                          @foreach ($sliders as $slider)
                          @if ($loop->first)
                          <a href="{{$slider->link}}">
                              <div class="carousel-item carousel-item-h4 active">
                                  @else
                                  <a href="{{$slider->link}}">
                                      <div class="carousel-item carousel-item-h4">
                                          @endif
                                          <img src="{{url(env('BANNER_IMAGES_PATCH').$slider->image)}}"
                                              class="d-block w-100 h-four-img" alt="{{$slider->title}}">

                                          <div class="carousel-caption d-none d-md-block">
                                              <a href="{{$slider->link}}" type="submit"
                                                  class="btn btn-warning btn-buy mt-4">{{$slider->button_text}}</a>
                                          </div>
                                      </div>
                                  </a>
                                  @endforeach
                              </div>
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
                      </div>
                  </div>
              </div>
          </div>
      </div>