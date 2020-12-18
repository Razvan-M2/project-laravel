<div>
    <form>
        <div class="mt-5">
            <x-jet-input wire:model="title" class="w-full" name="topic_title" id="topic_title" placeholder="Topic Title" ></x-jet-input>
            @error('title') <span class="error text-red-700">*{{ $message }}</span> @enderror
        </div>
        <div class="mt-5">
            {{-- <x-jet-label for="topic_category">Select a category:</x-jet-label> --}}
            <select wire:model="category" class="border-gray-300 border pt-2 pb-2 pl-3 pr-4 rounded-md" name="topic_category" id="topic_category">
                <option value="" disabled selected>Select a category:</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
            @error('category') <span class="error text-red-700">*{{ $message }}</span> @enderror
        </div>
        <div class="mt-5">
            <textarea wire:model="content" placeholder="Topic Content" class="w-full border-gray-300 border pt-2 pb-2 pl-3 pr-3 rounded-md" name="topic_content" id="topic_content" cols="30" rows="10"></textarea>
            @error('content') <span class="error text-red-700">*{{ $message }}</span> @enderror
        </div>
    </form>
</div>
