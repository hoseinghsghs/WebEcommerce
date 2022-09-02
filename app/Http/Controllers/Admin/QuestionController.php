<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->paginate(10);

        return view('admin.page.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ToastrFactory $flasher)
    {
        $request->validate([
            'text' => 'required',
        ]);
        $approved = (auth()->user()->hasRole('super-admin')) ? 1 : 0 ;
    
        Question::create([
            'parent_id' => $request->question_id,
            'user_id' => auth()->id(),
            'text' => $request->text,
            'product_id' => $request->product_id,
            'approved' => $approved
        ]);
        
        $flasher->addSuccess('تغییرات با موفقیت ذخیره شد');
        return redirect()->route('admin.questions.index');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.page.questions.edit' , compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question ,ToastrFactory $flasher)
    {
        $request->validate([
            'text' => 'required|min:5',
        ]);
        try {
                $question->update([
                    "text" => $request->text
                ]); 

                $flasher->addSuccess('تغییرات با موفقیت ذخیره شد');
                return redirect()->route('admin.questions.index');
        } 
        
        catch (\Throwable $th) {
            $flasher->addError('مشکل در تغییر');
            return redirect()->route('admin.questions.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question,ToastrFactory $flasher)
    {
        $question->delete();
        $flasher->addSuccess('کامنت مورد نظر حذف شد');
        return back();

    }
}