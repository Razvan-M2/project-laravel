<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class AdminPage extends Component
{
    public $selected_cat_id;
    public $selected_cat_name;
    public $confirmingCategoryDeletion;
    public $confirmingCategoryAddition;
    public $new_category_name;

    public function mount()
    {
        $this->selected_cat_id = '';
        $this->selected_cat_name = '';
        $this->new_category_name = '';
        $this->confirmingCategoryDeletion = false;
        $this->confirmingCategoryAddition = false;
    }

    public function render()
    {
        return view('livewire.admin-page',['categories' => Category::all()])->layout('layouts.app');
    }

    public function selectedCategory(){

        $category = Category::where('id',$this->selected_cat_id)->first();

        $this->selected_cat_name = $category->category_name;
    }

    public function addCategory(){

        $category = new Category;

        $category->category_name = $this->new_category_name;

        $category->save();

        $this->confirmingCategoryAddition = false;

    }

    public function updateCategory()
    {

        Category::where('id', $this->selected_cat_id)
                    ->update(['category_name' => $this->selected_cat_name]);

    }

    public function deleteCategory()
    {
        if($this->selected_cat_id != ""){
            Category::destroy($this->selected_cat_id);
            $this->selected_cat_name = "";
            $this->selected_cat_id = "";
            $this->confirmingCategoryDeletion = false;
        }
        else{

        }

    }
}
