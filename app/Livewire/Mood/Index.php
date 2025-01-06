<?php

namespace App\Livewire\mood;

use App\Models\Mood;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public $select = 10;

    public function delete($id)
    {
        $mood= Mood::find($id); // Retrieve the Advantage record
        $mood->delete();
        $this->dispatch('del', message: __('share.message.delete'));
    }
    public function render()
    {
        if ($this->search) {
            $moods = Mood::search($this->search)->paginate($this->select);
        } else {
            $moods = Mood::paginate($this->select);
        }
        
        
        return view('livewire.mood.index', ['moods' => $moods]);
    }
}
