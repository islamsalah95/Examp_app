<?php
namespace App\Http\Controllers\API;
use App\Models\Chapter;
use App\Http\Controllers\Controller;

class ApiChapterController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index($subject)
    {
        try {
            $exams = Chapter::where('subject_id',$subject)->paginate(self::PAGINATE);
            return $this->apiResponse->success($exams, 'Chapter fetched successfully');
        } catch (\Exception $e) {
            return $this->apiResponse->serverError($e->getMessage());
        }
       
    }



}
