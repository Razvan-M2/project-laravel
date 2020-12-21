<div>    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Page') }}
        </h2>
    </x-slot>
    <select  class="border-gray-300 border pt-2 pb-2 pl-3 pr-3 rounded-md" name="cat_select_container" id="cat_select_container" wire:change="selectedCategory()" wire:model="selected_cat_id">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
        @endforeach
    </select>
    <x-jet-input type="text" name="cat_edit_container" id="cat_edit_container" wire:model="selected_cat_name"/>
    <x-jet-secondary-button type="button" value="Update!" wire:click="updateCategory()">Update!</x-jet-secondary-button>
    <x-jet-secondary-button type="button" value="Delete!" wire:click="$toggle('confirmingUserDeletion')">Delete!</x-jet-secondary-button>
    <x-jet-secondary-button type="button" value="Add Category!" wire:click="$toggle('confirmingCategoryAddition')">Add Category!</x-jet-secondary-button>
    {{-- @error('name') <span class="error">{{ $message }}</span> @enderror --}}


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
