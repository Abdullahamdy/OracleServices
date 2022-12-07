<?php

namespace App\Http\Livewire\Services;

use App\Models\Attachment;
use App\Models\Notification;
use App\Models\Service;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class ServicesCreate extends Component
{
    use WithFileUploads;
    public $service;

    function mount()
    {
        

    }

    public function ProjectCreateOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }

    public function store()
    { 
        
        $data = $this->validate([
            'service.name' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
            'service.short_description' => 'required|string|min:5|max:100|regex:/^[a-zA-Z-ا-ي]{1}/',
            'service.full_description' => 'required|string|min:5|max:200',
            'service.begin' => 'required|after:yesterday',
            'service.end' => 'required|after_or_equal:service.begin',
            'service.path' => 'required|image|mimes:jpeg,png,jpg',
            'service.role_id' => 'required|exists:roles,id',
            'service.category_id' => 'required|exists:categories,id',
        ]);
        unset($data['service']['created_at']);
        unset($data['service']['updated_at']);
        $data['service']['token'] = str::random(40);
        $data['service']['role_id'] = json_encode($data['service']['role_id']);
        $service = Service::create($data['service']);

        if (!empty($this->service['path'])) {
            $file = $this->service['path']->store('attachments', 'public');
            Attachment::create([
                'path' => $file,
                'service_id' => $service->id,
            ]);
        }

        $message_en = 'A new service has been added' . ' ' . '('.$service->name.')';

        Notification::create([
            'title' => $service->name,
            'message' => $message_en, 
            'user_id' => auth()->id(),
            'service_id' => $service->id,
            'token' => $service->token,
        ]);

        $this->emit('alertSuccess');
        unset($this->service);
        $this->emit('refreshServicesAdmin');
        return $this->redirect(route('admin.admin'));
    }

    public function render()
    {
        $this->dispatchBrowserEvent('updateSelect2');
        $roles = Role::all();
        $categories = Category::all();
        return view('livewire.services.services-create', compact('roles','categories'))->layout('layouts.app');
    }
}
