<?php

namespace Modules\AreaModule\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AreaModule\Repository\ZoneRepository;
use Modules\AreaModule\Transformers\ZoneCollection;
use Modules\AreaModule\Transformers\ZoneResource;
use Modules\CommonModule\Helper\ApiResponseHelper;


class ZoneApiController extends Controller
{

    use ApiResponseHelper;

    public function index()
    {
        $zone = ZoneRepository::findAll();
        if ($zone && $zone->count() > 0) {
            $zone = new ZoneCollection($zone);
            return $this->setData($zone)->setCode(200)->send();
        } else {
            return $this->setError('No District Found')->setCode(404)->send();
        }
    }

    public function findZone($city_id,$search_word="")
    {

        if($search_word==""){
            $zone = ZoneRepository::findWhere('city_id', $city_id,$search_word);
        }else{
            $zone = ZoneRepository::findWhere('city_id', $city_id,$search_word);
        }

        if ($zone && $zone->count() > 0) {
            $zone = new ZoneCollection($zone);
            return $this->setData($zone)->setCode(200)->send();
        } else {
            return $this->setCode(200)->send();
        }
    }

}
