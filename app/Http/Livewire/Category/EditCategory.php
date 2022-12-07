<?php

namespace App\Http\Livewire\Category;
use App\Models\Category as CategoryModal;
use App\Models\Notification;
use Livewire\Component;

class EditCategory extends Component
{
    public $category=[];
    public function mount($cat_id){
      $this->cat_id = $cat_id;
     
        $category = CategoryModal::findOrFail($cat_id);
        $this->category = $category->toArray();
        $this->update($cat_id);
        
    }
    public function CategoryEditOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }
    public function render()
    {
        $this->dispatchBrowserEvent('updateSelect2');
        $allcategory = CategoryModal::all();
        return view('livewire.category.edit-category',compact('allcategory'));
    }

    public function update()
    {
        $this->validate([
            'category.name' => 'required|string|min:5|max:30|unique:categories,name,'.$this->cat_id,
            'category.parent_id' => 'sometimes|nullable|exists:categories,id',
        ]);

 
        $category_update = CategoryModal::find($this->category['id']);
        $category_update->update($this->category);
        $message_ar = 'تم تعديل قسم' . ' ' . '('.$category_update['name'].')';
        $notification = Notification::where('category_id', $category_update['id']);
        $notification->update([
            'title' => $category_update['name'],
            'title_en' => $category_update['name_en'],
            'message' => $message_ar,
            'message_en' => $message_ar,
            'user_id' => auth()->id(),
        ]);
        unset($this->category['created_at']);
        $this->emit('alertSuccess');
        $this->emit('refreshCategoryAdmin');


    }

}
