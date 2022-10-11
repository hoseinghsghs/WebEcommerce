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
        if ($question->approved) {

            $this->title = "عدم انتشار";
            $this->color = "danger";
        } else {

            $this->title = "انتشار";
            $this->color = "success";
        }
    }

    public function render()
    {
        $user_name = User::where('name', 'like', '%' . $this->name . '%')->pluck('id')->toArray();
        $product_name = Product::where('name', 'like', '%' . $this->product_name . '%')->pluck('id')->toArray();
        $questions = Question::when($this->name, function ($query) use ($user_name) {
            $query->whereIn('user_id', $user_name);
        })->when($this->product_name, function ($query) use ($product_name) {
            $query->whereIn('product_id', $product_name);
        })->where('parent_id', 0)->paginate(10);

        return view('livewire.admin.questions.questions-list', ['questions' => $questions]);
    }


    public function delquestion(Question $question)
    {
        if ($question->replies->count()) {
            $this->question = $question;
            sweetAlert()
                ->livewire()
                ->addInfo('ابتدا پاسخ ها حذف گردد. با حذف این پرسش تمامی پاسخ ها حذف میشوند');
        } else {
            $question->delete();
            toastr()->livewire()->addSuccess('نظر با موفقیت حذف شد');
        }
    }
    public function sweetAlertConfirmed(array $data)
    {
    }

    public function ChengeActive_question(Question $question)
    {


        if ($question->approved) {
            $question->update([
                "approved" => false
            ]);
            $this->title = "عدم انتشار";
            $this->color = "danger";
        } else {
            $question->update([
                "approved" => true
            ]);
            $this->title = "انتشار";
            $this->color = "success";
        }
    }
}
