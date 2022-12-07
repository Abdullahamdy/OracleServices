<?php

namespace App\Http\Livewire\OperationServices;

use Livewire\Component;
use App\Models\OperationsService;
use App\Models\Notification;
use App\Models\Attachment;
use Livewire\WithFileUploads;
class OperationServiceEdit extends Component
{
    use WithFileUploads;
    public $operationservece=[];
    public function mount($operation_id){
        $operationservece = OperationsService::findOrFail($operation_id);
        $this->operationservece = $operationservece->toArray();

        
    }
    public function OperationEditOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }

    public function update(){
        $data = $this->validate([
            'operationservece.name' => 'required|string|min:5|max:30|unique:operations_services,name',
            'operationservece.path' => 'required|image|mimes:jpeg,png,jpg',
            'operationservece.text' => 'required|string',
 
        ]);
        if (empty($this->operationservece['path']) || $this->operationservece['path'] == "") {
            if (!empty($this->operationservece['path'])) {
                unset($this->operationservece['path']);
            }
        }
        $operationserveces = OperationsService::find($this->operationservece['id']);
        $operationserveces->update($this->operationservece);
        $message_ar = 'تم تعديل قسم' . ' ' . '('.$operationserveces['name'].')';
        $notification = Notification::where('operation_servic_id', $operationserveces['id']);
        $notification->update([
            'title' => $operationserveces['name'],
            'title_en' => $operationserveces['name'],
            'message' => $message_ar,
            'message_en' => $message_ar,
            'user_id' => auth()->id(),
        ]);
        if (!empty($this->operationservece['path'])) {
            $file = $this->operationservece['path']->store('attachments', 'public');
            Attachment::create([
                'path' => $file,
                'operation_servic_id' => $operationserveces['id'],
            ]);
        }
        unset($this->operationserveces);
        $this->emit('alertSuccess');
        $this->emit('refreshOperationAdmin');


    }
    public function render()
    {
        return view('livewire.operation-services.operation-service-edit');
    }
}
