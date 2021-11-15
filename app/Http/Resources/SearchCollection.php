<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Request;

class SearchCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'error' => null,
            'value' => $this->collection->map(function ($searchResult) {
                return [
                    'title' => $searchResult['title'],
                    'content' => $searchResult['content'],
                    'created_at' => Carbon::parse($searchResult['created_at'])->format('Y-m-d H:i:s'),
                    'source_name' => $searchResult['source']['name'],
                    'user_name' => $searchResult['user']['name'],
                    'instagram_id' => $searchResult['user']['instagram_id'],
                    'twitter_id' => $searchResult['user']['twitter_id'],
                ];
            })
        ];
    }
}
