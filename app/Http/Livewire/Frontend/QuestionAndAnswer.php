<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\QuestionsAnswers;
class QuestionAndAnswer extends Component
{
    public $questionandanswer;
    public function mount(){
        $this->questionandanswer = QuestionsAnswers::all();
    }
    public function render()
    {
        return view('livewire.frontend.question-and-answer');
    }
}
