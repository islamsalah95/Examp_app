<?php

namespace App\Livewire\Subject;

use App\Models\Subject;
use Livewire\Component;

class Index extends Component
{
    
    public $search;
    public $select = 10;

    public function delete($id)
    {
        $Subject= Subject::find($id); // Retrieve the Advantage record
        $Subject->delete();
        $this->dispatch('del', message: __('share.message.delete'));
    }
    public function render()
    {
        if ($this->search) {
            $subjects = Subject::search($this->search)->query(function ($query) {
                $query->with('pricingPlans'); // Include the relationship
            })->paginate($this->select);
        } else {
            $subjects = Subject::with('pricingPlans')->paginate($this->select);
        }
        
        
        return view('livewire.subject.index', ['subjects' => $subjects]);
    }


}
