<?php

namespace App\Http\Livewire\OperationServices;

use Livewire\Component;
use App\Models\OperationsService;
use App\Models\Notification;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Attachment;
class OperationServiceCreate extends Component
{
    use WithFileUploads;
    public $operationservece;
    public function render()
    {
        return view('livewire.operation-services.operation-service-create');
    }
    public function ProjectCreateOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }
    public function store()
    {
        $data = $this->validate([
            'operationservece.name' => 'required|string|min:5|max:30|unique:operations_services,name',
            'operationservece.path' => 'required|image|mimes:jpeg,png,jpg',
            'operationservece.text' => 'required|string',
 
        ]);
        
   
        $this->token = str::random(20);
        $operation = OperationsService::create($data['operationservece']);
        if (!empty($this->operationservece['path'])) {
            $file = $this->operationservece['path']->store('attachments', 'public');
            Attachment::create([
                'path' => $file,
                'operation_servic_id' => $operation->id,
            ]);
            
        }
        $message_en = 'A new operationservece has been added' . ' ' . '('.$operation->name.')';
        $this->emit('alertSuccess');
        Notification::create([
            'title' => $operation->name,
            'message' => $message_en,
            'message_en' => $message_en,
            'user_id' => auth()->id(),
            'operation_servic_id' => $operation->id,
            'token' => $this->token,
        ]);
        unset($this->operationservece);
        $this->emit('refreshOperationAdmin');
        return $this->redirect(route('admin.admin'));
    }

}
