<!-- adplacement--------------------------->
<div class="container-fluid">
    <div class="row">
        <div class="adplacement-container-row ml-2 my-0">
            @foreach ($headers as $header )
            <div class="col-4 col-lg-2 p-1 pr">
                <a href="{{$header->link}}" class="adplacement-item m-1 ">
                    <div class="adplacement-sponsored_box">
                        <img src="{{url(env('BANNER_IMAGES_PATCH').$header->image)}}" alt="{{$header->title}}">
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- adplacement--------------------------->
