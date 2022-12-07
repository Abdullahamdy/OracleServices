<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Contacts;
class ContactUs extends Component
{
    public $contact;
    public function render()
    {
        return view('livewire.frontend.contact-us')->layout('layouts.frontend.layout-frontend');;
    }
   
    public function store()
    {
        
       
        $data = $this->validate([
            'contact.name' => 'required|string|min:5|max:50',
            'contact.email' =>   'required|string|email',
            'contact.subject' => 'required|string|min:10|max:300',
            'contact.message' => 'required|string|min:10|max:1000',
 
        ],[
            'contact.name.required'=>'حقل الاسم مطلوب',
            'contact.email.required'=>'حقل الأيميل مطلوب',
            'contact.subject.required'=>'حقل  العنوان مطلوب',
            'contact.message.required'=>'حقل  الرساله مطلوب',

            'contact.name.string'=>'حقل الاسم يجب ان يكون نص ',
            'contact.email.string'=>'حقل الأيميل يجب ان يكون نص ',
            'contact.subject.string'=>'حقل العنوان يجب ان يكون نص ',
            'contact.message.string'=>'حقل الرساله يجب ان يكون نص ',

            'contact.name.min'=>'حقل الاسم يجب ان يكون نص ',
            'contact.email.min'=>'حقل الأيميل يجب ان يكون نص ',
            'contact.subject.min'=>'حقل العنوان يجب ان يكون نص ',
            'contact.message.min'=>'حقل الرساله يجب ان يكون نص ',
        ]);
        $contact = Contacts::create($data['contact']);
        $this->emit('alertSuccess');
        unset($this->contact);
        $this->emit('refreshCategoryAdmin');
        return $this->redirect(route('admin.admin'));
    }
}
