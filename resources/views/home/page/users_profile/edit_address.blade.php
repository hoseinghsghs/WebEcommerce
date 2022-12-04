@extends('home.layout.MasterHome')
@section('title' , 'ویرایش آدرس')
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
                                        <form class="form-checkout" action="{{route('home.addreses.update' , ['address' => $address->id])}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row form-checkout-row">
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="name">عنوان آدرس<abbr class="required" title="ضروری" style="color:red;">*</abbr></span></label>
                                                    <input type="text" id="name" name="title" value="{{old('title')??$address->title}}" class="input-name-checkout form-control m-0">
                                                    @error('title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="name">نام تحویل گیرنده <abbr class="required" title="ضروری" style="color:red;">*</abbr></span></label>
                                                    <input type="text" id="name" name="name" value="{{old('name')??$address->name}}" class="input-name-checkout form-control m-0">
                                                    @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="phone-number">شماره موبایل <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                    <input type="number" dir="ltr" id="phone-number" name="cellphone" value="{{old('cellphone')??$address->cellphone}}" class="input-name-checkout form-control m-0 text-left">
                                                    @error('cellphone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="fixed-number">شماره تلفن ثابت(با پیش شماره)
                                                        <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                    <input type="number" dir="ltr" id="fixed-number" name="cellphone2" value="{{old('cellphone2')??$address->cellphone2}}" class="input-name-checkout form-control m-0 text-left">
                                                    @error('cellphone2')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <div class="form-checkout-valid-row">
                                                        <label for="province">استان
                                                            <abbr class="required" title="ضروری" style="color:red;">*</abbr>
                                                        </label>
                                                        <select id="province_id" name="province_id" class="form-control m-0 province-select">
                                                            @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}" {{ $province->id == $address->province_id ? 'selected' : '' }}>
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
                                                            <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                        <select name="city_id" id="city" class="city-select form-control m-0">
                                                            <option value="{{ $address->city_id }}" selected>
                                                                {{ city_name($address->city_id) }}
                                                            </option>
                                                        </select>
                                                        @error('city_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <div class="form-checkout-valid-row">
                                                        <label for="apt-id">واحد</label>
                                                        <input type="text" id="apt-id" name="unit" value="{{ old('unit')??$address->unit }}" class="input-name-checkout js-input-apt-id form-control m-0">
                                                        @error('unit')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                                    <label for="post-code">کد پستی<abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                                    <input type="number" dir="ltr" id="post-code" name="postal_code" value="{{old('postal_code')??$address->postal_code}}" class="input-name-checkout form-control m-0" placeholder="کد پستی را بدون خط تیره بنویسید">
                                                    @error('postal_code')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                    <label for="address">آدرس
                                                        <abbr class="required" title="ضروری" style="color:red;">*</abbr>
                                                    </label>
                                                    <textarea rows="5" cols="30" id="address" name="address" class="textarea-name-checkout form-control m-0 ">{{old('address')??$address->address}}</textarea>
                                                    @error('address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                    <label for="address">آدرس جایگزین</label>
                                                    <textarea rows="5" cols="30" id="address" name="lastaddress" class="textarea-name-checkout form-control mb-0" placeholder="آدرس اضطراری در صورت بروز مشکل...">{{old('lastaddress')??$address->lastaddress}}</textarea>
                                                    @error('lastaddress')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mr-3">
                                                    <a href="{{ url()->previous() }}" class="btn bg-secondary text-light ret-btn ml-1" aria-label="Close">بازگشت</a>
                                                    <button class="btn-registrar" type="submit">ذخیره</button>
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
<script>
    @if ($errors->any())
    Swal.fire({
        text: "لطفا خطاها را رفع نمایید",
        icon: 'warning',
        showConfirmButton: false,
        toast: true,
        position: 'top-right',
        timer: 5000,
        timerProgressBar: true,
    })
    @endif
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
