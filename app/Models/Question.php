<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Answer;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model implements HasMedia
{
    use HasFactory , Searchable , InteractsWithMedia;
    protected $fillable = ['question_text', 'description', 'summary', 'exam_id'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Only return specific fields for indexing
        return [
            'question_text' => $this->question_text,
            'description' => $this->description,
            'summary' => $this->summary,
            'exam_id' => $this->exam->name, 

        ];
    }
}
