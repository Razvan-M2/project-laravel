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
        <div id="post-content" class="pt-4">
            <?php
            echo $post->description
        ?>
        </div>
    </div>
</div>
