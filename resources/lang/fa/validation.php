<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => ":attribute باید پذیرفته شده باشد.",
    "active_url"       => "آدرس :attribute معتبر نیست",
    "after"            => ":attribute باید تاریخی بعد از :date باشد.",
    "alpha"            => ":attribute باید شامل حروف الفبا باشد.",
    "alpha_dash"       => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.",
    "alpha_num"        => ":attribute باید شامل حروف الفبا و عدد باشد.",
    "array"            => ":attribute باید شامل آرایه باشد.",
    "before"           => ":attribute باید تاریخی قبل از :date باشد.",
    "between"          => array(
        "numeric" => ":attribute باید بین :min و :max باشد.",
        "file"    => ":attribute باید بین :min و :max کیلوبایت باشد.",
        "string"  => ":attribute باید بین :min و :max کاراکتر باشد.",
        "array"   => ":attribute باید بین :min و :max آیتم باشد.",
    ),
    "boolean"          => "The :attribute field must be true or false",
    "confirmed"        => ":attribute با تاییدیه مطابقت ندارد.",
    "date"             => ":attribute یک تاریخ معتبر نیست.",
    "date_format"      => ":attribute با الگوی :format مطاقبت ندارد.",
    "different"        => ":attribute و :other باید متفاوت باشند.",
    "digits"           => ":attribute باید :digits رقم باشد.",
    "digits_between"   => ":attribute باید بین :min و :max رقم باشد.",
    "distinct"         => "فیلد :attribute تکراری می باشد",
    "email"            => "فرمت :attribute معتبر نیست.",
    "exists"           => ":attribute انتخاب شده، معتبر نیست.",
    "image"            => ":attribute باید تصویر باشد.",
    "in"               => ":attribute انتخاب شده، معتبر نیست.",
    "integer"          => ":attribute باید نوع داده ای عددی (integer) باشد.",
    "ip"               => ":attribute باید IP آدرس معتبر باشد.",
    "max"              => array(
        "numeric" => ":attribute نباید بزرگتر از :max باشد.",
        "file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد.",
        "string"  => ":attribute نباید بیشتر از :max کاراکتر باشد.",
        "array"   => ":attribute نباید بیشتر از :max آیتم باشد.",
    ),
    "mimes"            => ":attribute باید یکی از فرمت های :values باشد.",
    "min"              => array(
        "numeric" => ":attribute نباید کوچکتر از :min باشد.",
        "file"    => ":attribute نباید کوچکتر از :min کیلوبایت باشد.",
        "string"  => ":attribute نباید کمتر از :min کاراکتر باشد.",
        "array"   => ":attribute نباید کمتر از :min آیتم باشد.",
    ),
    "not_in"           => ":attribute انتخاب شده، معتبر نیست.",
    "numeric"          => ":attribute باید شامل عدد باشد.",
    "regex"            => ":attribute یک فرمت معتبر نیست",
    "required"         => "فیلد :attribute الزامی است",
    "required_if"      => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.",
    "required_with"    => ":attribute الزامی است زمانی که :values موجود است.",
    "required_with_all" => ":attribute الزامی است زمانی که :values موجود است.",
    "required_without" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "required_without_all" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "same"             => ":attribute و :other باید مانند هم باشند.",
    "size"             => array(
        "numeric" => ":attribute باید برابر با :size باشد.",
        "file"    => ":attribute باید برابر با :size کیلوبایت باشد.",
        "string"  => ":attribute باید برابر با :size کاراکتر باشد.",
        "array"   => ":attribute باسد شامل :size آیتم باشد.",
    ),
    "timezone"         => "The :attribute must be a valid zone.",
    "unique"           => ":attribute قبلا انتخاب شده است.",
    "url"              => "فرمت آدرس :attribute اشتباه است.",


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => array(),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => array(
        "name" => "نام",
        "username" => "نام کاربری",
        "email" => "پست الکترونیکی",
        "first_name" => "نام",
        "last_name" => "نام خانوادگی",
        "password" => "رمز عبور",
        "password_confirmation" => "تاییدیه ی رمز عبور",
        "current_password" => "رمز عبور فعلی",
        "city" => "شهر",
        "country" => "کشور",
        "address" => "نشانی",
        "phone" => "تلفن",
        "mobile" => "تلفن همراه",
        "age" => "سن",
        "sex" => "جنسیت",
        "gender" => "جنسیت",
        "day" => "روز",
        "month" => "ماه",
        "year" => "سال",
        "hour" => "ساعت",
        "minute" => "دقیقه",
        "second" => "ثانیه",
        "title" => "عنوان",
        "text" => "متن",
        "content" => "محتوا",
        "description" => "توضیحات",
        "excerpt" => "گلچین کردن",
        "date" => "تاریخ",
        "time" => "زمان",
        "available" => "موجود",
        "size" => "اندازه",
        "name_family" => "نام و نام خانوادگی",
        "province" => "استان",
        "district" => "محله",
        "index" => "محل قرار گیری",
        "tag_name" => "نام تک",
        "attribute_ids.*" => "ویژگی",
        "delivery_amount" => "هزینه ارسال",
        "slug" => "عنوان انگلیسی",
        "brand_id" => "برند",
        "tag_ids" => "تگ",
        "primary_image" => "تصویر اصلی",
        "category_id" => "دسته بندی",
        "attribute_ids" => "ویژگی ها",
        "attribute_is_main_ids" => "ویژگی‌های اصلی",
        "variation_id" => "ویژگی‌متغیر",
        "variation_values" => "ویژگی متغییر",
        "variation_values.*" => "ویژگی متغییر",
        "attribute_values.*" => "ویژگی ها",
        "variation_values.*.price" => "قیمت",
        "variation_values.*.quantity" => "تعداد",
        "variation_values.*.sku" => "شناسه انبار",
        "variation_values.value.*" => "ویژگی متغییر",
        "variation_values.value.0" => "1ویژگی متغییر",
        "variation_values.value.1" => "2ویژگی متغییر",
        "variation_values.value.2" => "3ویژگی متغییر",
        "variation_values.quantity.*" => "تعداد",
        "variation_values.sku.*" => "شناسه انبار",
        "variation_values.price.*" => "قیمت",
        "variation_values.quantity.0" => "1تعداد",
        "variation_values.sku.0" => "1شناسه انبار",
        "variation_values.price.0" => "1قیمت",
        "variation_values.quantity.1" => "2تعداد",
        "variation_values.sku.1" => "2شناسه انبار",
        "variation_values.price.1" => "2قیمت",
        "variation_values.quantity.2" => "3تعداد",
        "variation_values.sku.2" => "3شناسه انبار",
        "variation_values.price.2" => "3قیمت",
        "attribute_is_filter_ids" => "ویژگی های قابل فیلتر",
        "attribute_is_filter_ids.*" => "ویژگی های قابل فیلتر",
        "parent_id"=>"والد",
        "code" => "کد تخفیف",
        "cellphone" => "شماره تماس",
        "province_id" => "استان",
        "city_id" => "شهر",
        "postal_code" => "کد پستی",
        "display_name" => "نام نمایشی",
        "otp_code" => "کد تایید",
        "address_id" => "آدرس",
        "cellphone2" => "تلفن ثابت",
        "lastaddress" => "آدرس جایگزین",
        "unit" => 'واحد',
    ),
);
