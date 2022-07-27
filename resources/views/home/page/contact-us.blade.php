@extends('home.layout.MasterHome')
@section('title','تماس با ما')

@section('content')
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">تماس با ما</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-1">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li>تماس با ما</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <!-- Start of PageContent -->
    <div class="page-content contact-us">
        <div class="container">
            @isset($setting->description)
            <section class="content-title-section mb-10">
                <h3 class="title title-center mb-3">درباره ما</h3>
                <p class="text-center">{{$setting->description}}</p>
            </section>
            <hr class="divider mb-10 pb-1">
           @endisset
            <section class="content-title-section mb-10">
                <h3 class="title title-center mb-3">اطلاعات تماس</h3>
            </section>
            <!-- End of Contact Title Section -->

            <section class="contact-information-section mb-10">
                <div class="row owl-carousel owl-theme cols-xl-4 cols-md-3 cols-sm-2 cols-1" data-owl-options="{
                        'items': 4,
                        'nav': false,
                        'dots': false,
                        'loop': false,
                        'margin': 20,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '480': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '992': {
                                'items': 4
                            }
                        }
                    }">
                    <div class="icon-box text-center icon-box-primary">
                        <span class="icon-box-icon icon-email">
                            <i class="w-icon-envelop-closed"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">آدرس ایمیل</h4>
                            <p>
                                @if(json_decode($setting->emails) != null && json_decode($setting->emails) != [])

                                @foreach(json_decode($setting->emails) as $email)

                                {{$email}}{{$loop->last ? '' : ' / '}}

                                @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="icon-box text-center icon-box-primary">
                        <span class="icon-box-icon icon-headphone">
                            <i class="w-icon-headphone"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">شماره تلفن</h4>
                            <p>@if(json_decode($setting->phones) != null && json_decode($setting->phones) != [])
                                @foreach(json_decode($setting->phones) as $phone)

                                {{$phone}}{{$loop->last ? '' : ' / '}}

                                @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="icon-box text-center icon-box-primary">
                        <span class="icon-box-icon icon-map-marker">
                            <i class="w-icon-map-marker"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">آدرس </h4>
                            <p>{{$setting->address}}</p>
                        </div>
                    </div>
                    <div class="icon-box text-center icon-box-primary">
                        <span class="icon-box-icon icon-workday">
                            <i class="w-icon-dashboard"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">ساعات کاری</h4>
                            <p>{{$setting->work_days}}</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of Contact Information section -->

            <hr class="divider mb-10 pb-1">

            <!-- End of Contact Section -->
            @if($setting->latitude && $setting->longitude)
            <h4 class="title mb-3">مکان ما روی نقشه</h4>
            <div id="map" style="height: 450px; background: #eee; border: 2px solid #aaa;"></div>
            @endif
        </div>

        <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
        <!-- <iframe src=https://www.google.com/maps/embed?hl=fa&pb=!1m18!1m12!1m3!1d7915.525673176609!2d46.32542404246615!3d38.06389198146334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzjCsDAzJzUzLjgiTiA0NsKwMTknMzkuNCJF!5e0!3m2!1sen!2s!4v1545664085241" width="1900" height="500" frameborder="0" style="border:0" allowfullscreen></iframe> -->
        <!-- End Map Section -->
    </div>
    <!-- End of PageContent -->
</main>
@endsection
@if($setting->latitude && $setting->longitude)
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
@endpush
@push('scripts')
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

<script>
    var map = L.map('map').setView([{{$setting->longitude}}, {{$setting->latitude}}], 13);
    L.tileLayer('https://developers.parsijoo.ir/web-service/v1/map/?type=tile&x={x}&y={y}&z={z}&apikey=627973149c2041b184e31259821d1306', {
        maxZoom: 21,
    }).addTo(map);
    var marker = L.marker([{{$setting->longitude}},{{$setting->latitude}}]).addTo(map);
</script>
@endpush
@endif
