<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat;

class DeleteComment extends Component
{
    public $id_message;

    public function mount($id_comment)
    {
        $this->id_message = $id_comment;
    }

    public function render()
    {
        return view('livewire.delete-comment');
    }

    public function deleteComment()
    {

        $chatData = Chat::where('id',$this->id_message)->get();

        if($chatData[0]->id_message)
            //  We have a subcomment
            Chat::where('id',$this->id_message)->delete();
        else{
            //  We have a root message
            Chat::where('id_message',$this->id_message)->delete();
            Chat::where('id',$this->id_message)->delete();
        }

        $this->emit('message-deleted');

    }
}
