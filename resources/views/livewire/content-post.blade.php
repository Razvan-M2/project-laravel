<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
        {{ __('Posts Page') }}
    </h2>
    <div id="content-column-header" class="float-right">
        <x-jet-secondary-button href="/feed">Back to main</x-jet-secondary-button>
        {{-- <x-jet-secondary-button wire:click="$toggle('confirmingCategoryAddition')">Write a topic</x-jet-secondary-button> --}}
    </div>
</x-slot>
<div class="flex justify-center">
    <div id="card" class="bg-white w-4/6 mt-20 p-8 pt-0 rounded-md shadow-2xl">
        {{-- The Master doesn't talk, he acts. --}}
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
