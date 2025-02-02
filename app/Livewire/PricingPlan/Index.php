<?php

namespace App\Livewire\PricingPlan;

use Livewire\Component;
use App\Models\PricingPlan;

class Index extends Component
{
    public $search;
    public $select = 10;

    public $subject;
    public function delete($id)
    {
        $pricingPlan= PricingPlan::find($id); // Retrieve the Advantage record
        $pricingPlan->delete();
        $this->dispatch('del', message: __('share.message.delete'));
    }
    public function render()
    {
        if ($this->search) {
            $pricingPlans = PricingPlan::search($this->search)->paginate($this->select);
        } else {
            $pricingPlans = PricingPlan::paginate($this->select);
        }
        
        
        return view('livewire.pricing-plan.index', ['pricingPlans' => $pricingPlans]);
    }


}
