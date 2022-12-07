<?php
namespace App\Http\Livewire\Category;
use App\Models\Category as CategoryModel;
use Livewire\Component;
use Livewire\WithPagination;
class CategoryComponent extends Component
{
   
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshCategoryAdmin' => 'ActionRefreshCategory'];

    public function ActionRefreshCategory()
    {

    }
    public function mount()
    {
        if (request('search')){ 
            
            $this->search = request('search');
        }
    }

    public function refreshCategory()
    {

    }
    public function render()
    {
        $category = CategoryModel::query();
        if ($this->search) {
            $categories = $category->where(function ($q) {
                return $q->where('name', 'LIKE', "%$this->search%");       
            });
           
        }
        $categories = $category->paginate(9);
        return view('livewire.category.category-component',compact('categories'));
    }
}
