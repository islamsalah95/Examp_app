<?php
namespace App\Http\Controllers\API;
use App\Models\Mood;
use App\Http\Controllers\Controller;

class ApiMoodController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $exams = Mood::paginate(self::PAGINATE);
            return $this->apiResponse->success($exams, 'Moods fetched successfully');
        } catch (\Exception $e) {
            return $this->apiResponse->serverError($e->getMessage());
        }
       
    }



}
