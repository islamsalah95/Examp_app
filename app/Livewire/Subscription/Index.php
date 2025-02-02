<?php

namespace App\Livewire\Subscription;

use Livewire\Component;
use App\Models\Subscription;

class Index extends Component
{
    public $search;
    public $select = 10;

    public function delete($id)
    {
        $Subject= Subscription::find($id); // Retrieve the Advantage record
        $Subject->delete();
        $this->dispatch('del', message: __('share.message.delete'));
    }
    public function render()
    {
        if ($this->search) {
            $subscriptions = Subscription::search($this->search)->query(function ($query) {
                $query->with('pricingPlan','subject','user'); // Include the relationship
            })->paginate($this->select);
        } else {
            $subscriptions = Subscription::with('pricingPlan','subject','user')->paginate($this->select);
        }
        
        return view('livewire.subscription.index', ['subscriptions' => $subscriptions]);
    }

}
