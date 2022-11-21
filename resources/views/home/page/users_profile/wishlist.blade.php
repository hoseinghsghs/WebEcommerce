@extends('home.layout.MasterHome')
@section('title' , 'پروفایل کاربری - علاقه مندی ها')
@section('content')
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    @include('home.page.users_profile.partial.right_side')
                    <div class="col-lg-9 col-12 pl" id="loading">
                        <div class="profile-content">
                            <h5 class="text-secondary">لیست علاقه‌مندی</h5>
                            <div class="profile-stats">
                                <div class="table-favorites">
                                    @if ($wishlist->isEmpty())
                                    <div class="cart-empty text-center d-block p-5">
                                        <p class="cart-empty-title">لیست علاقه مندی ها خالی است</p>
                                        <div class="return-to-shop">
                                            <a href="{{route('home')}}" class="backward btn btn-warning">بازگشت به
                                                خانه</a>
                                        </div>
                                    </div>
                                    @else
                                    <table class="table ns-table table-profile-favorites">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="50"> </th>
                                                <th scope="col">نام محصول</th>
                                                <th scope="col">قیمت</th>
                                                <th class="actions-th"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($wishlist as $item )
                                            <tr id="{{$item->product->id}}-wish">
                                                <th scope="row">
                                                    <div class="favorites-product-img mb-4">
                                                        <a
                                                            href="{{route('home.products.show' , ['product' => $item->product->slug])}}">
                                                            <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$item->product->primary_image)}}"
                                                                alt="{{$item->product->slug}}" height="50px"
                                                                width="50px">
                                                        </a>
                                                    </div>
                                                </th>
                                                <td>
                                                    <a
                                                        href="{{route('home.products.show' , ['product' => $item->product->slug])}}">{{$item->product->name}}</a>
                                                </td>
                                                <td>
                                                    <span class="amount">
                                                        @if ($item->product->quantity_check)
                                                        @if ($item->product->sale_check)
                                                        <ins class="new-price">{{number_format($item->product->sale_check->sale_price)}}
                                                            تومان</ins>
                                                        <del class="old-price">{{number_format($item->product->sale_check->price)}}
                                                            تومان</del>
                                                        @else
                                                        <ins class="new-price">{{ number_format($item->product->price_check->price) }}
                                                            تومان</ins>
                                                        @endif
                                                        @else
                                                        <ins class="new-price">نا موجود</ins>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="text-left actions">
                                                    <button onclick="return send('{{$item->product->id}}')"
                                                        class="remove-product btn"><i
                                                            class="mdi mdi-close"></i></button>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                    @foreach ($wishlist as $item )
                                    <div class="profile-recent-fav" id="{{$item->product->id}}-wish1">
                                        <div class="profile-recent-fav-remove">
                                            <button onclick="return send('{{$item->product->id}}')"
                                                class="remove-product btn"><i class="mdi mdi-close"></i></button>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-xs-12 pl" id="loading-{{$item->product->id}}">
                                        </div>
                                        <a href="{{route('home.products.show' , ['product' => $item->product->slug])}}"
                                            class="img-profile-favorites">
                                            <img
                                                src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$item->product->primary_image)}}">
                                        </a>
                                        <div class="profile-recent-fav-col">
                                            <a
                                                href="{{route('home.products.show' , ['product' => $item->product->slug])}}">{{$item->product->name}}</a>
                                        </div>
                                        <div class="profile-recent-fav-price">
                                            <span class="amount">
                                                <center>
                                                    @if ($item->product->quantity_check)
                                                    @if ($item->product->sale_check)
                                                    {{number_format($item->product->sale_check->sale_price)}}
                                                    تومان
                                                    </br>
                                                    <del class="old-price">{{number_format($item->product->sale_check->price)}}
                                                        تومان</del>
                                                    @else
                                                    {{ number_format($item->product->price_check->price) }}
                                                    تومان
                                                    @endif
                                                    @else
                                                    <ins class="new-price">نا موجود</ins>
                                                    @endif
                                                </center>
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@push('scripts')
<script>
function send(product) {
    let url =
        window.location.origin +
        "/profile/add-to-wishlist" +
        "/" + [product];
    $("#loading1").html('<i class="fa fa-circle-o-notch fa-spin" id="loading1"></i>');
    $("#loading-" + product).html('<i class="fa fa-circle-o-notch fa-spin" id="loading1"></i>');
    $.get(url,
        function(response, status) {
            if (response.errors == 'deleted') {
                $("#" + product + "-wish").hide();
                $("#" + product + "-wish1").hide();
            }
        }).always(function() {
        $("#loading1").html('');
        $("#loading2").html('');
        $("#loading").show();
    }).fail(function() {
        alert('اینترنت شما قطع است')
    })
}
</script>
@endpush
