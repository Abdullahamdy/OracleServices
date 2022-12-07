<?php

namespace App\Http\Livewire\CustomReviews;
use App\Models\CustomerReview;
use Livewire\Component;
use App\Models\Notification;
class DeleteCustomReview extends Component
{
    public $review ; 
    function mount($review_id)
    {
        $review = CustomerReview::findOrFail($review_id);
        $this->review = $review->toArray();
    }

    public function delete()
    {
        $review = CustomerReview::where('id',$this->review['id'])->delete();
         $notification = Notification::where('customer_review_id', $this->review['id'])->delete();

        $this->emit('alertSuccess', __('Operation removed successfully'));
        $this->emit('refreshReviewAdmin');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.custom-reviews.delete-custom-review');
    }
}
