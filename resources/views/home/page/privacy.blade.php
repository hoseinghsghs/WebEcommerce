@extends('home.layout.MasterHome')
@section('title','حریم خصوصی')

@section('content')
<div class="container-main">
    <div class="d-block">
        <div class="page-content col-12">

            <div class="info-page-faq">
                <div class="content-info-page">
                    <h2 class="box-rounded_headline">حریم خصوصی</h2>
                    <p>
                     {!! $setting->site_privacy !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
