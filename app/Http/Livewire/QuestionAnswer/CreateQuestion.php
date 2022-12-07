<?php

namespace App\Http\Livewire\QuestionAnswer;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Str;
use App\Models\QuestionsAnswers;
class CreateQuestion extends Component
{
    public $question;
   
    public function render()
    {
        return view('livewire.question-answer.create-question');
    }


    public function ProjectCreateOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }
    public function store()
    {
        $data = $this->validate([
            'question.question' => 'required|string|min:5|max:1000',
            'question.answer' => 'required|string|min:5|max:1000',
 
        ]);
        
   
        $this->token = str::random(20);
        $questionandanswer = QuestionsAnswers::create($data['question']);
        $message_en = 'A new Question And Answer has been added' . ' ' . '('.$questionandanswer->name.')';
        $this->emit('alertSuccess');
        Notification::create([
            'title' => $questionandanswer->name,
            'message' => $message_en,
            'message_en' => $message_en,
            'user_id' => auth()->id(),
            'question_id' => $questionandanswer->id,
            'token' => $this->token,
        ]);
        unset($this->questionandanswer);
        $this->emit('refreshQuestionAdmin');
        return $this->redirect(route('admin.admin'));
    }

}
