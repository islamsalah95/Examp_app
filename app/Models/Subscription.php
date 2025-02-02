<?php

namespace App\Models;

use Carbon\Carbon;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory, Searchable;
    protected $primaryKey = 'id'; // If your primary key is not 'id', set it here

    protected $fillable = [
        'user_id',
        'subject_id',
        'pricing_plan_id',
        'discount',
        'expires_at',
        'created_at'
    ];

    /**
     * Get the user that owns the subscription.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    
    /**
     * Get the pricing plan for the subscription.
     */
    public function pricingPlan()
    {
        return $this->belongsTo(PricingPlan::class);
    }

    public function expiresAt()
    {
        // Get the created_at timestamp
        $created_at = $this->created_at;
        // Get the period type (weeks or months) and period count
        $period_type = $this->pricingPlan->period_type; // enum('weeks', 'months')
        $period_count = $this->pricingPlan->period_count; // number of weeks or months
        // Use Carbon to calculate the expiration date
        $expiresAt = Carbon::parse($created_at);
        // Add the period based on the period_type
        if ($period_type === 'weeks') {
            $expiresAt->addWeeks($period_count);
        } elseif ($period_type === 'months') {
            $expiresAt->addMonths($period_count);
        }
        return $expiresAt;
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $userName = $this->user ? $this->user->name : null;
        $subject = $this->subject ? $this->subject->name : null;
        $pricingPlan = $this->pricingPlan ? $this->pricingPlan->name : null;

        // Only return specific fields for indexing
        return [
            'user_id' => $userName,
            'subject_id' => $subject,
            'pricing_plan_id' => $pricingPlan,
            'discount' => $this->discount,
            'expires_at' => $this->expires_at,
        ];
    }
}
