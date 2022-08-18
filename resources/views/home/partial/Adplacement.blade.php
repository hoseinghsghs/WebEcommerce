<!-- adplacement--------------------------->
<div class="container-fluid">
    <div class="row">
        <div class="adplacement-container-row">
            @foreach ($headers as $header )
            <div class="col-6 col-lg-3 pr">
                <a href="{{$header->link}}" class="adplacement-item">
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