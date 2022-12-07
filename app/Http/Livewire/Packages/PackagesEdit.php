<?php

namespace App\Http\Livewire\Packages;

use App\Models\Attachment;
use App\Models\Notification;
use App\Models\Package;
use App\Models\Status;
use App\Models\Type;
use Livewire\Component;
use Livewire\WithFileUploads;

class PackagesEdit extends Component
{
    use WithFileUploads;
    public  $package=[] , $type_id , $status_id, $imageTemp;

    function mount($package_id)
    {
        $package = Package::findOrFail($package_id);
        $this->package = $package->toArray();
    }

    public function update()
    {
        $this->validate([
            'package.name' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
            'package.name_en' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
            'package.price' => 'numeric|digits_between:1,6',
            'package.discount' => 'numeric|digits_between:1,6',
            'package.tax' => '',
            'package.price_after' => '',
            'package.type_id' => 'nullable',
            'package.status_id' => '',
            'package.description' => 'string|min:10|max:250|regex:/^[a-zA-Z-ا-ي]{1}/',
            'package.description_en' => 'string|min:10|max:250|regex:/^[a-zA-Z-ا-ي]{1}/',
            'package.path' => 'nullable|image|mimes:jpeg,png,jpg',
            'package.days' => 'numeric|digits_between:1,6',
        ]);

        if (empty($this->package['path']) || $this->package['path'] == "") {
            if (!empty($this->package['path'])) {
                unset($this->package['path']);
            }
        }

        unset($this->package['created_at']);
        unset($this->package['updated_at']);

        $package_update = Package::find($this->package['id']);
        $package_update->update($this->package);

        if (!empty($this->package['path'])) {
            $file = $this->package['path']->store('attachments', 'public');
            Attachment::create([
                'path' => $file,
                'package_id' => $package_update['id'],
            ]);
        }

        $message_ar = 'تم تعديل باقة' . ' ' . '('.$package_update['name'].')';
        $message_en = 'A package has been modified' . ' ' . '('.$package_update['name_en'].')';

        $notification = Notification::where('package_id', $package_update['id']);
        $notification->update([
            'title' => $package_update['name'],
            'title_en' => $package_update['name_en'],
            'message' => $message_ar,
            'message_en' => $message_en,
            'user_id' => auth()->id(),
        ]);

        $this->emit('refreshPackages');
        $this->emit('alertSuccess');
        $this->emit('refreshPackages');
    }

    public function render()
    {
        $this->package['tax'] = (int)$this->package['price'] * 0.15;
        $this->package['price_after'] = (int)$this->package['price']  + $this->package['tax'];

        if ($this->package['discount'] != 0 and $this->package['discount'] != null) {
            $this->package['price_after'] = $this->package['price_after'] - ($this->package['price_after'] * ($this->package['discount'] / 100));
        }
        $types = Type::all();
        return view('livewire.packages.packages-edit', compact('types'));
    }
}
