<?php
//
//namespace App\Http\Livewire\Applicants;
//
//use App\Models\Cart;
//use App\Models\Package;
//use Carbon\Carbon;
//use Livewire\Component;
//use Livewire\WithFileUploads;
//
//class StatusActiveEdit extends Component
//{
//    use WithFileUploads;
//    public  $applicant=[] , $file, $imageTemp;
//
//    function mount($applicant_id)
//    {
//        $applicant = Cart::findOrFail($applicant_id);
//        $this->applicant = $applicant->toArray();
//    }
//
//    public function update()
//    {
//        if (empty($this->applicant['file']) or is_string($this->applicant['file'])) {
//            unset($this->applicant['file']);
//        }
//
//        $this->validate([
//            'applicant.status' => 'required',
//            "applicant.text"    => "required_if:applicant.status,3",
//            'applicant.reason_cancellation' => '',
//            'applicant.file' => 'nullable|mimes:pdf,jpeg,jpg,png,doc,docx|max:10000',
//        ]);
//
//        if (!empty($this->applicant['file']) and !is_string($this->applicant['file'])) {
//            $this->applicant['file'] = $this->applicant['file']->store('Data/'.$this->id);
//        }
//        unset($this->applicant['created_at']);
//        unset($this->applicant['updated_at']);
//
//        $package = Package::find($this->applicant['package_id']);
//
//        if ($package){
//            $this->applicant['end_date'] = Carbon::now()->addDays($package->days);
//        }
//
//        $applicant = Cart::where('id',$this->applicant['id'])->update($this->applicant);
//
//        $this->emit('alertSuccess');
//        $this->emit('refreshApplicants');
//        $this->emit('refreshAllApplicantsAdmin');
//        $this->emit('refreshData');
//        $this->emit('refreshShow');
//    }
//
//    public function render()
//    {
//        $status = $this->applicant['status'] == 3;
//        $status4 = $this->applicant['status'] == 5;
//        return view('livewire.applicants.status-active-edit',compact('status','status4'));
//    }
//}
