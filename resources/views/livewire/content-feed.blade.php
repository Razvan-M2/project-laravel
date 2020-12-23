<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
                {{ __('Posts Page') }}
            </h2>
            <div class="inline-block w-3/5">
                @livewire('search')
            </div>
            <div id="content-column-header" class="inline-block float-right">
                <x-jet-secondary-button wire:click="$toggle('confirmingCategoryAddition')">Write a topic</x-jet-secondary-button>
            </div>
        </div>
    </header>

    <div id="content-column-feed" class= "w-3/4 m-auto">
        @foreach ($content as $item)
            <div class="select-none cursor-pointer mb-5 bg-white rounded-md p-4 h-28 mt-10 shadow active:bg-gray-100" wire:click="selectedPost({{$item->id}})">
                <span class="inline-block text-lg mb-4">
                    @if ($item->answered == 1)
                    <span class="bg-green-400 text-white p-2 rounded-md">[Answered]</span>   
                    @endif
                    {{$item->title}}
                </span>
                <span class="float-right" style="margin-top:-5px">
                    <span class="text-sm mr-3">
                        {{$item->user->user_name}}
                    </span>
                    <img class="h-10 w-10 rounded-full object-cover inline-block" src="{{ $item->user->profile_photo_url }}"/>
                </span>
                <div class="text-sm text-cool-gray-500">Asked on : {{$item->date}}</div>
                <div class="text-sm text-cool-gray-500">Role : User</div>
            </div>
        @endforeach
        <div class="pb-5">
            {{ $content->links() }}
        </div>
    </div>

    <x-jet-dialog-modal wire:model="confirmingCategoryAddition">
        <x-slot name="title">
            Post a topic!
        </x-slot>
    
        <x-slot name="content">
            @livewire('post-topic-form')
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingCategoryAddition')" wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>
    
            <x-jet-secondary-button wire:click="$emitTo('post-topic-form', 'send-post')" type="submit" class="bg-green-500" class="ml-2" wire:loading.attr="disabled">
                Post
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
