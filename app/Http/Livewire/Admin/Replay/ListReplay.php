<?php

namespace App\Http\Livewire\Admin\Replay;

use App\Models\Comment;
use App\Models\Question;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class ListReplay extends Component
{

public $question;
public $title;
public $color;
public $text_log;
public $isquestion;
public $comment;



protected $listeners = [
    'sweetAlertConfirmed', // only when confirm button is clicked
];


 
       
public function ChengeActive(Question $question){
    if($question->approved == 1){
        
        $question->update([
            "approved"=> 0
           ]);
           toastr()->livewire()->addError('عدم انتشار'. $question->id);
           $this->title="عدم انتشار";
           $this->color="danger";
           $this->text_log="عدم انتشار";


    }else{
        
        $question->update([
            "approved"=> 1
           ]);
           toastr()->livewire()->addSuccess('انتشار' . $question->id);
           $this->title="انتشار";
           $this->color="success";
           $this->text_log="انتشار";

           
        }
        
     }

     public function ChengeActiveComment (Comment $comment){
        if($comment->approved == 1){
            
            $comment->update([
                "approved"=> 0
               ]);
               toastr()->livewire()->addError('عدم انتشار'. $comment->id);
               $this->title="عدم انتشار";
               $this->color="danger";
               $this->text_log="عدم انتشار";
    
    
        }else{
            
            $comment->update([
                "approved"=> 1
               ]);
               toastr()->livewire()->addSuccess('انتشار' . $comment->id);
               $this->title="انتشار";
               $this->color="success";
               $this->text_log="انتشار";
            }
         }

   
    public function delquestion(Question $question){
        if ($question->replies->count()) {
            toastr()->livewire()->addWarning('ابتدا پاسخ به پرسش  حذف گردد. با حذف این نظر تمامی پاسخ ها حذف میشوند');
        }else{
            $question->delete();
            toastr()->livewire()->addSuccess('پرسش با موفقیت حذف شد');
            return redirect(request()->header('Referer'));
        };
         
      }

        
    public function delcomment(Comment $comment){
        if ($comment->replies->count()) {
            toastr()->livewire()->addWarning('ابتدا پاسخ به نظر  حذف گردد. با حذف این نظر تمامی پاسخ ها حذف میشوند');

        }else{
            $comment->delete();
            toastr()->livewire()->addSuccess('نظر با موفقیت حذف شد');
            return redirect(request()->header('Referer'));
        };
         
      }
       public function render()
       {
           return view('livewire.admin.replay.list-replay');
       }
}