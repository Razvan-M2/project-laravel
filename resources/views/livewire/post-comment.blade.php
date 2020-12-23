<form action="" wire:submit.prevent="submit_comment" accept-charset="UTF-8">
    <textarea wire:model="comment_text" class="w-full shadow-inner shadow p-4 border-0 rounded-lg focus:shadow-outline" placeholder="Comment here" cols="6" rows="6" id="comment_content" spellcheck="false"></textarea>
    <button type="submit" class="font-bold py-2 px-4  bg-gray-500 text-white shadow-md rounded-lg">Comment </button>
    @error('comment_text') <span class="error ">{{ $message }}</span> @enderror
</form>
