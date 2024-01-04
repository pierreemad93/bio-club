<?php

namespace App\Livewire\Quizz;

use App\Models\Grade;
use App\Models\Quizz;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Filament\Notifications\Notification;

class QuizzCreateComponent extends Component
{
    use WithFileUploads;

    #[Validate('required|numeric')]
    public $lo;
    #[Validate('required|min:3|max:255')]
    public $question;
    #[Validate('required')]
    public $correct_answer;
    #[Validate('required')]
    public $grade_id;
    public $grades;
    #[Validate([
        'answers' => 'required' , 
    ])] 
    public array $answers  = [
        1  => '',
    ];
    #[Validate('nullable')]
    public $image;
    public function mount()
    {
        $this->grades = Grade::all();
    }
    public function render()
    {
        return view('livewire.quizz.quizz-create-component');
    }

    public function addAnotherAnswer($key): void
    {
        if ($key !== 4) {
            $this->answers = collect($this->answers)->push("")->toArray();
        }
    }
    public function removeAnswer($key): void
    {
        if ($key  == 4) {
            $this->answers = collect($this->answers)->forget($key)->toArray();
        }
    }
    public function addQuestion(): void
    {
        $validated = $this->validate();
        // dd($validated);
        // $quizz =  Quizz::create($validated);
        $quizz =  Quizz::create([
            'lo' => $this->lo, 
            'question' => $this->question ,
            'answer_1' => $this->answers[1] ,
            'answer_3' => $this->answers[2] ,
            'answer_3' => $this->answers[3] ,
            'answer_4' => $this->answers[4] , 
            'grade_id' => $this->grade_id , 
            'correct_answer' => $this->correct_answer
        ]);
        $quizz->addMedia($this->image)->toMediaCollection();
        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }
}
