<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Chat;

class PostComment extends Component
{

    public $comment_text;
    public $id_content;
    public $id_user;
    public $id_message;

    public function mount($id_content,$id_user,$id_message)
    {
        $this->id_content=$id_content;
        $this->id_user=$id_user;
        $this->id_message = $id_message;
    }

    public function render()
    {
        return view('livewire.post-comment');
    }

    public function submit_comment()
    {
        // dd($this->id_user);

        $carbonDate = Carbon::now();
        $chat = new Chat;

        $chat->date = $carbonDate->toDateTimeString();
        $chat->id_user = $this->id_user;
        $chat->id_content = $this->id_content;
        $chat->id_message = $this->id_message;
        $chat->content = $this->comment_text;
        $chat->stamp = null;
        $chat->save();
    }
}
