<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Content;
use App\Models\User;
use App\Models\Category;


class ContentFeed extends Component
{
    use WithPagination;  

    public $confirmingCategoryAddition;

    protected $listeners = ['post-success' => 'hideModal'];

    public function mount()
    {
        $this->confirmingCategoryAddition = false;
    }

    public function render()
    {
        return view('livewire.content-feed',['content'=>Content::orderByDesc('date')->simplePaginate(10)])->layout('layouts.app');
    }

    public function selectedPost($id)
    {
        return redirect()->route('post',['id'=>$id]);
    }

    public function hideModal()
    {
        $this->confirmingCategoryAddition = false;
    }
}
