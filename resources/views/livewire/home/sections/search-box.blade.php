<div class="header-search-box">
    <form autocomplete="off" wire:submit.prevent="search" class="form-search">
        <div class="form1">
            <i class="fa fa-search" wire:click="search" wire:loading.remove></i>
            <i class="mdi mdi-loading mdi-spin" wire:loading></i>
            <input type="text" class="form-control form-input" value="{{session('search')??''}}" wire:model.debounce.500ms="search" placeholder="محصول خود را جستجو کنید...">
            <span class="left-pan1">
                <select class="custom-select border-0" wire:model="categoryId">
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
                <a class="d-flex align-items-center border-bottom border-light" href="{{route('home.products.show',$product->slug)}}"><i class="mdi mdi-clock-outline"></i>
                    <img src="{{asset('storage/primary_image/'.$product->primary_image)}}" alt="image" width="60" height="60" class="suggestion-image border rounded">
                    <span class="mr-2">{{$product->name}}</span>
                    <span class="mr-auto ml-1">{{$product->category->parent->name}} /
                        {{$product->category->name}}</span>
                    <button class="btn btn-light btn-continue-search" type="submit">
                        <i class="fa fa-angle-left"></i>
                    </button>
                </a>
            </li>
            @empty
            <li class="mx-auto mt-3 mb-3">
                <p class="text-muted text-center">موردی یافت نشد!</p>
            </li>
            @endforelse
        </ul>
        <div class="localSearchSimple"></div>
    </div>
    @endif
</div>
