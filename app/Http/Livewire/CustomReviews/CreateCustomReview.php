<?php

namespace App\Http\Livewire\CustomReviews;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Attachment;
use App\Models\CustomerReview;

class CreateCustomReview extends Component
{
    use WithFileUploads;
    public $review;
    public function ProjectCreateOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }

    public function store()
    {
        $data = $this->validate([
            'review.name' => 'required|string|min:5|max:30|unique:operations_services,name',
            'review.path' => 'required|image|mimes:jpeg,png,jpg',
            'review.work' => 'required|string',
            'review.rating' => 'required|string',
            'review.text' => 'required|string',
 
        ]);
        
   
        $this->token = str::random(20);
        $review = CustomerReview::create($data['review']);
        if (!empty($this->review['path'])) {
            $file = $this->review['path']->store('attachments', 'public');
            Attachment::create([
                'path' => $file,
                'customer_review_id' => $review->id,
            ]);
            
        }
        $message_en = 'A new operationservece has been added' . ' ' . '('.$review->name.')';
        $this->emit('alertSuccess');
        Notification::create([
            'title' => $review->name,
            'message' => $message_en,
            'message_en' => $message_en,
            'user_id' => auth()->id(),
            'operation_servic_id' => $review->id,
            'token' => $this->token,
        ]);
        unset($this->review);
        $this->emit('refreshReviewAdmin');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.custom-reviews.create-custom-review');
    }

   
}
