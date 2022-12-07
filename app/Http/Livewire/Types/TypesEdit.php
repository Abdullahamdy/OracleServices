<?php

namespace App\Http\Livewire\Types;

use App\Models\Type;
use Livewire\Component;

class TypesEdit extends Component
{
    public  $type=[];

    function mount($type_id)
    {
        $type = Type::findOrFail($type_id);
        $this->type = $type->toArray();
    }

    public function update()
    {
        $this->validate([
            'type.name' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
            'type.name_en' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
        ]);
        unset($this->type['created_at']);
        unset($this->type['updated_at']);

        $type = Type::where('id',$this->type['id'])->update($this->type);

        $this->emit('alertSuccess');
        $this->emit('refreshTypes');
    }

    public function render()
    {
        return view('livewire.types.types-edit');
    }
}
