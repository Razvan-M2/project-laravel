<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat;
use App\Models\Content;

class AcceptAnswer extends Component
{
    public $id_message,$id_content;

    public function mount($id_message,$id_content)
    {
        $this->id_message = $id_message;
        $this->id_content = $id_content;
    }

    public function render()
    {
        return view('livewire.accept-answer');
    }

    public function accept()
    {


        $chat = Chat::where('id',$this->id_message)->first();

        $chat->accepted_answerd = 1;
        
        $chat->save();

        $content = Content::where('id',$this->id_content)->first();

        $content->answered = 1;
        $content->answer_date = $chat->date;

        $content->save();

        $this->emit('accepted-comment');

    }
}
