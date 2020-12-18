<div>
    <div id="content-column" class="w-3/5 m-auto mt-5">
        <x-jet-secondary-button wire:click="$toggle('confirmingCategoryAddition')">Write a topic</x-jet-secondary-button>
        @foreach ($content as $item)
            <div class="select-none cursor-pointer mb-5 bg-white rounded-md p-6 mt-10 shadow active:bg-gray-100" wire:click="selectedPost({{$item->id}})">
                <span>{{$item->title}}</span>
                <span>  {{$item->user->user_name}}</span>
            </div>
        @endforeach
        {{ $content->links() }}
    </div>

    <x-jet-dialog-modal wire:model="confirmingCategoryAddition">
        <x-slot name="title">
            Post a topic!
        </x-slot>
    
        <x-slot name="content">
            {{-- <x-jet-label for="new_category_name">Add a category:</x-jet-label>
            <x-jet-input type="text" id="new_category_name" name="new_category_name" wire:model="new_category_name"/> --}}
            @livewire('post-topic-form', ['user_id' => Auth::user()->id])
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingCategoryAddition')" wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>
    
            <x-jet-secondary-button wire:click="$emitTo('post-topic-form', 'send-post')" type="submit" class="bg-green-500" class="ml-2" wire:loading.attr="disabled">
                Add Topic
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
