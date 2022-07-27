<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>لیست ویژگی ها </strong>( {{$brands->total()}} )</h2>
                </div>
                <div class="body">
                    @if(count($brands)===0)
                    <p>هیچ رکوردی وجود ندارد</p>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>وضعیت</th>
                                    <th class="text-center">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $key => $brand)
                                <tr wire:key="brand-field-{{ $brand->id }}">
                                    <td scope="row">{{$key+1}}</td>
                                    @if(Storage::exists('brand/'.$brand->image))
                                    <td>
                                        <img src="{{asset('storage/brand/'.$brand->image)}}" alt="{{$brand->name}}"
                                            width="120" class="img-fluid rounded" style="min-height: 3rem;">
                                    </td>
                                    @endif
                                    <td>{{$brand->name}}</td>
                                    <td>
                                        <div class="row clearfix">
                                            <div class="col-6">
                                                @if ($brand->is_active)
                                                <a wire:click="Inactive_brand({{$brand->id}})"
                                                    class="btn btn-raised btn-success waves-effect"><span
                                                        style="color: white;">منتشر
                                                        شده </span>
                                                    <span class="spinner-border spinner-border-sm text-light"
                                                        wire:loading
                                                        wire:target="Inactive_brand({{$brand->id}})"></span>

                                                </a>
                                                @else
                                                <a wire:click="active_brand({{$brand->id}})"
                                                    class="btn btn-raised btn-danger waves-effect"><span
                                                        style="color: white;">عدم
                                                        انتشار</span>
                                                    <span class="spinner-border spinner-border-sm text-light"
                                                        wire:loading wire:target="active_brand({{$brand->id}})"></span>


                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center js-sweetalert">
                                        <a href="{{route('admin.brands.edit',$brand->id)}}"
                                            class="btn btn-raised btn-info waves-effect" onclick="loadbtn(event)">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <button class="btn btn-raised btn-danger waves-effect"
                                            wire:click="delbrand({{$brand->id}})">
                                            <i class="zmdi zmdi-delete"></i>
                                            <span class="spinner-border spinner-border-sm text-light" wire:loading
                                                wire:target="delbrand({{$brand->id}})"></span>
                                        </button>
                                        <!-- <form action="{{route('admin.brands.destroy',$brand->id)}}"
                                            id="del-brand-{{$brand->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
$(document).ready(function() {
    $("#loading").hide();
    $("#loading1").hide();
    $(document).ajaxStart(function() {
        $("#loading").show();
        $("#loading1").show();
    }).ajaxStop(function() {
        $("#loading").hide();
        $("#loading1").hide();
    });
});
</script>
@endpush