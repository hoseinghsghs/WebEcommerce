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
                                    {{$setting->address}}
                                </div>
                                <div class="contact-us-address-header">
                                    شماره تماس
                                </div>
                                @if(json_decode($setting->phones) != null && json_decode($setting->phones) != [])
                                @foreach(json_decode($setting->phones) as $phone)
                                <div class="contact-us-address-text">
                                    <a href="tel:{{$phone}}">{{$phone}}</a>{{$loop->last ? '' : ' _ '}}
                                </div>
                                @endforeach
                                @endif
                                <div class="contact-us-address-header">
                                    ایمیل سازمانی
                                </div>
                                @if(json_decode($setting->emails) != null && json_decode($setting->emails) != [])
                                @foreach(json_decode($setting->emails) as $email)
                                <div class="contact-us-address-text d-inline-block">
                                    <a href="mailto:{{$email}}">{{$email}}</a>{{$loop->last ? '' : ' / '}}
                                </div>
                                @endforeach
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
