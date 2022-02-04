<?php

namespace Modules\AreaModule\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ZoneCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return ZoneResource::collection($this->collection);
    }
}
