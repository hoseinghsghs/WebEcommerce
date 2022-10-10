@extends('home.layout.MasterHome')
@section('title' , 'آدرس ها')
@section('content')<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    @include('home.page.users_profile.partial.right_side')
                    @if (!$addresses->count())
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="profile-address">
                                    <center class="my-5">
                                        <div class="m-3 "> لیست آدرس شما خالی است.
                                        </div>
                                        <a class="btn btn-warning btn-sm  m-3 "
                                            href="{{route('home.addreses.create')}}">آدرس
                                            جدید</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <a class="btn btn-warning btn-sm mr-5 my-3 " href="{{route('home.addreses.create')}}">آدرس جدید</a>
                    @foreach ($addresses as $address)
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="profile-address">
                                    <div class="box-header">
                                        <span class="box-title">آدرس ها</span>
                                    </div>
                                    <div class="profile-address-item">
                                        <div class="profile-address-item-top">
                                            <div class="profile-address-item-title">
                                                {{$address->address}}
                                            </div>
                                            <div class="ui-more">
                                                <a href="{{ route('home.addreses.destroy', ['address' => $address->id]) }}"
                                                    class="btn-remove-address btn btn-danger" type="submit">حذف</a>
                                            </div>
                                        </div>
                                        <div class="profile-address-content">
                                            <ul class="profile-address-info">
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-map-outline"></i>
                                                        {{ province_name($address->province_id) }} ،
                                                        {{ city_name($address->city_id) }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-email-outline"></i>
                                                        {{ $address->postal_code }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-phone"></i>
                                                        {{ $address->cellphone }} , {{ $address->cellphone2 }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-account"></i>
                                                        {{ $address->name }}
                                                    </div>
                                                </li>
                                                <li class="location-link">
                                                    <a href="{{ route('home.addreses.edit', ['address' => $address->id]) }}"
                                                        class="edit-address-link">ویرایش آدرس</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endif
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