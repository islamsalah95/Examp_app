<?php
namespace App\Http\Controllers\API;
use App\Models\Exam;
use App\Http\Controllers\Controller;

class ApiExamController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index($chapter)
    {
        try {
            $exams = Exam::where('chapter_id',$chapter)->paginate(self::PAGINATE);
            return $this->apiResponse->success($exams, 'Exams fetched successfully');
        } catch (\Exception $e) {
            return $this->apiResponse->serverError($e->getMessage());
        }
       
    }



}
