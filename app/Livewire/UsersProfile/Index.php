<?php

namespace App\Livewire\UsersProfile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;
    public $select = 10;

    public function delete($id)
    {
        $user= User::find($id); 
        $user->delete();
        $this->dispatch('del', message: __('share.message.delete'));
    }
    public function render()
    {
        if ($this->search) {
            $users = User::search($this->search)->query(function ($query) {
                $query->with('subscriptions','subscriptions.subject','subscriptions.pricingPlan'); 
            })->paginate($this->select);
        } else {
            $users = User::with('subscriptions','subscriptions.subject','subscriptions.pricingPlan')->paginate($this->select);
        }
        
        return view('livewire.users-profile.index', ['users' => $users]);
    }

}
