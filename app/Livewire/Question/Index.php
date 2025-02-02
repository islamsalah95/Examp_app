<?php

namespace App\Livewire\Question;

use Livewire\Component;
use App\Models\Question;

class Index extends Component
{
    public $search;
    public $select = 10;

    public function delete($id)
    {
        $question = Question::find($id); // Retrieve the Question record
    
        if ($question) {
            // Delete all associated answers
            $question->answers()->delete(); // Use the relationship method to perform a batch delete
    
            // Delete the question
            $question->delete();
    
            // Dispatch success message
            $this->dispatch('del', message: __('share.message.delete'));
        } else {
            // Optionally handle the case where the question is not found
            $this->dispatch('error', message: __('share.message.not_found'));
        }
    }
    
    public function render()
    {
        if ($this->search) {
            $questions = Question::search($this->search)->query(function ($query) {
                $query->with('exam'); // Include the relationship
            })->paginate($this->select);
        } else {
            $questions = Question::with('exam')->paginate($this->select);
        }
        
        
        return view('livewire.question.index', ['questions' => $questions]);
    }


}
