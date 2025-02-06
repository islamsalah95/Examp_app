<?php

namespace App\Http\Controllers\Web;

use App\Models\ExamSession;
use App\Http\Controllers\Controller;

class ExamSessionController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show( $examSession)
    {

        $examSession= ExamSession::with('examHistories' , 'examHistories.examQuestion','examHistories.examAnswer', 'examHistories.examQuestion.answers')->findOrFail($examSession);
        // return json_decode($examSession);
        
        return view('dash.web.exam-session.show',compact('examSession'));
        
        
    }
}
