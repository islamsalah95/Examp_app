<?php

namespace App\Models;

use App\Models\Mood;
use App\Models\User;
use App\Models\Subject;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamSession extends Model
{
    use HasFactory , Searchable;   
    protected $fillable = ['user_id', 'mood_id', 'subject_id', 'years', 'chapters', 'question_count', 'status'];

    protected $casts = [
        'years' => 'array',
        'chapters' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mood()
    {
        return $this->belongsTo(Mood::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
    
        $subjectName = $this->subject ? $this->subject->name : null;
           $userName = $this->user ? $this->user->name : null;
           $moodName = $this->mood ? $this->mood->name : null;

        // Only return specific fields for indexing
        return [
            'user_id' => $userName,
            'mood_id' => $moodName,
            'subject_id' => $subjectName ,
            'question_count' => $this->question_count,
            'status' => $this->status,
        ];
    }
}
