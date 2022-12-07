<?php

namespace App\Http\Livewire\QuestionAnswer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\QuestionsAnswers;
class QuestionAnswer extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshQuestionAdmin' => 'ActionRefreshQuestion'];

    public function mount()
    {
        if (request('search')){ 
            
            $this->search = request('search');
        }
    }
    public function ActionRefreshQuestion()
    {

    }

    public function refreshQuestion()
    {

    }
    public function render()
    {
        $question = QuestionsAnswers::query();
        if ($this->search) {
            $questions = $question->where(function ($q) {
                return $q->where('question', 'LIKE', "%$this->search%");       
            })->orWhere('answer','like',"%$this->search%");
           
        }
        $questions = $question->paginate(9);
        return view('livewire.question-answer.question-answer',compact('questions'));
    }
}
