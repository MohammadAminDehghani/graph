<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Morilog\Jalali\Jalalian;

class CommentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'data' => $this->collection->map(function ($item){
                return [
                    'id' => $item->id,
                    'body' => $item->body,
                    'commentTime' => Jalalian::forge($item->created_at)->format('%B %D، %Y'),
                ];
            })
        ];
    }
}
