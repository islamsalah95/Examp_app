<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\Question;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chapter extends Model
{
    use HasFactory , Searchable;
    protected $fillable = ['name', 'subject_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        // Only return specific fields for indexing
        return [
             'id' => $this->id,
            'name' => $this->name,
            'subject_id' => $this->subject->name, 
        ];
    }
}
