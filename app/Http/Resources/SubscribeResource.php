<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class SubscribeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'subscribed_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
