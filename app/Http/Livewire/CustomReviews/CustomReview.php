<?php

namespace App\Http\Livewire\CustomReviews;
use App\Models\CustomerReview;
use Livewire\Component;
use Livewire\WithPagination;
class CustomReview extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public $operationservece ; 
    protected $listeners = ['refreshReviewAdmin' => 'ActionRefreshReview'];

    public function ActionRefreshReview()
    {

    }
    public function refreshReview()
    {

    }
    public function render()
    {
        $review = CustomerReview::query();
        if ($this->search) {
            $reviews = $review->where(function ($q) {
                return $q->where('name', 'LIKE', "%$this->search%");       
            });
           
        }
        $reviews = $review->paginate(9);
        return view('livewire.custom-reviews.custom-review',compact('reviews'));
    }
}
