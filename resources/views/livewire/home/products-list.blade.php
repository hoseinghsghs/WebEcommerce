@section('title','لیست محصولات')
<div class="container-main">
    <div class="d-block">
        <div class="page-content page-row">
            <div class="main-row">
                <div id="breadcrumb">
                    <i class="mdi mdi-home"></i>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
                            <li class="breadcrumb-item">فروشگاه</li>
                            <li class="breadcrumb-item active" aria-current="page">{{$category ? $category->name : 'جستجوی: "'.$filterd['search'].'"'}}</li>
                        </ol>
                    </nav>
                </div>

                <!-- start sidebar--------------------->
                <div class="col-lg-3 col-md-3 col-xs-12 pr sticky-sidebar" wire:ignore>
                    <div class="shop-archive-sidebar">
                        <div class="sidebar-archive mb-3">
                            <section class="widget-product-categories">
                                <header class="cat-header">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-right" data-toggle="collapse" href="#headingOne" role="button" aria-expanded="false" aria-controls="headingOne">
                                            @if($routeName == 'home.products.index')
                                            {{$category->parent->name}}
                                            @elseif ($routeName == 'home.products.search' && isset($category))
                                            {{$category->name}}
                                            @else
                                            دسته بندی ها
                                            @endif
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                    </h2>
                                </header>
                                <div class="product-filter">
                                    <div class="card">
                                        <div class="collapse show" id="headingOne">
                                            <div class="card-main mb-0">
                                                @if($routeName == 'home.products.index')
                                                @foreach ($category->parent->children as $child)
                                                <a href="{{route('home.products.index',$child->slug)}}">
                                                    <div class="form-auth-row">
                                                        @if($child->name == $category->name)
                                                        <label for="#" class="ui-checkbox">
                                                            <input checked type="checkbox" disabled id="remember">
                                                            <span class="ui-checkbox-check"></span>
                                                        </label>
                                                        <label for="remember" class="remember-me">{{$child->name}}</label>
                                                        @else
                                                        <label class="remember-me" style="cursor: pointer;">{{$child->name}}</label>
                                                        @endif
                                                    </div>
                                                </a>
                                                @endforeach
                                                @elseif ($routeName == 'home.products.search' && isset($category))
                                                @foreach ($category->children as $child)
                                                <a href="{{route('home.products.index',$child->slug)}}">
                                                    <label class="remember-me" style="cursor: pointer;">{{$child->name}}</label>
                                                </a>
                                                @endforeach
                                                @else
                                                @foreach ($categories as $category)
                                                <a href="{{route('home.products.search',['slug'=>$category->slug])}}">
                                                    <label class="remember-me" style="cursor: pointer;">{{$category->name}}</label>
                                                </a>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="widget-product-categories">
                                <header class="cat-header">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-right" data-toggle="collapse" href="#headingThree" role="button" aria-expanded="{{$collapsible['price']?'false':'true'}}" aria-controls="headingThree">
                                            محدوده قیمت
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                    </h2>
                                </header>
                                <div class="product-filter">
                                    <div class="card">
                                        <div class="collapse show" id="headingThree">
                                            <div class="card-main mb-0">
                                                <div class="box-data">
                                                    <div class="mt-5 mb-4">
                                                        <div id="slider-non-linear-step"></div>
                                                    </div>
                                                    <div class="filter-range mt-2 mb-2 pr">
                                                        <span>قیمت: </span>
                                                        <span class="example-val" id="slider-non-linear-step-value"></span> تومان
                                                    </div>
                                                    <div class="mt-2 pl">
                                                        <button class="btn btn-range" wire:click="showres()">
                                                            اعمال
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            @isset($attributes)
                            <!-- filter between attributes -->
                            @foreach ($attributes as $attribute)
                            <section class="widget-product-categories" wire:key="attr-{{$attribute->id}}">
                                <header class="cat-header">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-right" data-toggle="collapse" href="#attribute-{{$attribute->id}}" role="button" aria-expanded="false" aria-controls="attribute-{{$attribute->id}}">
                                            {{$attribute->name}}
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                    </h2>
                                </header>
                                <div class="product-filter">
                                    <div class="card">
                                        <div class="collapse show" id="attribute-{{$attribute->id}}">
                                            <div class="card-main mb-0">
                                                @foreach ($attribute->categoryValues as $value)
                                                <div class="form-auth-row" wire:key="attr-{{$attribute->id}}-{{$loop->index}}">
                                                    <label for="#" class="ui-checkbox">
                                                        <input id="attr-{{$attribute->id}}-{{$loop->index}}" @checked(array_key_exists($attribute->id,$filterd['attribute']) && in_array($value->value,$filterd['attribute'][$attribute->id])) wire:click="addFilter('attribute','{{$attribute->id}}','{{$value->value}}')" type="checkbox" value="1">
                                                        <span class="ui-checkbox-check"></span>
                                                    </label>
                                                    <label for="attr-{{$attribute->id}}-{{$loop->index}}" class="remember-me">{{$value->value}}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            @endforeach
                            @endisset

                            @if(isset($variation) && count($variation->variationValues) > 0)
                            <!-- filter between variation -->
                            <section class="widget-product-categories">
                                <header class="cat-header">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-right" data-toggle="collapse" href="#variation-{{$variation->id}}" role="button" aria-expanded="false" aria-controls="variation-{{$variation->id}}">
                                            {{$variation->name}}
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                    </h2>
                                </header>
                                <div class="product-filter">
                                    <div class="card">
                                        <div class="collapse show" id="variation-{{$variation->id}}">
                                            <div class="card-main mb-0">
                                                @foreach ($variation->variationValues as $value)
                                                <div class="form-auth-row" wire:key="var-{{$loop->index}}">
                                                    <label for="#" class="ui-checkbox">
                                                        <input id="var-{{$loop->index}}" @checked(array_key_exists($variation->id,$filterd['variation']) && in_array($value->value,$filterd['variation'][$variation->id])) wire:click="addFilter('attribute','{{$attribute->id}}','{{$value->value}}')" type="checkbox" value="1">
                                                        <span class="ui-checkbox-check"></span>
                                                    </label>
                                                    <label for="var-{{$loop->index}}" class="remember-me">{{$value->value}}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-xs-12 pl">
                    <div class="shop-archive-content mt-3 d-block">
                        <div class="archive-header d-flex flex-wrap align-items-center" wire:ignore>
                            <h2 class="archive-header-title">لیست محصولات</h2>
                            <div class="d-flex align-items-center mr-sm-auto">
                                <div class="sort-tabs mt-0 d-inline-block">
                                    <i class="fas fa-sort-amount-down"></i>
                                </div>
                                <div class="nav-sort-tabs-res ml-3 mr-1">
                                    <select class="custom-select custom-select-sm" wire:model="filterd.orderBy">
                                        <option value="default">پیش فرض</option>
                                        <option value="date-old">قدیمی ترین</option>
                                        <option value="date-new">جدیدترین</option>
                                        <option value="price-low">قیمت: کم به زیاد</option>
                                        <option value="price-high">قیمت: زیاد به کم</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="sort-tabs mt-0 d-inline-block">
                                    <i class="fas fa-th"></i>
                                </div>
                                <div class="nav-sort-tabs-res mr-1">
                                    <select class="custom-select custom-select-sm" wire:model="filterd.displayCount">
                                        <option value=12>نمایش 12</option>
                                        <option value=16>نمایش 16</option>
                                        <option value=24>نمایش 24</option>
                                        <option value=36>نمایش 36</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="product-items">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Most-visited" role="tabpanel" aria-labelledby="Most-visited-tab">
                                    <div class="row">
                                        @each('home.components.ProductCart3',$products,'product','home.partial.empty-products-list')
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="pagination-product">
                            {{$products->onEachSide(1)->links()}}
                        </div>
                        <div class="loader" wire:loading.flex wire:target="addFilter,resetFilters">
                            درحال بارگذاری ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    var nonLinearStepSlider = document.getElementById("slider-non-linear-step");

    if ($("#slider-non-linear-step").length) {
        noUiSlider.create(nonLinearStepSlider, {
            start: [1, 5000000],
            connect: true,
            direction: "rtl",
            format: wNumb({
                decimals: 0,
                thousand: ",",
            }),
            range: {
                min: [1],
                "10%": [500, 500],
                "50%": [40000, 1000],
                max: [10000000],
            },
        });
        var nonLinearStepSliderValueElement = document.getElementById(
            "slider-non-linear-step-value"
        );

        nonLinearStepSlider.noUiSlider.on("update", function(values) {
            Livewire.emit('priceRangeUpdated', values)
            nonLinearStepSliderValueElement.innerHTML = values.join(" - ");
        });
    }
</script>
@endpush
