<?php

namespace Modules\AreaModule\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class CityResource extends Resource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'ar' => $this->translate('ar'),
            'en' => $this->translate('en'),
//            'name' => $this->name,
        ];
    }
}
