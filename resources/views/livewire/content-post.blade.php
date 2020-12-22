{{-- <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
        {{ __('Posts Page') }}
    </h2>
    <div id="content-column-header" class="float-right">
        <x-jet-secondary-button href="/feed">Back to main</x-jet-secondary-button>
        <x-jet-secondary-button wire:click="$toggle('confirmingCategoryAddition')">Write a topic</x-jet-secondary-button>
    </div>
</x-slot> --}}

<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Posts Page') }}
        </h2>
        <div id="content-column-header" class="inline-block float-right">
            <x-jet-secondary-button>
                <a href="/feed">Back to main</a>
            </x-jet-secondary-button>
        </div>
    </div>
</header>
<div class="flex justify-center">
    <div id="card" class="bg-white w-5/6 mt-20 p-8 pt-0 rounded-md shadow-xl">
        <div class="border-b-4">
            <div id="post-title" class="pb-4 pt-8 w-9/12 inline-block ">
                <span class="font-medium text-xl">{{$post->title}}</span>
            </div>
            <div id="post-title-user-details" class="float-right flex flex-wrap content-center">
                <span id="tag-user" class="inline-block mr-5 align-middle mt-10">{{$post->user->user_name}}</span>
                <span id="container-photo" class="inline-block mt-6 mr-0">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ $post->user->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </span>
            </div>
        </div>
        <div id="post-content" class="pt-4 pb-4" style="min-height: 300px">
            <?php
            echo $post->description
        ?>
        </div>
        <div id="post-footer" class="border-t-4 pt-4">
            Tags: 
            <div id="tag-item" class="inline-block p-2 bg-cool-gray-400 rounded-md">
                {{$post->category->category_name}}
            </div>
        </div>
    </div>
</div>

<div class="flex justify-center pb-10" id="messagesSection">
    <div class="w-4/6 m-auto">
        <div id="comment_cell" class="m-4 w-full shadow rounded-md">
            @livewire('post-comment', ['id_content' => $post_id,'id_user'=>Auth::user()->id,'id_message'=>null])
        </div>

        @foreach ($chats as $chat)
            @if ($chat->id_message == null)
                <div id="comment_cell" class="m-4 pt-0 w-full float-right shadow rounded-md">
                    <div class="bg-white h-auto rounded-lg p-4 shadow-inner focus:shadow-outline">
                        <div class="inline-block w-100 h-100 p-2 pb-4">{{$chat->content}}</div>
                        <div class="bottom-0 pl-2">
                            <img class="h-10 w-10 rounded-full object-cover inline-block mr-4" src="{{ $chat->user->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            <span>{{$chat->user->user_name}}</span>
                            <span class="float-right text-sm text-gray-500">Commented on: {{$chat->date}}</span>
                        </div>
                    </div>
                </div>
                @foreach ($chats as $item)
                    @if ($item->id_message == $chat->id)
                    <div id="comment_cell" class="m-4 pt-0 w-3/4 float-right shadow rounded-md">
                        <div class="bg-white h-auto rounded-lg p-4 shadow-inner focus:shadow-outline">
                            <div class="inline-block w-100 h-100 p-2 pb-4">{{$item->content}}</div>
                            <div class="bottom-0 pl-2">
                                <img class="h-10 w-10 rounded-full object-cover inline-block mr-4" src="{{ $item->user->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                <span>{{$item->user->user_name}}</span>
                                <span class="float-right text-sm text-gray-500">Commented on: {{$item->date}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                <div id="comment_cell" class="m-4 w-3/4 float-right shadow rounded-md">
                    @livewire('post-comment', ['id_content' => $post_id,'id_user'=>Auth::user()->id,'id_message'=>$chat->id])
                </div>
            @endif
        @endforeach
    </div>
</div>
