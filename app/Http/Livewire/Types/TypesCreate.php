<?php

namespace App\Http\Livewire\Types;

use App\Models\Type;
use Livewire\Component;

class TypesCreate extends Component
{
    public $type;
    function mount()
    {

    }

    public function store()
    {
        $this->validate([
            'type.name' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
            'type.name_en' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
        ]);
        unset($this->type['created_at']);
        unset($this->type['updated_at']);

        $type = Type::create($this->type);

        $this->emit('alertSuccess');
        $this->type = [];
        $this->emit('refreshTypes');
    }

    public function render()
    {
        return view('livewire.types.types-create');
    }
}
