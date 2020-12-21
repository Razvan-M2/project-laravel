<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
                {{ __('Posts Page') }}
            </h2>
            <div id="content-column-header" class="inline-block float-right">
                <x-jet-secondary-button wire:click="$toggle('confirmingCategoryAddition')">Write a topic</x-jet-secondary-button>
            </div>
        </div>
    </header>

    <div id="content-column-feed" class= "w-3/4 m-auto">
        @foreach ($content as $item)
            <div class="select-none cursor-pointer mb-5 bg-white rounded-md p-6 mt-10 shadow active:bg-gray-100" wire:click="selectedPost({{$item->id}})">
                <span>{{$item->title}}</span>
                <span>  {{$item->user->user_name}}</span>
            </div>
        @endforeach
        <div class="mb-5">
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
