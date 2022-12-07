<?php

namespace App\Http\Livewire\Types;

use App\Models\Type;
use Livewire\Component;

class TypesDelete extends Component
{
    public $type;

    function mount($type_id)
    {
        $type = Type::findOrFail($type_id);
        $this->type = $type->toArray();
    }

    public function delete()
    {
        $type = Type::where('id',$this->type['id'])->delete();

        $this->emit('alertSuccess', 'Types  successfully delete.');
        $this->emit('refreshTypes');
        return $this->redirect(route('admin.types'));
    }

    public function render()
    {
        return view('livewire.types.types-delete');
    }
}
