<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subject;
use App\Models\PricingPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;


    protected $fillable = [
        'code',
        'percent',
        'max_uses',
        'times_used',
        'is_active',
        'start_date',
        'end_date',
        'user_id',
        'subject_id',
        'pricing_plan_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function pricingPlan()
    {
        return $this->belongsTo(PricingPlan::class);
    }



}
