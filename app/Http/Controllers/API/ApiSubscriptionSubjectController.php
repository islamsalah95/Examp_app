<?php
namespace App\Http\Controllers\API;
use App\Models\Subscription;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\subscription\SubscriptionSubjectResource;

class ApiSubscriptionSubjectController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $subscriptions = Subscription::where('user_id', auth()->id())
            ->where('expires_at', '>', today())
            ->get();        
            return $this->apiResponse->success(SubscriptionSubjectResource::collection($subscriptions), 'subscriptions fetched successfully');
        } catch (\Exception $e) {
            return $this->apiResponse->serverError($e->getMessage());
        }
       
    }



}
