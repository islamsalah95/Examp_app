<?php

namespace App\Models;

use App\Models\Mood;
use App\Models\User;
use App\Models\Subject;
use App\Models\ExamHistory;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamSession extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['user_id', 'mood_id', 'subject_id', 'exams', 'chapters', 'question_count', 'status'];

    protected $casts = [
        'exams' => 'array',
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

    public function examHistories()
    {
        return $this->hasMany(ExamHistory::class);
    }


    public function exams()
    {
        $arr = [];

        if (!$this->exams) {
            return $arr;
        }
        foreach ($this->exams as $key => $exam) {
            $arr[] = Exam::findOrFail($exam);
        }
        return $arr;
    }

    public function chapters()
    {
        $arr = [];
        if (!$this->chapters) {
            return $arr;
        }
        foreach ($this->chapters as $key => $chapter) {
            $arr[] = Chapter::findOrFail($chapter);
        }
        return $arr;
    }


    public function getTotalDegreeExamSession(){
        $results['total']=0;
        $results['answer']=0;
        $results['notAnswer']=0;
        $results['correct']=0;
        $results['incorrect']=0;
        $results['totalDegree']=0;
        $examHistories=ExamHistory::where('exam_session_id',$this->id)->get();
        foreach ($examHistories as $key => $examHistorie) {
            $examHistorie->exam_answer_id == null ? $results['notAnswer'] ++ : $results['answer'] ++ ;
            if ($examHistorie->exam_answer_id){
                $examHistorie->examAnswer->is_correct == 0 ? $results['incorrect'] ++ : $results['correct']++ ;
            } 
            $results['total'] ++ ;
        }

        $results['totalDegree']=   ($results['correct'] /  $results['total'] ) *100 ;

        return $results;

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
            'subject_id' => $subjectName,
            'question_count' => $this->question_count,
            'status' => $this->status,
        ];
    }
}
