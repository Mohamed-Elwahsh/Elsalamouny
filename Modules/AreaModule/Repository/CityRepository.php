<?php

namespace Modules\AreaModule\Repository;

use Modules\AreaModule\Entities\City;


class CityRepository
{
    static function find($id)
    {
        $city = City::where('id', $id)->with(['translations','government'])->first();

        return $city;
    }

    static function findAll()
    {
        $cities = City::with(['translations','government'])->get();

        return $cities;
    }

    static function findWhereType($type)
    {
      if($type == 'shipping')
        $city=City::where('type',1)->get();
      else
        $city=City::whereIn('type',[1,2])->get();
        return $city;
    }

    static function findWhere($att,$value)
    {
        $city = City::where($att, $value)->with('translations')->get();

        return $city;
    }
    static function save($data)
    {
        $city = City::create($data);

        return $city;
    }

    static function update($id, $data, $data_trans)
    {
        $city = City::find($id);
        $city->update($data);

        foreach (\LanguageHelper::getLang() as $lang) {
            $city->translate('' . $lang->lang)->name = $data_trans[$lang->lang]['name'];

            $city->save();
        }
        return $city;

    }

    static function delete($city)
    {
        City::destroy($city->id);
    }
}
