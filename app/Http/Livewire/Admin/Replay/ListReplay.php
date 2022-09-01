<?php

namespace App\Http\Livewire\Admin\Replay;

use App\Models\Comment;
use App\Models\Question;
use Livewire\Component;

class ListReplay extends Component
{

public $question;
public $title;
public $color;
public $text_log;


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
    public function render()
    {
        return view('livewire.admin.replay.list-replay');
    }
    public function delquestion(Question $question){

        $this->question=$question;
          sweetAlert()
          ->livewire()
          ->showDenyButton(true,'انصراف')->confirmButtonText("تایید")
          ->addInfo('از حذف رکورد مورد نظر اطمینان دارید؟');
         
      }
  
  
       
       public function sweetAlertConfirmed(array $data)
       { 
          $this->question->delete();
          toastr()->livewire()->addSuccess('نظر با موفقیت حذف شد');
       }
}