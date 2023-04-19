<?php

namespace App\Http\Resources\Manager;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SearchCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item, $key) {
            return ['key' => $item->id, 'value' => $item->name];
        })->toArray();
    }
}
