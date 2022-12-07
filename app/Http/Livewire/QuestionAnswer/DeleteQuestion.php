<?php

namespace App\Http\Livewire\QuestionAnswer;

use Livewire\Component;
use App\Models\QuestionsAnswers;
use App\Models\Notification;
class DeleteQuestion extends Component
{
    public $question ; 

    function mount($question_id)
    {
        $question = QuestionsAnswers::findOrFail($question_id);
        $this->question = $question->toArray();
    }

    public function delete()
    {
        $questionandanswer = QuestionsAnswers::where('id',$this->question['id'])->delete();
         $notification = Notification::where('question_id', $this->question['id'])->delete();

        $this->emit('alertSuccess', __('Question removed successfully'));
        $this->emit('refreshQuestionAdmin');
        return redirect()->route('admin.admin');
    }
       //question_id
    public function render()
    {
        return view('livewire.question-answer.delete-question');
    }
}
