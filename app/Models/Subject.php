<?php

namespace App\Models;

use App\Models\Chapter;
use App\Models\ExamSession;
use App\Models\PricingPlan;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory , Searchable;
    protected $primaryKey = 'id'; // If your primary key is not 'id', set it here

    protected $fillable = ['name'];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function examSessions()
    {
        return $this->hasMany(ExamSession::class);
    }



    public function pricingPlans()
{
    return $this->hasMany(PricingPlan::class);
}

    public function toSearchableArray()
    {
        $array = $this->toArray();
    
        // Only return specific fields for indexing
        return [
            'name' => $this->name,
        ];
    }
    
}
