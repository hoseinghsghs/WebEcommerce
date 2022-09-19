@extends('home.layout.MasterHome')
@section('title','تایید ایمیل')
@section('content')

<div class="container-main">
    <div class="col-12">
        <div id="content">
            <div class="d-404">
                <div class="d-404-title">
                    <h1>خطای عدم تایید ایمیل!!!</h1>
                </div>
                <div class="d-404-actions">
                    <p class="text-muted mb-5">لطفا ابتدا لینک تاییدیه ارسالی به ایمیل خود را تایید نمایید.</p>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('frm-verify-email').submit();" class="d-404-action-primary">ارسال لینک تایید<i class="w-icon-long-arrow-left"></i></a>
                    <form id="frm-verify-email" class="d-none" action="{{ route('verification.send') }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="d-404-image">
                    <img src="/images/verify-email2.png">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection