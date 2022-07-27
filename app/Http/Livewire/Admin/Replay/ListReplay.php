<?php

namespace App\Http\Livewire\Admin\Replay;

use App\Models\Comment;
use Livewire\Component;

class ListReplay extends Component
{

public $comment;
public $title;
public $color;
public $text_log;


protected $listeners = [
    'sweetAlertConfirmed', // only when confirm button is clicked
];


       
public function ChengeActive(Comment $comment){
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
    public function render()
    {
        return view('livewire.admin.replay.list-replay');
    }
    public function delcomment(Comment $comment){

        $this->comment=$comment;
          sweetAlert()
          ->livewire()
          ->showDenyButton(true,'انصراف')->confirmButtonText("تایید")
          ->addInfo('از حذف رکورد مورد نظر اطمینان دارید؟');
         
      }
  
  
       
       public function sweetAlertConfirmed(array $data)
       { 
          $this->comment->delete();
          toastr()->livewire()->addSuccess('نظر با موفقیت حذف شد');
       }
}