<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CommentsList extends Component
{

    use WithPagination;
    public $title;
    public $comment;
    //////////////////////////////////
    protected $paginationTheme = 'bootstrap';
    public $name;
    public $product_name;
    /////////////////////////////////
    protected $listeners = [
        'sweetAlertConfirmed', // only when confirm button is clicked
    ];

    public function mount(Comment $comment)
    {

        if ($comment->approved) {

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
        $post_name = Post::where('title', 'like', '%' . $this->product_name . '%')->pluck('id')->toArray();
        $data = array_merge($post_name, $product_name);
        $comments = Comment::when($this->name, function ($query) use ($user_name) {
            $query->whereIn('user_id', $user_name);
        })->when($product_name, function ($query) use ($data) {
            $query->whereIn('commentable_id', $data);
        })->where('parent_id', 0)->paginate(10);
        return view('livewire.admin.comments.comments-list', ['comments' => $comments]);
    }



    public function delcomment(Comment $comment)
    {
        if ($comment->replies->count()) {
            $this->comment = $comment;
            sweetAlert()
                ->livewire()
                ->addInfo('ابتدا کامنت ها حذف گردد. با حذف این پرسش تمامی کامنت ها حذف میشوند');
        } else {
            $comment->delete();
            toastr()->livewire()->addSuccess('نظر با موفقیت حذف شد');
        }
    }

    public function sweetAlertConfirmed(array $data)
    {
    }

    public function ChengeActive_comment(Comment $comment)
    {


        if ($comment->approved) {
            $comment->update([
                "approved" => false
            ]);
            $this->title = "عدم انتشار";
            $this->color = "danger";
        } else {
            $comment->update([
                "approved" => true
            ]);
            $this->title = "انتشار";
            $this->color = "success";
        }
    }
}
