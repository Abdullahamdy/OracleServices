<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\Notification;

class DeleteCategory extends Component
{

    public $category ; 
    function mount($cat_id)
    {
        $category = Category::findOrFail($cat_id);
        $this->category = $category->toArray();
    }

    public function delete()
    {
        $category = Category::where('id',$this->category['id'])->delete();
        $notification = Notification::where('category_id', $this->category['id'])->delete();

        $this->emit('alertSuccess', __('Category removed successfully'));
        $this->emit('refreshCategoryAdmin');
        return redirect()->route('admin.admin');
    }
    public function render()
    {
        return view('livewire.category.delete-category');
    }
}
