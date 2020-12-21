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
    private $searchTerm;

    protected $listeners = ['post-success' => 'hideModal','search' => 'updateData'];

    public function mount()
    {
        $this->searchTerm = "";
        $this->confirmingCategoryAddition = false;
    }

    public function render()
    {
        $data = Content::where('title','LIKE','%'.$this->searchTerm.'%')
                        ->orWhere('description','LIKE','%'.$this->searchTerm.'%')
                        ->orderByDesc('date')
                        ->simplePaginate(10);

        return view('livewire.content-feed',['content'=>$data ])->layout('layouts.app');
    }

    public function selectedPost($id)
    {
        return redirect()->route('post',['id'=>$id]);
    }

    public function hideModal()
    {
        $this->confirmingCategoryAddition = false;
    }

    public function updateData($input)
    {
        $this->searchTerm = $input;
        $this->render();
    }
}
