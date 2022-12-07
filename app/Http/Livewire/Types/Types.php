<?php

namespace App\Http\Livewire\Types;

use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class Types extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    protected $listeners = ['refreshTypes'];

    public function refreshTypes()
    {

    }

    public function mount()
    {
        if(!auth()->check() or !auth()->user()->hasRole('Admin')){
            abort(403);
        }

        if (request('search')) {
            $this->search = request('search');
        }
    }

    public function render()
    {
        $types = Type::query();

        if ($this->search) {
            $types = $types->where('name', 'LIKE', "%$this->search%")
                ->orWhere('name_en', 'LIKE', "%$this->search%");
        }

        $types = $types->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.types.types', compact('types'))->layout('layouts.app-admin');
    }
}
