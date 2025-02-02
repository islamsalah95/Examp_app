<?php

namespace App\Services\Api;

use App\Models\ExamHistory;





class ApiExamHistoryService
{
    private static ?self $instance = null;

    // Prevent instantiation
    private function __construct() {}

    // Implement singleton pattern
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function getTotalDegreeExamHistories($examSessionId){
        $results['total']=0;

        $results['answer']=0;
        $results['notAnswer']=0;

        $results['correct']=0;
        $results['incorrect']=0;

        $examHistories=ExamHistory::where('exam_session_id',$examSessionId)->get();
      
        foreach ($examHistories as $key => $examHistorie) {
            $examHistorie->exam_answer_id == null ? $results['notAnswer'] ++ : $results['answer'] ++ ;
            if ($examHistorie->exam_answer_id){
                $examHistorie->examAnswer->is_correct == 0 ? $results['incorrect'] ++ : $results['correct']++ ;
            } 
            $results['total'] ++ ;
        }

        return $results;

    }


}
