<div class="header-search-box">
    <form autocomplete="off" wire:submit.prevent="search" class="form-search">
        <div class="form1">
            <i class="fa fa-search" wire:click="search" wire:loading.remove wire:target="categoryId,search"></i>
            <i class="fa fa-spinner fa-spin" wire:loading></i>
            <input type="text" class="form-control form-input" value="{{session('search')??''}}"
                wire:model.debounce.500ms="search" placeholder="محصول خود را جستجو کنید...">
            <span class="left-pan1">
                <select class="custom-select border-0" id="search-input" wire:model="categoryId">
                    <option value="">همه دسته ها</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </span>
        </div>
    </form>
    @if($sProducts && !$errors->has('search'))
    <div class="search-result">
        <ul class="search-result-list mb-0">
            @forelse ($sProducts as $product )
            <li>
                <a class="d-flex align-items-center border-bottom border-light"
                    href="{{route('home.products.show',$product->slug)}}"><i class="mdi mdi-clock-outline d-none d-md-inline-block"></i>
                    <img src="{{asset('storage/primary_image/'.$product->primary_image)}}" alt="image" width="60"
                        height="60" class="suggestion-image border rounded">
                    <div class="mr-2">
                        <div>{{$product->name}}</div>
                        <small class="text-muted">
                            @foreach(product_categories($product) as $category)
                            {{$category->name}}
                                @if(!$loop->last)
                                    <i class="fa fa-angle-left mx-1"></i>
                                @endif
                            @endforeach
                        </small>
                    </div>
                    <button class="btn btn-light btn-continue-search mr-auto" type="submit">
                        <i class="fa fa-angle-left"></i>
                    </button>
                </a>
            </li>
            @empty
            <div class="mx-auto mt-3 mb-3">
                <p class="text-muted text-center">موردی یافت نشد!</p>
            </div>
            @endforelse
        </ul>
    </div>
    @endif
</div>
