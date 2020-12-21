<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{

    public $input;

    public function mount()
    {
        $this->input = "";
    }

    public function render()
    {
        return view('livewire.search');
    }

    public function search()
    {
        $this->emit('search',$this->input);
    }
}
