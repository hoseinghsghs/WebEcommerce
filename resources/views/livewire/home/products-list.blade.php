@section('title','لیست محصولات')
<main class="main">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li><a href="#">فروشگاه</a></li>
                <li>{{$category ? $category->name : 'جستجوی: "'.$filterd['search'].'"'}}</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <!-- Start of Shop Banner -->
            <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs" style="background-image: url(/assets/images/shop/banner1.jpg); background-color: #FFC74E;">
                <div class="banner-content">
                    <h4 class="banner-subtitle font-weight-bold">مجموعه لوازم جانبی</h4>
                    <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">مچ دست هوشمند</h3>
                    <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">اکنون کشف کنید<i class="w-icon-long-arrow-left"></i></a>
                </div>
            </div>
            <!-- End of Shop Banner -->

            <div class="shop-default-brands mb-5">
                <div class="row brands-carousel owl-carousel owl-theme cols-xl-7 cols-lg-6 cols-md-4 cols-sm-3 cols-2" data-owl-options="{
                                'rtl': true,
                                'items': 7,
                                'nav': false,
                                'dots': true,
                                'margin': 20,
                                'loop': true,
                                'autoPlay': 'true',
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 3
                                    },
                                    '768': {
                                        'items': 4
                                    },
                                    '992': {
                                        'items': 6
                                    },
                                    '1200': {
                                        'items': 7
                                    }
                                }
                            }
                        ">
                    <figure>
                        <img src="/assets/images/brands/category/1.png" alt="Brand" width="160" height="90" />
                    </figure>
                    <figure>
                        <img src="/assets/images/brands/category/2.png" alt="Brand" width="160" height="90" />
                    </figure>
                    <figure>
                        <img src="/assets/images/brands/category/3.png" alt="Brand" width="160" height="90" />
                    </figure>
                    <figure>
                        <img src="/assets/images/brands/category/4.png" alt="Brand" width="160" height="90" />
                    </figure>
                    <figure>
                        <img src="/assets/images/brands/category/5.png" alt="Brand" width="160" height="90" />
                    </figure>
                    <figure>
                        <img src="/assets/images/brands/category/6.png" alt="Brand" width="160" height="90" />
                    </figure>
                    <figure>
                        <img src="/assets/images/brands/category/7.png" alt="Brand" width="160" height="90" />
                    </figure>
                </div>
            </div>
            <!-- End of Shop Brands-->

            <!-- Start of Shop Category -->
            <div class="shop-default-category category-ellipse-section mb-6">
                <div class="owl-carousel owl-theme row gutter-lg cols-xl-8 cols-lg-7 cols-md-6 cols-sm-4 cols-xs-3 cols-2" data-owl-options="{
                            'rtl': true,
                            'nav': false,
                            'dots': true,
                            'margin': 20,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '480': {
                                    'items': 3
                                },
                                '576': {
                                    'items': 4
                                },
                                '768': {
                                    'items': 6
                                },
                                '992': {
                                    'items': 7
                                },
                                '1200': {
                                    'items': 8,
                                    'margin': 30
                                }
                            }
                        }">
                    <div class="category-wrap">
                        <div class="category category-ellipse">
                            <figure class="category-media">
                                <a href="shop-banner-sidebar.html">
                                    <img src="/assets/images/categories/category-4.jpg" alt="Categroy" width="190" height="190" style="background-color: #5C92C0;" />
                                </a>
                            </figure>
                            <div class="category-content">
                                <h4 class="category-name">
                                    <a href="shop-banner-sidebar.html">ورزشی </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="category-wrap">
                        <div class="category category-ellipse">
                            <figure class="category-media">
                                <a href="shop-banner-sidebar.html">
                                    <img src="/assets/images/categories/category-5.jpg" alt="Categroy" width="190" height="190" style="background-color: #B8BDC1;" />
                                </a>
                            </figure>
                            <div class="category-content">
                                <h4 class="category-name">
                                    <a href="shop-banner-sidebar.html">کودکانه </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="category-wrap">
                        <div class="category category-ellipse">
                            <figure class="category-media">
                                <a href="shop-banner-sidebar.html">
                                    <img src="/assets/images/categories/category-6.jpg" alt="Categroy" width="190" height="190" style="background-color: #99C4CA;" />
                                </a>
                            </figure>
                            <div class="category-content">
                                <h4 class="category-name">
                                    <a href="shop-banner-sidebar.html">کفش ورزشی </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="category-wrap">
                        <div class="category category-ellipse">
                            <figure class="category-media">
                                <a href="shop-banner-sidebar.html">
                                    <img src="/assets/images/categories/category-7.jpg" alt="Categroy" width="190" height="190" style="background-color: #4E5B63;" />
                                </a>
                            </figure>
                            <div class="category-content">
                                <h4 class="category-name">
                                    <a href="shop-banner-sidebar.html">دوربین ها </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="category-wrap">
                        <div class="category category-ellipse">
                            <figure class="category-media">
                                <a href="shop-banner-sidebar.html">
                                    <img src="/assets/images/categories/category-8.jpg" alt="Categroy" width="190" height="190" style="background-color: #D3E5EF;" />
                                </a>
                            </figure>
                            <div class="category-content">
                                <h4 class="category-name">
                                    <a href="shop-banner-sidebar.html">بازی </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="category-wrap">
                        <div class="category category-ellipse">
                            <figure class="category-media">
                                <a href="shop-banner-sidebar.html">
                                    <img src="/assets/images/categories/category-9.jpg" alt="Categroy" width="190" height="190" style="background-color: #65737C;" />
                                </a>
                            </figure>
                            <div class="category-content">
                                <h4 class="category-name">
                                    <a href="shop-banner-sidebar.html">آشپزخانه </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="category-wrap">
                        <div class="category category-ellipse">
                            <figure class="category-media">
                                <a href="shop-banner-sidebar.html">
                                    <img src="/assets/images/categories/category-20.jpg" alt="Categroy" width="190" height="190" style="background-color: #E4E4E4;" />
                                </a>
                            </figure>
                            <div class="category-content">
                                <h4 class="category-name">
                                    <a href="shop-banner-sidebar.html">ساعت مچی </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="category-wrap">
                        <div class="category category-ellipse">
                            <figure class="category-media">
                                <a href="shop-banner-sidebar.html">
                                    <img src="/assets/images/categories/category-21.jpg" alt="Categroy" width="190" height="190" style="background-color: #D3D8DE;" />
                                </a>
                            </figure>
                            <div class="category-content">
                                <h4 class="category-name">
                                    <a href="shop-banner-sidebar.html">لباس </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Shop Category -->

            <!-- Start of Shop Content -->
            <div class="shop-content row gutter-lg mb-10">
                <!-- Start of Sidebar, Shop Sidebar -->
                <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                    <!-- Start of Sidebar Overlay -->
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                    <!-- Start of Sidebar Content -->
                    <div class="sidebar-content scrollable">
                        <!-- Start of Sticky Sidebar -->
                        <div class="sticky-sidebar">
                            <div class="filter-actions">
                                <label>فیلتر : </label>
                                <a href="#" wire:click="resetFilters" class="btn btn-dark btn-link filter-clean">حذف همه </a>
                            </div>
                            <!-- Start of Collapsible widget -->
                            @if($routeName == 'home.products.index')
                            <div class="widget widget-collapsible">
                                <h3 @class(['widget-title', 'collapsed'=>!$collapsible['categories']]) wire:click="collapse('categories')"><span>{{$category->parent->name}}</span><span class="toggle-btn"></span></h3>
                                <ul class="widget-body filter-items search-ul">
                                    @foreach ($category->parent->children as $child)
                                    <li @class(['bg-grey'=>$child->name == $category->name]) ><a class="pl-2" href="{{route('home.products.index',$child->slug)}}">{{$child->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @elseif ($routeName == 'home.products.search' && isset($category))
                            <div class="widget widget-collapsible">
                                <h3 @class(['widget-title', 'collapsed'=>!$collapsible['categories']]) wire:click="collapse('categories')"><span>{{$category->name}}</span><span class="toggle-btn"></span></h3>
                                <ul class="widget-body filter-items search-ul">
                                    @foreach ($category->children as $child)
                                    <li><a class="pl-2" href="{{route('home.products.index',['slug'=>$child->slug])}}">{{$child->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @else
                            <div class="widget widget-collapsible">
                                <h3 @class(['widget-title', 'collapsed'=>!$collapsible['categories']]) wire:click="collapse('categories')"><span>دسته بندی ها</span><span class="toggle-btn"></span></h3>
                                <ul class="widget-body filter-items search-ul">
                                    @foreach ($categories as $category)
                                    <li><a class="pl-2" href="{{route('home.products.search',['slug'=>$category->slug])}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 @class(['widget-title', 'collapsed'=>!$collapsible['price']]) wire:click="collapse('price')"><span>قیمت </span><span class="toggle-btn"></h3>
                                <div class="widget-body">
                                    <div class="price-range mt-2">
                                        <div class="form-group">
                                            <label class="mb-1">حداقل (تومان)</label>
                                            <input id="min-price" type="text" class="form-control form-control-sm" wire:model.debounce.500ms="filterd.price.low">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1">حداکثر (تومان)</label>
                                            <input id="max-price" type="text" class="form-control form-control-sm" wire:model.debounce.500ms="filterd.price.high">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Collapsible Widget -->

                            @isset($attributes)
                            @foreach ($attributes as $attribute)
                            <div class="widget widget-collapsible">
                                <h3 @class(['widget-title', 'collapsed'=>!in_array($attribute->id,$collapsible['attribute'])]) wire:click="collapse('attribute','{{$attribute->id}}')"><span>{{$attribute->name}}</span><span class="toggle-btn"></span></h3>
                                <ul class="widget-body filter-items item-check mt-1">
                                    @foreach ($attribute->categoryValues as $value)
                                    <li wire:key="attr-{{$attribute->id}}" @class(['active'=>array_key_exists($attribute->id,$filterd['attribute']) && in_array($value->value,$filterd['attribute'][$attribute->id]) ])>
                                        <a href="javascript:void(0)" wire:click="addFilter('attribute','{{$attribute->id}}','{{$value->value}}')">{{$value->value}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                            @endisset
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Variation Widget -->
                            @if (isset($variation) && count($variation->variationValues) > 0)
                            <div class="widget widget-collapsible">
                                <h3 @class(['widget-title', 'collapsed'=>!in_array($variation->id,$collapsible['variation'])]) wire:click="collapse('variation','{{$variation->id}}')"><span>{{$variation->name}}</span><span class="toggle-btn"></span></h3>
                                <ul class="widget-body filter-items item-check mt-1">
                                    @foreach ($variation->variationValues as $value)
                                    <li @class(['active'=>array_key_exists($variation->id,$filterd['variation']) && in_array($value->value,$filterd['variation'][$variation->id]) ])>
                                        <a href="javascript:void(0)" wire:click="addFilter('variation','{{$variation->id}}','{{$value->value}}')">{{$value->value}} </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <!-- End of Collapsible Widget -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </div>
                    <!-- End of Sidebar Content -->
                </aside>
                <!-- End of Shop Sidebar -->

                <!-- Start of Shop Main Content -->
                <div class="main-content">
                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left d-block d-lg-none"><i class="w-icon-category"></i><span>فیلتر </span></a>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>مرتب سازی بر اساس: </label>
                                <select name="orderby" class="form-control" wire:model="filterd.orderBy">
                                    <option value="default">پیش فرض</option>
                                    <option value="date-old">قدیمی ترین</option>
                                    <option value="date-new">جدیدترین</option>
                                    <option value="price-low">قیمت: کم به زیاد</option>
                                    <option value="price-high">قیمت: زیاد به کم</option>
                                </select>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show select-box">
                                <select name="count" class="form-control" wire:model="filterd.displayCount">
                                    <option value=2>نمایش 12</option>
                                    <option value=4>نمایش 16</option>
                                    <option value=24>نمایش 24</option>
                                    <option value=36>نمایش 36</option>
                                </select>
                            </div>
                            <div class="toolbox-item toolbox-layout">
                                <a href="shop-banner-sidebar.html" class="icon-mode-grid btn-layout active">
                                    <i class="w-icon-grid"></i>
                                </a>
                                <a href="shop-list.html" class="icon-mode-list btn-layout">
                                    <i class="w-icon-list"></i>
                                </a>
                            </div>
                        </div>
                    </nav>
                    <div class="product-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-2">
                        @each('home.partial.product-item',$products,'Product','home.partial.product-item-empty')
                    </div>
                    {{$products->onEachSide(1)->links('home.partial.pagination')}}

                    <div class="loader" wire:loading.flex wire:target="addFilter,resetFilters">
                        درحال بارگذاری ...
                    </div>
                </div>
                <!-- End of Shop Main Content -->
            </div>
            <!-- End of Shop Content -->
        </div>
    </div>
    <!-- End of Page Content -->
</main>
@push('scripts')
<script>
    function updateTextView(_obj) {
        var num = getNumber(_obj.val());
        if (num == 0) {
            _obj.val('');
        } else {
            _obj.val(num.toLocaleString());
        }
    }

    function getNumber(_str) {
        var arr = _str.split('');
        var out = new Array();
        for (var cnt = 0; cnt < arr.length; cnt++) {
            if (isNaN(arr[cnt]) == false) {
                out.push(arr[cnt]);
            }
        }
        return Number(out.join(''));
    }
    $(document).ready(function() {
        $('#min-price').on('keyup', function() {
            updateTextView($(this));
        });
        $('#max-price').on('keyup', function() {
            updateTextView($(this));
        });
    });
</script>
@endpush
