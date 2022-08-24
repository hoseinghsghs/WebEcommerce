@extends('home.layout.MasterHome')
@section('title' , 'آدرس ها')
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
                                    <div class="box-header">
                                        <span class="box-title">نشانی ما</span>
                                    </div>
                                    <div class="profile-address-item">
                                        <div class="profile-address-item-top">
                                            <div class="profile-address-item-title">خراسان شمالی ، بجنورد</div>
                                            <div class="ui-more">
                                                <button class="btn-remove-address btn btn-danger"
                                                    type="submit">حذف</button>
                                            </div>
                                        </div>

                                        <div class="profile-address-content">
                                            <ul class="profile-address-info">
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-map-outline"></i>
                                                        خراسان شمالی، بجنورد
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-email-outline"></i>
                                                        945789651235
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-phone"></i>
                                                        0991*******
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="profile-address-info-item location">
                                                        <i class="mdi mdi-account"></i>
                                                        خراسان شمالی، بجنورد
                                                    </div>
                                                </li>
                                                <li class="location-link">
                                                    <a href="#" class="edit-address-link">ویرایش آدرس</a>
                                                </li>
                                            </ul>
                                        </div>
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