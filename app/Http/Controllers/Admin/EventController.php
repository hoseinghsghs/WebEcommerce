<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
       $events= Event::latest()->paginate(10);
        return view('admin.page.timeline.index' , compact('events'));
    }
    
    public function destroy(Event $event,ToastrFactory $flasher)
    {
        $event->delete();
        $flasher->addSuccess('رویداد حذف گردید');
        return back();

    }
}