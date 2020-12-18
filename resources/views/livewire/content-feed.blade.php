<div>
    <x-jet-secondary-button>Post something new</x-jet-secondary-button>
    <div id="content-column" class="w-3/5 m-auto">
        @foreach ($content as $item)
            <div class="select-none cursor-pointer mb-5 bg-white rounded-md p-6 mt-10 shadow active:bg-gray-100" wire:click="selectedPost({{$item->id}})">
                <span>{{$item->title}}</span>
                <span>  {{$item->user->user_name}}</span>
            </div>
        @endforeach
        {{ $content->links() }}
    </div>
</div>
