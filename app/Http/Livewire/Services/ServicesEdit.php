<?php

namespace App\Http\Livewire\Services;

use App\Models\Attachment;
use App\Models\Notification;
use App\Models\Service;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class ServicesEdit extends Component
{
    use WithFileUploads;
    public $service=[], $file;

    function mount($service_id)
    {
        $service = Service::findOrFail($service_id);
        $this->service = $service->toArray();
        $this->service['role_id'] = json_decode($this->service['role_id']);
    }

    public function ServiceEditOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }

    public function update()
    {
        $this->validate([
            'service.name' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
            // 'service.name_en' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
            'service.short_description' => 'required|string|min:5|max:100|regex:/^[a-zA-Z-ا-ي]{1}/',
            // 'service.short_description_en' => 'required|string|min:5|max:100|regex:/^[a-zA-Z-ا-ي]{1}/',
            'service.full_description' => 'required|string|min:5|max:200',
            // 'service.full_description_en' => 'required|string|min:5|max:200',
            'service.status' => 'required',
            'service.path' => 'nullable|image|mimes:jpeg,png,jpg',
            'service.begin' => 'required|after:yesterday',
            'service.end' => 'required|after_or_equal:service.begin',
            'service.role_id' => 'required|exists:roles,id',
            'service.category_id' => 'required|exists:categories,id',

        ]);

        if (empty($this->service['path']) || $this->service['path'] == "") {
            if (!empty($this->service['path'])) {
                unset($this->service['path']);
            }
        }

        unset($this->service['created_at']);
        unset($this->service['updated_at']);

        $service_update = Service::find($this->service['id']);
        $service_update->update($this->service);

        if (!empty($this->service['path'])) {
            $file = $this->service['path']->store('attachments', 'public');
            Attachment::create([
                'path' => $file,
                'service_id' => $service_update['id'],
            ]);
        }

        $message_ar = 'تم تعديل خدمة' . ' ' . '('.$service_update['name'].')';
        $message = 'A service has been modified' . ' ' . '('.$service_update['name'].')';

        $notification = Notification::where('service_id', $service_update['id']);
        $notification->update([
            'title' => $service_update['name'],
            'message' => $message,
            'user_id' => auth()->id(),
            'service_id' => $service_update['id'],
        ]);

        $this->emit('alertSuccess');
        $this->emit('refreshServicesAdmin');
        $this->emit('refreshServicesShow');
//        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $this->dispatchBrowserEvent('SelectEditService-'.$this->service['id']);
        $roles = Role::all();
        $categories = Category::all();
        return view('livewire.services.services-edit', compact('roles','categories'));
    }
}
