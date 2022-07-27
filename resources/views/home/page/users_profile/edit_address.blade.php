@extends('home.layout.MasterHome')
@section('title' , 'ویرایش آدرس')
@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="page-title mb-0">ویرایش آدرس</h1>
    </div>
</div>
<!-- End of Page Header -->

<!-- Start of Breadcrumb -->
<nav class="breadcrumb-nav mb-10 pb-8">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">صفحه اصلی </a></li>
            <li><a href="{{route('home.user_profile')}}">پروفایل </a></li>
            <li><a href="{{route('home.addreses.index')}}">آدرسها </a></li>
            <li>ویرایش آدرس</li>
        </ul>
    </div>
</nav>
<div class="tab-pane" id="account-addresses">


    <div class="row page-content pt-2" style="margin: 1rem 6rem 6rem 6rem;">
        <p>آدرس های زیر به طور پیش فرض در صفحه پرداخت استفاده می شود.</p>



        <!-- //ویرایش -->
        <div class="row mt-3" style="border-top: 1px solid #999; padding:5px ;">
            <div class="icon-box icon-box-side icon-box-light">
                <span class="icon-box-icon icon-account mr-2">
                </span>
                <div class="icon-box-content">


                    <a onclick="edit_address('{{$address->id}}')" class="btn btn-link  btn-icon-right text-primary">
                        <h4 class="title title-underline ls-25 font-weight-bold mt-3">ویرایش آدرس : {{$address->title}}
                        </h4>

                    </a>
                </div>
            </div>
            <form class="form account-details-form"
                action="{{route('home.addreses.update' , ['address' => $address->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">عنوان *
                                @error('title')
                                <strong style="color: red; margin-right: 1rem;">{{ $message }}</strong>
                                @enderror
                            </label>
                            <input type="text" id="title" name="title" value="{{$address->title}}"
                                class="form-control form-control-md">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cellphone">شماره تماس *
                                @error('cellphone')
                                <strong style="color: red;margin-right: 1rem">{{ $message }}</strong>
                                @enderror
                            </label>
                            <input type="text" id="cellphone" name="cellphone" value="{{$address->cellphone}}"
                                class="form-control form-control-md">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname">استان *
                                @error('province_id')
                                <strong style="color: red; margin-right: 1rem;">{{ $message }}</strong>
                                @enderror
                            </label>
                            <select name="province_id" class="form-control form-control-md province-select"
                                id="province_id">
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}"
                                    {{ $province->id == $address->province_id ? 'selected' : '' }}>
                                    {{ $province->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname">شهر *
                                @error('city_id')
                                <strong style="color: red; margin-right: 1rem;">{{ $message }}</strong>
                                @enderror
                            </label>

                            <select class="form-control form-control-md city-select" name="city_id">
                                <option value="{{ $address->city_id }}" selected>
                                    {{ city_name($address->city_id) }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="postal_code">کد پستی *
                                @error('postal_code')
                                <strong style="color: red;margin-right: 1rem">{{ $message }}</strong>
                                @enderror
                            </label>
                            <input type="text" id="postal_code" name="postal_code" value="{{$address->postal_code}}"
                                class="form-control form-control-md">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="display-name">آدرس *
                        @error('address')
                        <strong style="color: red; margin-right: 1rem;">{{ $message }}</strong>
                        @enderror
                    </label>


                    <textarea name="address" id="address" cols="30" rows="6"
                        class="form-control form-control-md mb-0">{{$address->address}}</textarea>
                </div>

                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">ویرایش آدرس</button>
            </form>
        </div>
        <!-- //ویرایش -->
    </div>
</div>
@push('scripts')
<script>
$('.province-select').change(function() {

    var provinceID = $(this).val();
    if (provinceID) {
        $.ajax({
            type: "GET",
            url: "{{ url('/get-province-cities-list') }}?province_id=" + provinceID,
            success: function(res) {
                if (res) {
                    $(".city-select").empty();

                    $.each(res, function(key, city) {
                        $(".city-select").append('<option value="' + city.id + '">' +
                            city.name + '</option>');
                    });

                } else {
                    $(".city-select").empty();
                }
            }
        });
    } else {
        $(".city-select").empty();
    }
});
</script>
@endpush
@endsection