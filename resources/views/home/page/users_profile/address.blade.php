@extends('home.layout.MasterHome')
@section('title' , 'آدرس ها')
@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="page-title mb-0">آدرس ها</h1>
    </div>
</div>
<!-- End of Page Header -->

<!-- Start of Breadcrumb -->
<nav class="breadcrumb-nav mb-10 pb-8">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="route('home')">صفحه اصلی </a></li>
            <li>آدرس ها</li>
        </ul>
    </div>
</nav>
<div class="tab-pane" id="account-addresses">


    <div class="row page-content pt-2" style="margin: 1rem 6rem 6rem 6rem;">
        <p>آدرس های زیر به طور پیش فرض در صفحه پرداخت استفاده می شود.</p>

        <!-- نمایش -->
        @foreach ($addresses as $address)
        <div class="col-sm-12 mb-12"
            style="margin-bottom: 1rem; border: 1px solid gray; border-radius: 6px;padding:8px">
            <div class="ecommerce-address billing-address pr-lg-8">
                <h4 class="title title-underline ls-25 font-weight-bold">آدرس {{$address->title}} </h4>
                <address class="mb-4">
                    <table class="address-table">
                        <tbody>
                            <tr>
                                <th>نام :</th>
                                <td> {{ auth()->user()->name == null ? 'کاربرگرامی' : auth()->user()->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>عنوان آدرس :</th>
                                <td> {{ $address->title }}</td>
                            </tr>
                            <tr>
                                <th>آدرس:</th>
                                <td> {{ $address->address }}</td>
                            </tr>
                            <tr>
                                <th>استان : </th>
                                <td>{{ province_name($address->province_id) }}</td>
                            </tr>
                            <tr>
                                <th>شهر :</th>
                                <td>{{ city_name($address->city_id) }}</td>
                            </tr>
                            <tr>
                                <th>کد پستی:</th>
                                <td>{{ $address->postal_code }}</td>
                            </tr>
                            <tr>
                                <th>تلفن:</th>
                                <td>{{ $address->cellphone }}</td>
                            </tr>
                        </tbody>
                    </table>
                </address>
                <a href="{{ route('home.addreses.edit', ['address' => $address->id]) }}"
                    class="btn btn-link btn-underline btn-icon-right text-primary">ویرایش آدرس</a>

                <a href="{{ route('home.addreses.destroy', ['address' => $address->id]) }}" style="margin-right: 5rem"
                    class="btn btn-link btn-underline btn-icon-right text-primary ">حذف</a>
            </div>

            <div class="row mt-3" id="{{$address->id}}"
                style="{{ count($errors->addressUpdate) > 0 && $errors->addressUpdate->first('address_id') == $address->id ? 'border-top: 1px solid #999; padding:5px ;' : 'display:none;border-top: 1px solid #999; padding:5px ;' }}">
                <div class="icon-box icon-box-side icon-box-light">
                    <span class="icon-box-icon icon-account mr-2">
                    </span>
                    <div class="icon-box-content">
                        <h4 class="title title-underline ls-25 font-weight-bold mt-3">ویرایش آدرس : {{$address->title}}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- نمایش -->

        <!-- //ایجاد -->
        <div class="row mt-3" style="border-top: 1px solid #999; padding:5px ;">
            <div class="icon-box icon-box-side icon-box-light">
                <span class="icon-box-icon icon-account mr-2">
                </span>
                <div class="icon-box-content">


                    <a class="btn btn-link  btn-icon-right text-primary">
                        <h4 class="title title-underline ls-25 font-weight-bold mt-3">ایجاد آدرس جدید</h4>

                    </a>
                </div>
            </div>
            <form class="form account-details-form" action="{{route('home.addreses.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">عنوان *
                                @error('title')
                                <strong style="color: red; margin-right: 1rem;">{{ $message }}</strong>
                                @enderror
                            </label>
                            <input type="text" id="firstname" name="title" value="{{old('title')}}"
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
                            <input type="text" id="cellphone" name="cellphone" value="{{old('cellphone')}}"
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
                                <option></option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}
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
                            <input type="text" id="postal_code" name="postal_code" value="{{old('postal_code')}}"
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
                        class="form-control form-control-md mb-0">{{old('cellphone')}}</textarea>
                </div>

                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">ایجاد آدرس</button>
            </form>
        </div>
        <!-- //ایجاد -->
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