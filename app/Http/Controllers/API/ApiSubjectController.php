<?php
namespace App\Http\Controllers\API;
use App\Models\Subject;
use App\Http\Controllers\Controller;

class ApiSubjectController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $exams = Subject::paginate(self::PAGINATE);
            return $this->apiResponse->success($exams, 'Subject fetched successfully');
        } catch (\Exception $e) {
            return $this->apiResponse->serverError($e->getMessage());
        }
       
    }



}
