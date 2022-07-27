<div>

    <div class="row clearfix">
        <div class="col-md-8">
            <div class="form-group">
                <div>
                    <div class="mb-2">
                        {{$comment->user->name}}
                    </div>
                    <div style="border: 1px solid gray; border-radius: 10px; padding:15px ">
                        {{$comment->text}}
                    </div>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">

            <div class="form-group">

                <a wire:click="ChengeActive({{$comment->id}})" wire:loading.attr="disabled"
                    class="btn btn-raised btn-{{$color}} waves-effect"><span style="color:white;">{{$title}}</span>
                </a>

                <a href="{{route('admin.comments.edit',$comment->id)}}" wire:loading.attr="disabled"
                    class="btn btn-raised btn-info waves-effect">
                    <i class="zmdi zmdi-edit"></i>
                </a>



                <form action="{{route('admin.comments.destroy' , $comment->id) }}" style='display:inline;'
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-raised btn-danger waves-effect" data-type="confirm" type="submit"
                        style='display:inline;'><i class="zmdi zmdi-delete"></i></button>

                </form>



            </div>
        </div>
    </div>
</div>