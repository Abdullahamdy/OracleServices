<?php

namespace App\Http\Livewire\QuestionAnswer;

use Livewire\Component;
use App\Models\QuestionsAnswers;
use App\Models\Notification;
use Illuminate\Support\Str;
class EditQuestion extends Component
{
       //
       public $question=[];
       public function mount($question_id){
           $questionmodel = QuestionsAnswers::findOrFail($question_id);
           $this->question = $questionmodel->toArray();
   
           
       }
       public function QuestionEditOpenModal() // model
       {
           $this->dispatchBrowserEvent('updateSelect2');
       }
   
       public function update(){
           $data = $this->validate([
               'question.question' => 'required|string|min:5|max:1000',
               'question.answer' => 'required|string|min:5|max:1000',
    
           ]);
          
           $questionandanswer = QuestionsAnswers::find($this->question['id']);
           $questionandanswer->update($this->question);
           $message_ar = 'تم تعديل السؤال' . ' ' . '('.$questionandanswer['name'].')';
           $notification = Notification::where('question_id', $questionandanswer['id']);
           $notification->update([
               'title' => $questionandanswer['name'],
               'title_en' => $questionandanswer['name'],
               'message' => $message_ar,
               'message_en' => $message_ar,
               'user_id' => auth()->id(),
           ]);

           $this->emit('alertSuccess');
           $this->emit('refreshQuestionAdmin');
        

   
   
       }


    public function render()
    {
        return view('livewire.question-answer.edit-question');
    }
}
