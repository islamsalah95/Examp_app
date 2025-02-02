<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    
    use AuthorizesRequests, ValidatesRequests;

    protected $apiResponse;


    protected const PAGINATE = 10;

    public function __construct(ApiResponseService $apiResponse)
    {
        $this->apiResponse = $apiResponse;
    }

}
