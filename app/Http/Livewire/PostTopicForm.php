<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use App\Models\Content;
use App\Models\Content_Category;

class PostTopicForm extends Component
{

    private $user_id ;

    public $title;
    public $content;
    public $category;

    protected $rules = [
        'title' => 'required|min:6',
        'content' => 'required|min:50',
        'category' => 'required'
    ];

    protected $listeners = ['send-post' => 'postForm'];

    public function mount()
    {
        $this->title = "";
        $this->content = "";
        $this->category = "";
    }

    public function render()
    {
        return view('livewire.post-topic-form',['categories' => Category::all()]);
    }

    public function postForm()
    {
        $this->validate();

        $CarbonDate = Carbon::now();

        $content = new Content;
        $content->date = $CarbonDate->toDateTimeString();
        $content->id_category = $this->category;
        $content->title = $this->title;
        $content->description = $this->content;
        $content->id_user = auth()->user()->id;

        $content->save();

        $content_category_link = new Content_Category;

        $content_category_link->id_content = $content->id;
        $content_category_link->id_category = $this->category;
        $content_category_link->save();

        $this->emitUp('post-success');
    }
}
