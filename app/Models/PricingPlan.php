<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PricingPlan extends Model
{
    use HasFactory , Searchable ;

    protected $fillable = ['name','period_count','period_type','status','price','discount','free_trial','subject_id'];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    
    
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return [
            'name' => $this->name,
            'period_count' => $this->period_count,
            'period_type' => $this->period_type,
            'status' => $this->status,
            'price' => $this->price, 
            'discount' => $this->discount, 
            'free_trial' => $this->free_trial, 
        ];
    }

    

}
