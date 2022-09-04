<div class="header-search-box">
    <form autocomplete="off" wire:submit.prevent="search" class="form-search">
        <input type="search" class="header-search-input" wire:model.debounce.500ms="search" value="{{session('search')??''}}" placeholder="نام کالای مورد نظر خود را جستجو کنید…">
        <div class="action-btns">
            <button class="btn btn-search" type="submit" wire:loading.attr="disabled">
                <img src="/assets/home/images/search.png" alt="search" wire:loading.remove>
                <i class="mdi mdi-loading mdi-spin" wire:loading></i>
            </button>
            <div class="search-filter">
                <div class="form-ui">
                    <select class="custom-select border-0 mt-1" wire:model="categoryId">
                        <option value="">همه دسته ها</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
    @if($sProducts && !$errors->has('search'))
    <div class="search-result">
        <ul class="search-result-list mb-0">
            @forelse ($sProducts as $product )
            <li>
                <a class="d-flex align-items-center border-bottom border-light" href="{{route('home.products.show',$product->slug)}}"><i class="mdi mdi-clock-outline"></i>
                    <img src="{{asset('storage/primary_image/'.$product->primary_image)}}" alt="image" width="70" height="70" class="suggestion-image">
                    {{$product->name}}
                    <span class="mr-auto ml-1">{{$product->category->parent->name}} / {{$product->category->name}}</span>
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
