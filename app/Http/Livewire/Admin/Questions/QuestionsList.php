<?php

namespace App\Http\Livewire\Admin\Questions;

use App\Models\Product;
use App\Models\Question;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionsList extends Component
{
    use WithPagination;
    public $title;
    public $question;
    //////////////////////////////////


    protected $paginationTheme = 'bootstrap'; 
    public $name;
    public $product_name;


    /////////////////////////////////
    protected $listeners = [
        'sweetAlertConfirmed', // only when confirm button is clicked
    ];

    public function mount(Question $question)
    { 
        if($question->approved){
        
            $this->title="عدم انتشار";
            $this->color="danger";

        }else{
        
            $this->title="انتشار";
            $this->color="success";

            }
            }
        
            public function render()
            {
                $user_name=User::where('name','like','%'.$this->name.'%')->pluck('id')->toArray();
                $product_name=Product::where('name','like','%'.$this->product_name.'%')->pluck('id')->toArray();
                $questions = Question::whereIn('user_id',$user_name)
                ->whereIn('product_id',$product_name)
                ->where('parent_id',0)
                ->paginate(10);


                return view('livewire.admin.questions.questions-list',['questions' => $questions]);
            }
                
        public function delquestion(Question $question){

        $this->$question=$question;
            sweetAlert()
            ->livewire()
            ->showDenyButton(true,'انصراف')->confirmButtonText("تایید")
            ->addInfo('از حذف رکورد مورد نظر اطمینان دارید؟');
        
        }

    public function ChengeActive_question (Question $question){
        

        if($question->approved){
            $question->update([
                "approved"=> false
            ]);
            $this->title="عدم انتشار";
            $this->color="danger";

        }else{
            $question->update([
                "approved"=> true
            ]);
            $this->title="انتشار";
            $this->color="success";

            }
            
        }
        
        public function sweetAlertConfirmed(array $data)
        { 
            
            $this->question->delete();
                toastr()->livewire()->addSuccess('نظر با موفقیت حذف شد');
        }



}