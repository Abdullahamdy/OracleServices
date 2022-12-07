<?php

namespace App\Http\Livewire\CustomReviews;

use Livewire\Component;
use App\Models\Notification;
use App\Models\Attachment;
use Livewire\WithFileUploads;
use App\Models\CustomerReview;
class EditCustomReview extends Component
{

    use WithFileUploads;
    public $review=[];
    public function mount($review_id){
        $review = CustomerReview::findOrFail($review_id);
        $this->review = $review->toArray();

        
    }

    public function CustomerReviewEditOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }


    public function update(){
        $data = $this->validate([
            'review.name' => 'required|string|min:5|max:30|unique:operations_services,name',
            'review.path' => 'required|image|mimes:jpeg,png,jpg',
            'review.work' => 'required|string',
            'review.rating' => 'required|string',
            'review.text' => 'required|string',
 
        ]);
        if (empty($this->review['path']) || $this->review['path'] == "") {
            if (!empty($this->review['path'])) {
                unset($this->review['path']);
            }
        }
        $review = CustomerReview::find($this->review['id']);
        $review->update($this->review);
        $message_ar = 'تم تعديل بيانات العميل' . ' ' . '('.$review['name'].')';
        $notification = Notification::where('customer_review_id', $review['id']);
        $notification->update([
            'title' => $review['name'],
            'title_en' => $review['name'],
            'message' => $message_ar,
            'message_en' => $message_ar,
            'user_id' => auth()->id(),
        ]);
        if (!empty($this->review['path'])) {
            $file = $this->review['path']->store('attachments', 'public');
            Attachment::create([
                'path' => $file,
                'customer_review_id' => $review['id'],
            ]);
        }
    
        $this->emit('alertSuccess');
        $this->emit('refreshReviewAdmin');
       
        return redirect()->back();
        

    }



    public function render()
    {
        return view('livewire.custom-reviews.edit-custom-review');
    }
}
