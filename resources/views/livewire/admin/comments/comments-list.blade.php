<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <form wire:submit.prevent="$refresh">
                    <div class="header">
                        <h2>
                            جست و جو
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" wire:model="name"
                                            placeholder="نام کاربر">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" wire:model="product_name"
                                            placeholder="نام محصول">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="body">
                    <div class="loader" wire:loading.flex>
                        درحال بارگذاری ...
                    </div>
                    @if(count($comments)===0)
                    <p>هیچ رکوردی وجود ندارد</p>
                    @else
                    <p>برای تایید نظر روی وضعیت آن کلیک کنید</p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نوشته توسط</th>
                                    <th>تاریخ</th>
                                    <th>عنوان/ نام محصول</th>
                                    <th>تعداد پاسخ ها</th>
                                    <th>وضعیت</th>
                                    <th>
                                        <center>
                                            عملیات
                                        </center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                <tr wire:key="name_{{ $comment->id }}">
                                    <td scope=" row">{{$comment->id}}</td>
                                    <td>{{$comment->user->name == null ? $comment->user->cellphone : $comment->user->name }}
                                    </td>
                                    <td>{{Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('Y/n/j')}}
                                    </td>
                                    <td>
                                        <a
                                            href="{{route('admin.products.show',['product' => $comment->commentable_id])}}">
                                            {{$comment->commentable->name ? $comment->commentable->name : $comment->commentable->title }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge badge-success p-2">{{$comment->appro(1)->count()}}</span>
                                        @if ($comment->appro(0)->count() > 0)
                                        <span class="badge badge-danger p-2">{{$comment->appro(0)->count()}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($comment->approved==0)
                                        @php
                                        $color="danger";
                                        $title="عدم انتشار";
                                        @endphp
                                        @else
                                        @php
                                        $color="success";
                                        $title="انتشار";
                                        @endphp
                                        @endif
                                        <div class="row clearfix">
                                            <div class="col-12">
                                                <a wire:click="ChengeActive_comment({{$comment->id}})"
                                                    wire:loading.attr="disabled"
                                                    class="btn btn-raised btn-{{$color}} waves-effect"><span
                                                        style="color:white;">{{$title}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center js-sweetalert">
                                        <center>
                                            <a href="{{route('admin.comments.edit',$comment->id)}}"
                                                wire:loading.attr="disabled"
                                                class="btn btn-raised btn-info waves-effect">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <button class="btn btn-raised btn-danger waves-effect"
                                                wire:loading.attr="disabled" wire:click="delcomment({{$comment->id}})">
                                                <i class="zmdi zmdi-delete"></i>
                                                <span class="spinner-border spinner-border-sm text-light" wire:loading
                                                    wire:target="delcomment({{$comment->id}})"></span>
                                            </button>
                                        </center>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $comments->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
