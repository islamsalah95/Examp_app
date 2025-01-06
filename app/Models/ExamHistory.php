<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamHistory extends Model
{
    use HasFactory , Searchable;
    protected $fillable = [
        'exam_session_id',
        'exam_question_id',
        'exam_answer_id'
    ];

    /**
     * Get the exam session associated with the exam history.
     */
    public function examSession()
    {
        return $this->belongsTo(ExamSession::class, 'exam_session_id');
    }

    /**
     * Get the exam question associated with the exam history.
     */
    public function examQuestion()
    {
        return $this->belongsTo(Question::class, 'exam_question_id');
    }

    /**
     * Get the exam answer associated with the exam history.
     */
    public function examAnswer()
    {
        return $this->belongsTo(Answer::class, 'exam_answer_id');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
    
        // Only return specific fields for indexing
        return [
            'total_questions' => $this->total_questions,
        ];
    }
}
