<?php

namespace App\Models;

use App\Models\Question;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model implements HasMedia
{
    use HasFactory, Searchable , InteractsWithMedia;

    protected $fillable = ['answer_text', 'is_correct', 'question_id','description'];


    public function toSearchableArray()
    {
        $array = $this->toArray();
    
        // Only return specific fields for indexing
        return [
            'id' => $this->id,
            'answer_text' => $this->answer_text,
            'is_correct' => $this->is_correct,
        ];
    }


    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
