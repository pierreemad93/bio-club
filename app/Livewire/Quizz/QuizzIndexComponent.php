<?php

namespace App\Livewire\Quizz;

use App\Models\Grade;
use App\Models\Quizz;
use Livewire\Component;

class QuizzIndexComponent extends Component
{
    public $quizzs;
    public $search;
    public $grades;
    public $grade;
    public $los;
    public $lo;
    public function mount()
    {
        $this->los = Quizz::select('lo')
            ->groupBy('lo')
            ->get()
            ->toArray();
        $this->grades = Grade::get();
    }
    public function render()
    {
        $this->quizzs = Quizz::where('question', 'like', '%' . $this->search . '%')
            ->grade($this->grade)
            ->lo($this->lo)
            ->get();
        return view('livewire.quizz.quizz-index-component', ['quizz' => $this->quizzs]);
    }
}
