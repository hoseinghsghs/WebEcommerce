@extends('home.layout.MasterHome')
@section('title' , 'آدرس ها')
@section('content')
    <div class="container-main">
        <div class="d-block">
            <section class="profile-home">
                <div class="col-lg">
                    <div class="post-item-profile order-1 d-block">
                        @include('home.page.users_profile.partial.right_side')
                        @if (!$addresses->count())
                            <div class="col-lg-9 col-12 pl">
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
                            <div class="col-lg-9 col-12 pl">
                                <div class="profile-content">
                                    <div class="profile-address">
                                        <div class="box-header">
                                            <span class="box-title">آدرس ها</span>
                                            <a class="btn btn-info btn-sm float-left"
                                               href="{{route('home.addreses.create')}}">آدرس جدید</a>
                                        </div>
                                        @foreach ($addresses as $address)
                                            <div class="profile-address-item">
                                                <div class="profile-stats m-1 p-3">
                                                    <div class="profile-address-item-top">
                                                        <div class="profile-address-item-title">
                                                            {{$address->title}}
                                                        </div>
                                                        <div class="ui-more">
                                                            <a href="{{ route('home.addreses.destroy', ['address' => $address->id]) }}"
                                                               class="btn-remove-address btn btn-danger"
                                                               type="submit"><i class="far fa-trash-alt"></i> <span
                                                                    class="d-none d-sm-inline-block">حذف</span></a>
                                                        </div>
                                                    </div>
                                                    <div class="profile-address-content">
                                                        <ul class="profile-address-info">
                                                            <li>
                                                                <div class="profile-address-info-item location">
                                                                    <i class="fa fa-user"></i>
                                                                    {{ $address->name }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="profile-address-info-item location">
                                                                    <i class="mdi mdi-phone"></i>
                                                                    {{ $address->cellphone }}
                                                                    , {{ $address->cellphone2 }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="profile-address-info-item location">
                                                                    <i class="mdi mdi-mailbox"></i>
                                                                    {{ $address->postal_code }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="profile-address-info-item location">
                                                                    <i class="mdi mdi-map-outline"></i>
                                                                    {{ province_name($address->province_id) }} ،
                                                                    {{ city_name($address->city_id) }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="profile-address-info-item location">
                                                                    <i class="mdi mdi-map-marker"></i>
                                                                    {{ $address->address }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="profile-address-info-item location">
                                                                    <i class="mdi mdi-map-marker-multiple"></i>
                                                                    {{ $address->lastaddress }}
                                                                </div>
                                                            </li>
                                                            <li class="location-link">
                                                                <a href="{{ route('home.addreses.edit', ['address' => $address->id]) }}"
                                                                   class="edit-address-link">ویرایش آدرس</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                    </div>
                                </div>
                                {{$addresses->onEachSide(1)->links()}}
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
    @push('scripts')
        <script>
            $('.province-select').change(function () {
                var provinceID = $(this).val();
                if (provinceID) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/get-province-cities-list') }}?province_id=" + provinceID,
                        success: function (res) {
                            if (res) {
                                $(".city-select").empty();
                                $.each(res, function (key, city) {
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
