<?php

namespace App\Livewire\ExamSession;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $userId;

    public $search;
    public $select = 10;

    public function delete()
    {
        $user= User::find($this->userId); 
        $user->delete();
        $this->dispatch('del', message: __('share.message.delete'));
    }
    public function render()
    {
        if ($this->search) {
            $users = User::where('id',$this->userId)->search($this->search)->query(function ($query) {
                $query->with(['examSessions' , 'examSessions.examHistories','examSessions.examHistories.examAnswer','examSessions.subject','examSessions.exams' ,'examSessions.chapters']); 
            })->paginate($this->select);
        } else {
            $users = User::with(['examSessions' , 'examSessions.examHistories','examSessions.examHistories.examAnswer','examSessions.subject'])->where('id',$this->userId)->paginate($this->select);
        }

        
        return view('livewire.exam-session.index', ['users' => $users]);
    }


}
