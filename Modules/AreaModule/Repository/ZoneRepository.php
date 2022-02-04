<?php

namespace Modules\AreaModule\Repository;

use Modules\AreaModule\Entities\Zone;


class ZoneRepository
{
    static function find($id)
    {
        $zone = Zone::where('id', $id)->with(['translations', 'country', 'government', 'city'])->first();

        return $zone;
    }

    static function findAll()
    {
        $zone = Zone::with(['translations', 'country', 'government', 'city'])->get();

        return $zone;
    }

    static function findWhere($att, $value, $search_word)
    {
        $zone = Zone::whereTranslationLike('name', '%'.$search_word.'%')
                      ->with(['translations'])
                      ->where($att, $value)->get();

        return $zone;
    }

    static function save($data)
    {
        $zone = Zone::create($data);

        return $zone;
    }

    static function update($id, $data, $data_trans)
    {
        $zone = Zone::find($id);
        $zone->update($data);

        foreach (\LanguageHelper::getLang() as $lang) {
            $zone->translate('' . $lang->lang)->name = $data_trans[$lang->lang]['name'];

            $zone->save();
        }
        return $zone;

    }

    static function delete($zone)
    {
        Zone::destroy($zone->id);
    }


    static function findZonesWhere($att,$value)
    {
        $zones = Zone::where($att, $value)->with('translations')->get();

        return $zones;
    }


}
