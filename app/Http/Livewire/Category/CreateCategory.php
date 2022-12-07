<?php

namespace App\Http\Livewire\Category;
use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Str;
use App\Models\Category as CategoryModel;
class CreateCategory extends Component
{
    public $category;
    public $token;
    public $ottPlatform = '';
 
    public $webseries = [
        'Wanda Vision',
        'Money Heist',
        'Lucifer',
        'Stranger Things'
    ];
    public function ProjectCreateOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }

    public function render()
    {
        $this->dispatchBrowserEvent('updateSelect2');
        $allcategory = CategoryModel::all();
        return view('livewire.category.create-category',compact('allcategory'))->layout('layouts.app');
    }

    public function store()
    {
        $data = $this->validate([
            'category.name' => 'required|string|min:5|max:30|unique:categories,name',
            'category.parent_id' => 'sometimes|nullable|exists:categories,id',
 
        ]);
        $this->token = str::random(20);
        $category = CategoryModel::create($data['category']);
        unset($data['category']['name']);
        $message_en = 'A new Category has been added' . ' ' . '('.$category->name.')';
        $this->emit('alertSuccess');
        Notification::create([
            'title' => $category->name,
            'message' => $message_en,
            'message_en' => $message_en,
            'user_id' => auth()->id(),
            'category_id' => $category->id,
            'token' => $this->token,
        ]);
        unset($this->category);
        $this->emit('refreshCategoryAdmin');
        return $this->redirect(route('admin.admin'));
    }

}
