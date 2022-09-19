<div>
    <div class="row clearfix">
        <div class="col-md-8">
            <div class="form-group">
                <div>
                    <div class="mb-2">
                        {{$question->user->name}}
                    </div>
                    <div style="border: 1px solid gray; border-radius: 10px; padding:15px ">
                        {!! $question->text !!}
                    </div>
                    </span>
                </div>
            </div>
        </div>
        @php
        if($isquestion){
        $roteedit='admin.questions.edit';
        $rotedestroy='admin.questions.destroy';

        }else{
        $roteedit='admin.comments.edit';
        $rotedestroy='admin.comments.destroy';
        };
        @endphp
        <div class="col-md-4 mt-5">

            <div class="form-group">

                <a wire:click={{$isquestion ? "ChengeActive($question->id)" : "ChengeActiveComment($question->id)"}}
                    wire:loading.attr="disabled" class="btn btn-raised btn-{{$color}} waves-effect"><span
                        style="color:white;">{{$title}}</span>
                </a>

                <a href="{{route($roteedit,$question->id)}}" wire:loading.attr="disabled"
                    class="btn btn-raised btn-info waves-effect">
                    <i class="zmdi zmdi-edit"></i>
                </a>

                <a class="btn btn-raised btn-danger waves-effect" data-type="confirm" type="submit"
                    style='display:inline;'
                    wire:click={{$isquestion ? "delquestion($question->id)" : "delcomment($question->id)"}}><i
                        class="zmdi zmdi-delete" style="color: white;"></i></a>

            </div>
        </div>
    </div>
</div>