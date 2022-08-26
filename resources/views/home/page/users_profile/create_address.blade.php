@extends('home.layout.MasterHome')
@section('title' , 'ایجاد آدرس')
@section('content')
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">

                    @include('home.page.users_profile.partial.right_side')
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="profile-address">

                                    <div class="middle-container">
                                        <form class="form-checkout" action="{{route('home.addreses.store')}}"
                                            method="POST">
                                            @csrf
                                            <div class="row form-checkout-row">

                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="name">عنوان آدرس<abbr class="required" title="ضروری"
                                                            style="color:red;">*</abbr></span></label>
                                                    <input type="text" id="name" name="title"
                                                        class="input-name-checkout form-control m-0">
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="name">نام تحویل گیرنده <abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></span></label>
                                                    <input type="text" id="name" name="name"
                                                        class="input-name-checkout form-control m-0">
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="phone-number">شماره موبایل <abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></label>
                                                    <input type="text" id="phone-number" name="cellphone"
                                                        class="input-name-checkout form-control m-0 text-left">
                                                    @error('cellphone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="fixed-number">شماره تلفن ثابت
                                                        <abbr class="required" title="ضروری"
                                                            style="color:red;">*</abbr></label>
                                                    <input type="text" id="fixed-number" name="cellphone2"
                                                        class="input-name-checkout form-control m-0 text-left">
                                                    @error('cellphone2')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <div class="form-checkout-valid-row">
                                                        <label for="province">استان
                                                            <abbr class="required" title="ضروری"
                                                                style="color:red;">*</abbr>
                                                        </label>
                                                        <select id="province_id" name="province_id"
                                                            class="form-control m-0 province-select">
                                                            <option selected="selected" disabled>استان
                                                                مورد
                                                                نظر خود را انتخاب کنید </option>
                                                            @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}">
                                                                {{ $province->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('province_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <div class="form-checkout-valid-row">
                                                        <label for="city">شهر
                                                            <abbr class="required" title="ضروری"
                                                                style="color:red;">*</abbr></label>
                                                        <select name="city_id" id="city"
                                                            class="city-select form-control m-0">
                                                        </select>
                                                        @error('city_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <div class="form-checkout-valid-row">
                                                        <label for="apt-id">واحد
                                                            <span class="optional"> (اختیاری)
                                                            </span>
                                                        </label>
                                                        <input type="text" id="apt-id" name="unit"
                                                            class="input-name-checkout js-input-apt-id form-control m-0">
                                                        @error('unit')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="post-code">کد پستی<abbr class="required" title="ضروری"
                                                            style="color:red;">*</abbr></label>
                                                    <input type="text" id="post-code" name="postal_code"
                                                        class="input-name-checkout form-control m-0"
                                                        placeholder="کد پستی را بدون خط تیره بنویسید">
                                                    @error('postal_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                    <label for="address">آدرس
                                                        <abbr class="required" title="ضروری" style="color:red;">*</abbr>
                                                    </label>
                                                    <textarea rows="5" cols="30" id="address" name="address"
                                                        class="textarea-name-checkout form-control m-0 "></textarea>
                                                    @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                    <label for="address">آدرس اضطراری
                                                        <abbr class="required" title="ضروری" style="color:red;">*</abbr>
                                                    </label>
                                                    <textarea rows="5" cols="30" id="address" name="lastaddress"
                                                        class="textarea-name-checkout form-control mb-0"
                                                        placeholder="آدرس اضطراری در صورت بروز مشکل..."></textarea>
                                                    @error('lastaddress')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                                <div class="AR-CR mr-3">
                                                    <button class="btn-registrar" type="submit"> ثبت آدرس</button>

                                                </div>
                                                <a href="{{ url()->previous() }}" class="btn-registrar mr-3"
                                                    data-dismiss="modal" aria-label="Close">بازگشت</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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