<?php

namespace App\Http\Livewire\Packages;

use App\Models\Attachment;
use App\Models\Notification;
use App\Models\Package;
use App\Models\Service;
use App\Models\Status;
use App\Models\Type;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PackagesCreate extends Component
{
    use WithFileUploads;
    public  $service, $path, $package, $name, $name_en, $days, $price, $type, $discount, $tax, $price_after, $status, $description, $description_en, $type_id, $status_id, $image, $imageTemp;
    public $token;
    protected $listeners = ['refreshPackages'];

    public function refreshPackages()
    {

    }

    function mount($service_id)
    {
        $this->service= Service::find($service_id);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
            'name_en' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
            'price' => 'numeric|digits_between:1,6',
            'discount' => 'numeric|digits_between:1,2',
            'tax' => '',
            'type_id' => 'nullable',
            'price_after' => '',
            'status_id' => '',
            'description' => 'string|min:10|max:250|regex:/^[a-zA-Z-ا-ي]{1}/',
            'description_en' => 'string|min:10|max:250|regex:/^[a-zA-Z-ا-ي]{1}/',
            'path' => 'required|image|mimes:jpeg,png,jpg',
            'days' => 'numeric|digits_between:1,2',
        ]);

        $this->token = str::random(20);

        $package = Package::create(
            [
                'name' => $this->name,
                'name_en' => $this->name_en,
                'price' => $this->price,
                'type' => $this->type,
                'discount' => $this->discount,
                'tax' => $this->tax,
                'price_after' => $this->price_after,
                'type_id' => $this->type_id,
                'status_id' => $this->status_id,
                'description' => $this->description,
                'description_en' => $this->description_en,
                'service_id' => $this->service->id,
                'path' => $this->path,
                'days' => $this->days,
            ]
        );
        if (!empty($this->path)) {
            $file = $this->path->store('attachments', 'public');
            Attachment::create([
                'path' => $file,
                'package_id' => $package->id,
            ]);
        }

        $message_ar = 'تمت اضافة باقة جديدة' . ' ' . '('.$this->name.')';
        $message_en = 'A new package has been added' . ' ' . '('.$this->name_en.')';

        Notification::create([
            'title' => $this->name,
            'title_en' => $this->name_en,
            'message' => $message_ar,
            'message_en' => $message_en,
            'user_id' => auth()->id(),
            'package_id' => $package->id,
            'token' => $this->service->token,
        ]);

        $this->emit('alertSuccess');
        $this->name = "";
        $this->name_en = "";
        $this->type = "";
        $this->discount = 0;
        $this->tax = 0;
        $this->price_after = 0;
        $this->description = "";
        $this->description_en = "";
        $this->emit('refreshPackages');
        $this->emit('refreshServicesShowAdmin');
    }

    public function render()
    {
        $this->tax = $this->price * 0.15;
        $this->price_after = $this->price + $this->tax;

        if ($this->discount != 0 and $this->discount != null) {
            $this->price_after = $this->price_after - ($this->price_after * ($this->discount / 100));
        }

        $types = Type::all();
        $statuses = Status::all();
        return view('livewire.packages.packages-create', compact('types','statuses'))->layout('layouts.app-admin');
    }
}
