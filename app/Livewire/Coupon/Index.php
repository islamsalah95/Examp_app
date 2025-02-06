<?php

namespace App\Livewire\Coupon;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public $status=1;

    public $select = 10;

    public function delete($couponId)
    {
        $user= Coupon::find($couponId); 
        $user->delete();
        $this->dispatch('del', message: __('share.message.delete'));
    }
    public function render()
    {
        if ($this->search) {
            $coupons = Coupon::where('is_active',$this->status)->search($this->search)->query(function ($query) {
                $query->with([
                    'user' ,
                    'subject' ,
                    'pricingPlan' ,
                ]); 
            })->paginate($this->select);
        } else {
            $coupons = Coupon::with(
                [
                    'user' ,
                    'subject' ,
                    'pricingPlan' ,
                ]
                )->where('is_active',$this->status)->paginate($this->select);
        }

        
        return view('livewire.coupon.index', ['coupons' => $coupons]);
    }

}
