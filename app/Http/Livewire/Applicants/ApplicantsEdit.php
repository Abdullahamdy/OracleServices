<?php

namespace App\Http\Livewire\Applicants;

use App\Models\Cart;
use App\Models\Package;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplicantsEdit extends Component
{
    use WithFileUploads;
    public  $applicant=[] , $file;

    function mount($applicant_id)
    {
        $applicant = Cart::findOrFail($applicant_id);
        $this->applicant = $applicant->toArray();
    }

    public function update()
    {
        if (empty($this->applicant['file']) or is_string($this->applicant['file'])) {
            unset($this->applicant['file']);
        }

        if ($this->applicant['status'] == 5) {
            $this->validate([
                'applicant.reason_cancellation' => 'required_if:applicant.status,5|string|min:5|max:100|regex:/^[a-zA-Z-ا-ي]{1}/',
                'applicant.reason_cancellation_en' => 'required_if:applicant.status,5|string|min:5|max:100|regex:/^[a-zA-Z-ا-ي]{1}/',
            ]);
        } elseif($this->applicant['status'] == 3) {
            $this->validate([
                'applicant.text' => 'required_if:applicant.status,3|string|min:5|max:100|regex:/^[a-zA-Z-ا-ي]{1}/',
                'applicant.text_en' => 'required_if:applicant.status,3|string|min:5|max:100|regex:/^[a-zA-Z-ا-ي]{1}/',
                'applicant.file' => 'nullable|mimes:pdf,jpeg,jpg,png,doc,docx|max:10000',
            ]);
        }

        $this->validate([
            'applicant.status' => 'required',
        ]);

        if (!empty($this->applicant['file']) and !is_string($this->applicant['file'])) {
            $this->applicant['file'] = $this->applicant['file']->store('Data/'.$this->id);
        }
        unset($this->applicant['created_at']);
        unset($this->applicant['updated_at']);

        $applicant = Cart::where('id',$this->applicant['id'])->update($this->applicant);

        $this->emit('alertSuccess');
        $this->emit('refreshApplicants');
        $this->emit('refreshAllApplicantsAdmin');
        $this->redirect(route('admin.applicants'));
    }

    public function render()
    {
        $status = $this->applicant['status'] == 3;
        $status4 = $this->applicant['status'] == 5;
        return view('livewire.applicants.applicants-edit',compact('status','status4'));
    }
}
