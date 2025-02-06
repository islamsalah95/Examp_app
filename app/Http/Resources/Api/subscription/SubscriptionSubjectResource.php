<?php
namespace App\Http\Resources\Api\subscription;



use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionSubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            "id" =>                    $this->id,
            "subject_id" =>            $this->subject,
            "pricing_plan_id" =>       $this->pricingPlan,
            "discount" =>              $this->discount,
            "expires_at" =>            $this->expires_at,
            "created_at" =>            $this->created_at,
            "updated_at" =>            $this->updated_at,
        ];
    }
}
