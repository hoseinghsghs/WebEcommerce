<?php

namespace App\Http\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Component;

class EventList extends Component
{
public $evorders;

    protected $listeners= [

        'echo-private:AdminNotification,NotificationMessage' => 'notifyNewOrder'
    ];

    public function mount(){
        $this->evorders= Event::orderBy('id', 'desc')->get();
    }
    
    public function notifyNewOrder($payload)
    {
        $this->dispatchBrowserEvent('say-sound');
        $this->evorders->prepend(Event::find($payload['event']['id']));
        
    }

    public function render()
    {
       $evorders =$this->evorders;
       return view('livewire.admin.events.event-list' , compact('evorders'));
    }
}