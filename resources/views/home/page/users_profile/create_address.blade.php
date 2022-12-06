@extends('home.layout.MasterHome')
@section('title' , 'ایجاد آدرس')
@section('content')
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    @include('home.page.users_profile.partial.right_side')
                    <div class="col-lg-9 col-12 pl">
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
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="name">نام و نام خانوادگی تحویل گیرنده <abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></label>
                                                    <input type="text" id="name" name="name"
                                                        class="input-name-checkout form-control m-0">
                                                    @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="phone-number">شماره موبایل <abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></label>
                                                    <input dir="ltr" type="number" id="phone-number" name="cellphone"
                                                        class="input-name-checkout form-control m-0 text-left">
                                                    @error('cellphone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="fixed-number">شماره تلفن ثابت(با پیش شماره)
                                                        <abbr class="required" title="ضروری"
                                                            style="color:red;">*</abbr></label>
                                                    <input dir="ltr" type="number" id="fixed-number" name="cellphone2"
                                                        class="input-name-checkout form-control m-0 text-left">
                                                    @error('cellphone2')
                                                    <small class="text-danger">{{ $message }}</small>
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
                                                        <small class="text-danger">{{ $message }}</small>
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
                                                        <small class="text-danger">{{ $message }}</small>
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
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="post-code">کد پستی<abbr class="required" title="ضروری"
                                                            style="color:red;">*</abbr></label>
                                                    <input dir="ltr" type="number" id="post-code" name="postal_code"
                                                        class="input-name-checkout form-control m-0">
                                                    @error('postal_code')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                    <label for="address">آدرس
                                                        <abbr class="required" title="ضروری" style="color:red;">*</abbr>
                                                    </label>
                                                    <textarea rows="5" cols="30" id="address" name="address"
                                                        class="textarea-name-checkout form-control m-0 "></textarea>
                                                    @error('address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                    <label for="address">آدرس جایگزین</label>
                                                    <textarea rows="5" cols="30" id="address" name="lastaddress"
                                                        class="textarea-name-checkout form-control mb-0"
                                                        placeholder="آدرس جایگزین در صورت ضرورت..."></textarea>
                                                    @error('lastaddress')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn-registrar" type="submit"> ثبت آدرس</button>
                                                    <a href="{{ route('home.addreses.index') }}" class="cancel-edit-address mt-0" aria-label="Close">بازگشت</a>
                                                </div>
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
@if($errors->any())
<script>
Swal.fire({
    text: "لطفا خطاها را رفع نمایید",
    icon: 'warning',
    showConfirmButton: false,
    toast: true,
    position: 'top-right',
    timer: 5000,
    timerProgressBar: true,
})
</script>

@endif
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
