<?php
namespace App\Http\Controllers\API;
use App\Models\Question;
use App\Http\Controllers\Controller;

class ApiQuestionController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index($exam)
    {
        try {
            $exams = Question::where( 'exam_id',$exam)->paginate(self::PAGINATE);
            return $this->apiResponse->success($exams, 'Questions fetched successfully');
        } catch (\Exception $e) {
            return $this->apiResponse->serverError($e->getMessage());
        }
       
    }



}
