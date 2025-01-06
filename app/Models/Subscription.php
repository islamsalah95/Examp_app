<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'user_id',
        'pricing_plan_id',
        'months',
        'discount',
        'expires_at',
    ];

    /**
     * Get the user that owns the subscription.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the pricing plan for the subscription.
     */
    public function pricingPlan()
    {
        return $this->belongsTo(PricingPlan::class, 'pricing_plan_id');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $userName = $this->user ? $this->user->name : null;

        // Only return specific fields for indexing
        return [
            'plan' => $this->plan,
            'months' => $this->months,           
            'expires_at' => $this->expires_at,
            'user_id' => $userName,

        ];
    }
}
