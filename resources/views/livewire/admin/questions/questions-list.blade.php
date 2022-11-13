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
                    @if(count($questions)===0)
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
                                    <th>نام محصول</th>
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
                                @foreach ($questions as $question)


                                <tr wire:key="name_{{ $question->id }}">
                                    <td scope=" row">{{$question->id}}</td>
                                    <td>{{$question->user->name == null ? "بدون نام" : $question->user->cellphone }}
                                    </td>
                                    <td>{{Hekmatinasser\Verta\Verta::instance($question->created_at)->format('Y/n/j')}}
                                    </td>
                                    <td>
                                        <a
                                            href="{{route('admin.products.show',['product' => $question->product->id])}}">
                                            {{$question->product->name}}
                                        </a>

                                    </td>
                                    <td>
                                        <span class="badge badge-success p-2">{{$question->appro(1)->count()}}</span>
                                        @if ($question->appro(0)->count() > 0)
                                        <span class="badge badge-danger p-2">{{$question->appro(0)->count()}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($question->approved==0)
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
                                                <a wire:click="ChengeActive_question({{$question->id}})"
                                                    wire:loading.attr="disabled"
                                                    class="btn btn-raised btn-{{$color}} waves-effect"><span
                                                        style="color:white;">{{$title}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center js-sweetalert">
                                        <center>
                                            <a href="{{route('admin.questions.edit',$question->id)}}"
                                                wire:loading.attr="disabled"
                                                class="btn btn-raised btn-info waves-effect">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>

                                            <button class="btn btn-raised btn-danger waves-effect"
                                                wire:loading.attr="disabled"
                                                wire:click="delquestion({{$question->id}})">
                                                <i class="zmdi zmdi-delete"></i>
                                                <span class="spinner-border spinner-border-sm text-light" wire:loading
                                                    wire:target="delquestion({{$question->id}})"></span>
                                            </button>
                                        </center>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $questions->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>