@extends('home.layout.MasterHome')
@section('title' , 'پروفایل کاربری - علاقه مندی ها')
@section('content')
<main class="main wishlist-page">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">علاقه مندیها</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li>علاقه مندیها</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <h3 class="wishlist-title">علاقه مندیهای من</h3>
            <table class="shop-table wishlist-table">

                @if ($wishlist->isEmpty())
                <tr>
                    <td class="product-thumbnail">
                        <center>
                            <h4>لیست علاقه مندیهای شما خالی است</h4>
                        </center>
                    </td>
                </tr>
                @else
                <thead>
                    <tr>
                        <th class="product-name"><span>محصول</span></th>
                        <th></th>
                        <th class="product-price"><span>قیمت</span></th>
                        <th></th>
                        <th class="wishlist-action">اقدامات </th>
                    </tr>
                </thead>
                <tbody>
                    @each('home.partial.product-item-wishlist', $wishlist , 'wishlist' )
                    @endif
                </tbody>
            </table>
            <div class="social-links">
                <label>اشتراک در: </label>
                <div class="social-icons social-no-color border-thin">
                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                    <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                    <a href="#" class="social-icon social-email far fa-envelope"></a>
                    <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection

@push('scripts')
<script>
function send(product) {
    let url =
        window.location.origin +
        "/profile/add-to-wishlist" +
        "/" + [product];
    console.log(url);

    $.get(url,
        function(response, status) {
            if (response.errors == 'deleted') {
                $("#" + product + "-wish").hide();
                $.notify("ملک از لیست علاقه مندی ها حذف شد", "info", {
                    position: "tap",
                });
            }
        }).fail(function() {
        console.log(status)
    })
}
</script>