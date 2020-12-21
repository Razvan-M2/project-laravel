<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Content;

class ContentPost extends Component
{
    protected $post_id;

    public function mount($id)
    {
        $this->post_id = $id;
    }

    public function render()
    {
        return view('livewire.content-post',['post'=>Content::where('id',$this->post_id)->first()])->layout('layouts.app');
    }
}
