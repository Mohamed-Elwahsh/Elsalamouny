<?php

namespace Modules\AreaModule\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AreaModule\Repository\CityRepository;
use Modules\AreaModule\Transformers\CityCollection;
use Modules\AreaModule\Transformers\CityResource;
use Modules\CommonModule\Helper\ApiResponseHelper;


class CityApiController extends Controller
{

    use ApiResponseHelper;

    public function index($type){
        $city=CityRepository::findWhereType($type);

        if($city && $city->count()>0){
            $city=new CityCollection($city);
            return $this->setData($city)->setCode(200)->send();
        }
        else{
            return $this->setError('No City Found')->setCode(404)->send();
        }
    }

    function getAllCity()
    {
      $city=CityRepository::findAll();
      if($city && $city->count()>0){
          $city=new CityCollection($city);
          return $this->setData($city)->setCode(200)->send();
      }
      else{
          return $this->setError('No City Found')->setCode(404)->send();
      }

    }

}
