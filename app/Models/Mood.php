<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mood extends Model
{
    use HasFactory , Searchable;    
    protected $fillable = ['name'];

    public function examSessions()
    {
        return $this->hasMany(ExamSession::class);
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
