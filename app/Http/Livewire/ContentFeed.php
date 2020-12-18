<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Content;
use App\Models\User;

class ContentFeed extends Component
{
    use WithPagination;  

    // private $data;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.content-feed',['content'=>Content::paginate(10)])->layout('layouts.app');
    }

    public function selectedPost($id)
    {
        return redirect()->route('post',['id'=>$id]);

        // return view('livewire.content-post',['id'=>$id])->layout('layouts.app');
    }
}
