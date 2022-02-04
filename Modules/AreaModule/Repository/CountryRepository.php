<?php

namespace Modules\AreaModule\Repository;

use Modules\AreaModule\Entities\Country;


/**
 * SliderRepository Class, will deal with all data of Slider,
 * Including its images and relations.
 */

class CountryRepository
{
    static function find($id)
    {
        $country = Country::where('id', $id)->first();

        return $country;
    }

    static function findAll()
    {
        $countrys = Country::with('translations')->get();

        return $countrys;
    }

    static function find_limit()
    {
        $countrys = Country::with('translations')->limit(4)->get();

        return $countrys;
    }

    static function save($data)
    {
        $country = Country::create($data);

        return $country;
    }

    static function update($id, $data, $data_trans)
    {
        $country = Country::find($id);
        $country->update($data);

        foreach (\LanguageHelper::getLang() as $lang) {
            $country->translate('' . $lang->lang)->name = $data_trans[$lang->lang]['name'];

            $country->save();
        }
        return $country;

    }

    static function delete($country)
    {
        Country::destroy($country->id);
    }

}
