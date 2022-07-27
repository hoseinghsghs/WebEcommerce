<form autocomplete="off" wire:submit.prevent="search" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper dropdown">
    <div class="select-box">
        <select id="category" name="category" wire:model="categoryId">
            <option value="">تمام دسته بندیها</option>
            @forelse($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @empty
            @endforelse
        </select>
    </div>

    <input type="text" class="form-control" placeholder="جستجو ..." wire:model.debounce.500ms="search" value="{{session('search')??''}}" />
    <button class="btn btn-search" type="submit" wire:loading.attr="disabled">
        <i class="w-icon-search" wire:loading.remove></i>
        <div wire:loading>
            <i class="w-icon-store-seo fa-spin"></i>
        </div>
    </button>
    @if($sProducts && !$errors->has('search'))
    <div class="search-suggestion" id="search-suggestion">
        <div class="suggestion-items">
            @forelse ($sProducts as $product )
            <a href="{{route('home.products.show',$product->slug)}}">
                <img src="{{asset('storage/primary_image/'.$product->primary_image)}}" alt="image" width="70" height="70" class="suggestion-image">
                {{$product->name}}
                <span class="text-light">{{$product->category->parent->name}} <i class=" w-icon-angle-left"></i> {{$product->category->name}}</span> </a>
            @empty
            <div class="mx-auto mt-3 mb-3">
                <h5 class="page-subtitle text-center"><i class="w-icon-exclamation-triangle"></i> موردی یافت نشد!</h5>
            </div>
            @endforelse
        </div>
    </div>
    @endif

</form>
@push('scripts')
<script>
    $(document).ready(function() {
        $(".header-search input").focus(function() {
            $('#search-suggestion').show();
        });

        $('.header-search input').blur(function() {
            $('#search-suggestion').hide(1000);
        });
    });
</script>
@endpush
