<?php

namespace Modules\AreaModule\Transformers;
use Modules\ConfigModule\Entities\Config;

use Illuminate\Http\Resources\Json\Resource;

class ZoneResource extends Resource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

      // $fixed_shipping=Config::where('var','shipping_price')->first();
      //
      // if($this->shipping_type==1)
      // $shipping_price=$fixed_shipping->value+$this->shipping_quota;
      // else
      // $shipping_price=$fixed_shipping->value-$this->shipping_quota;

        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'name' => $this->name.'( تكلفة شحن  '.$shipping_price.' ريال )',
            'ar' => $this->translate('ar'),
            'en' => $this->translate('en'),
        ];
    }
}
