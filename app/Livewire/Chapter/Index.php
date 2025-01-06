<?php

namespace App\Livewire\Chapter;

use App\Models\Chapter;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public $select = 10;

    public function delete($id)
    {
        $chapter= Chapter::find($id); // Retrieve the Advantage record
        $chapter->delete();
        $this->dispatch('del', message: __('share.message.delete'));
    }
    public function render()
    {
        if ($this->search) {
            $chapters = Chapter::search($this->search)->query(function ($query) {
                $query->with('subject'); // Include the relationship
            })->paginate($this->select);
        } else {
            $chapters = Chapter::with('subject')->paginate($this->select);
        }
        
        
        return view('livewire.chapter.index', ['chapters' => $chapters]);
    }

}
