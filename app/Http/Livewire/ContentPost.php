<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Content;
use App\Models\Chat;

class ContentPost extends Component
{
    public $post_id;

    public function mount($id)
    {
        $this->post_id = $id;
    }

    public function render()
    {
        $chatData = Chat::where('id_content',$this->post_id)->orderBy('date')->get();

        // dd($chatData[0]->user);
        return view('livewire.content-post',['post'=>Content::where('id',$this->post_id)->first(),'chats'=>$chatData])->layout('layouts.app');
    }


}
