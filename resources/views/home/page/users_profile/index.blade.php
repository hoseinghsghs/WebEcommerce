@extends('home.layout.MasterHome')
@section('title' , 'پروفایل کاربری')
@section('content')

<!-- profile------------------------------->
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">

                    @include('home.page.users_profile.partial.right_side')

                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <table class="table table-profile">
                                    <tbody>
                                        <tr>
                                            <td class="w-50">
                                                <div class="title">نام و نام خانوادگی:</div>
                                                <div class="value">حسن شجاعی</div>
                                            </td>
                                            <td>
                                                <div class="title">پست الکترونیک :</div>
                                                <div class="value">info@digismart.com</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="title">شماره تلفن همراه:</div>
                                                <div class="value">*******0991</div>
                                            </td>
                                            <td>
                                                <div class="title">تاریخ عضویت:</div>
                                                <div class="value">۱۳۹۹/۰۱/۱۲</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="title"> دریافت خبرنامه :</div>
                                                <div class="value">بله</div>
                                            </td>
                                            <td>
                                                <div class="title"> کد ملی :</div>
                                                <div class="value">-</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="profile">
                                    <ul class="mb-0">
                                        <li class="profile-item">
                                            <div class="title">نام و نام خانوادگی:</div>
                                            <div class="value">حسن شجاعی</div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="title">پست الکترونیک :</div>
                                            <div class="value">info@digismart.com</div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="title">شماره تلفن همراه:</div>
                                            <div class="value">*******0991</div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="title">تاریخ عضویت:</div>
                                            <div class="value">۱۳۹۹/۰۱/۱۲</div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="title"> دریافت خبرنامه :</div>
                                            <div class="value">بله</div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="title"> کد ملی :</div>
                                            <div class="value">-</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="profile-edit-action">
                                    <a href="#" class="link-spoiler-edit btn btn-secondary">ویرایش اطلاعات</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- profile------------------------------->

@endsection