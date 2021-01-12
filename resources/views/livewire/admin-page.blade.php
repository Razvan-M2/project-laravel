<div>    
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Page') }}
        </h2>
    </x-slot> --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
                {{ __('Admin Page') }}
            </h2>
        </div>
    </header>
    <div  class="bg-white shadow p-4 inline-block align-middle rounded-md mx-40 mt-14 ">
    <div class="pb-5 h-10 font-bold"><p class="font-semibold text-l text-gray-800 leading-tight underline">Categories</p></div>
    <select  class="border-gray-300 border pt-2 pb-2 pl-3 pr-3 rounded-md" name="cat_select_container" id="cat_select_container" wire:change="selectedCategory()" wire:model="selected_cat_id">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
        @endforeach
    </select>
    
    <x-jet-input class="ml-3" type="text" name="cat_edit_container" id="cat_edit_container" wire:model="selected_cat_name"/>
    <x-jet-secondary-button class="ml-3" type="button" value="Update!" wire:click="updateCategory()">Update!</x-jet-secondary-button>
    <x-jet-secondary-button class="ml-3" type="button" value="Delete!" wire:click="$toggle('confirmingUserDeletion')">Delete!</x-jet-secondary-button>
    <x-jet-secondary-button class="ml-3" type="button" value="Add Category!" wire:click="$toggle('confirmingCategoryAddition')">Add Category!</x-jet-secondary-button>
    {{-- @error('name') <span class="error">{{ $message }}</span> @enderror --}}

    </div>
    <x-jet-confirmation-modal wire:model="confirmingCategoryDeletion">
        <x-slot name="title">
            Delete Category
        </x-slot>
    
        <x-slot name="content">
            Are you sure you want to delete this category? It will be gone forever.
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingCategoryDeletion')" wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>
    
            <x-jet-danger-button class="ml-2" wire:click="deleteCategory()" wire:loading.attr="disabled">
                Delete Category
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>


    <x-jet-dialog-modal wire:model="confirmingCategoryAddition">
        <x-slot name="title">
            Add a category!
        </x-slot>
    
        <x-slot name="content">
            <x-jet-label for="new_category_name">Add a category:</x-jet-label>
            <x-jet-input type="text" id="new_category_name" name="new_category_name" wire:model="new_category_name"/>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingCategoryAddition')" wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>
    
            <x-jet-secondary-button class="bg-green-500" class="ml-2" wire:click="addCategory()" wire:loading.attr="disabled">
                Add Category
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
