<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <div class="row clearfix mt-2 align-items-center">
                    <div class="col-md-auto"><label>جستجو :</label></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="inner-addon left-addon">
                                <i class="zmdi zmdi-hc-fw input-icon" wire:target="search" wire:loading.remove></i>
                                <i class="zmdi zmdi-hc-fw zmdi-hc-spin input-icon" wire:loading wire:target="search"></i>
                                <input type="text" name="search" class="form-control @error('search') is-invalid @enderror" wire:model.debounce.500ms="search" placeholder=" نام،ایمیل،تلفن">
                            </div>
                            @error('search')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover c_table theme-color">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>شماره تلفن</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key => $user)
                            <tr>
                                <td scope="row">{{$users->firstItem() + $key}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->cellphone}}</td>
                                <td class="text-center js-sweetalert">
                                    <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-raised btn-info waves-effect" onclick="loadbtn(event)">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <p class="text-center text-muted">هیچ رکوردی یافت نشد!</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $users->links() }}
    </div>
</div>
