@extends('home.layout.MasterHome')
@section('title','تماس با ما')

@section('content')
<!-- contact-us---------------------------->
<div class="container-main">
    <div class="col-12">
        <div id="content">
            <div class="contact-us">
                <div class="col-lg-9 col-md-9 col-xs-12 mx-auto">
                    <div class="contact-us-section">
                        @isset($setting->description)
                        <div class="box-header">
                            <span class="box-title">درباره ما</span>
                        </div>
                        <div class="contact-us-row">
                            <p>{{$setting->description}}</p>
                        </div>
                        @endisset
                        <div class="box-header">
                            <span class="box-title">اطلاعات {{$setting->title}}</span>
                        </div>
                        <div class="contact-us-row">
                            <div class="contact-us-address-container">
                                <div class="contact-us-address-header">
                                    دفتر مرکزی
                                </div>
                                <div class="contact-us-address-text">
                                    <i class="fa fa-map-marker fa-2x text-danger">

                                    </i>
                                    {{$setting->address}}
                                </div>
                                <div class="contact-us-address-header">
                                    شماره تماس
                                </div>
                                @if(json_decode($setting->phones) != null && json_decode($setting->phones) != [])
                                <div class="contact-us-address-text">
                                    <i class="fa fa-phone fa-2x text-danger"></i>
                                    @foreach(json_decode($setting->phones) as $phone)
                                    <a href="tel:{{$phone}}">{{$phone}}</a>{{$loop->last ? '' : ' - '}}
                                    @endforeach
                                </div>
                                @endif
                                <div class="contact-us-address-header">
                                    ایمیل سازمانی
                                </div>
                                <i class="fa fa fa-envelope-o fa-2x text-danger"></i>
                                @if(json_decode($setting->emails) != null && json_decode($setting->emails) != [])
                                <div class="contact-us-address-text d-inline-block">
                                    @foreach(json_decode($setting->emails) as $email)
                                    <a href="mailto:{{$email}}">{{$email}}</a>{{$loop->last ? '' : ' - '}}

                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- contact-us---------------------------->
@endsection