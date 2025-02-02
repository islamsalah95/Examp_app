<?php

namespace App\Livewire\Exam;

use App\Models\Exam;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public $select = 10;

    public function delete($id)
    {
        $Subject= Exam::find($id); // Retrieve the Advantage record
        $Subject->delete();
        $this->dispatch('del', message: __('share.message.delete'));
    }
    public function render()
    {
        if ($this->search) {
            $exams = Exam::search($this->search)->query(function ($query) {
                $query->with('chapter'); // Include the relationship
            })->paginate($this->select);
        } else {
            $exams = Exam::with('chapter')->paginate($this->select);
        }
        
        return view('livewire.exam.index', ['exams' => $exams]);
    }

}
