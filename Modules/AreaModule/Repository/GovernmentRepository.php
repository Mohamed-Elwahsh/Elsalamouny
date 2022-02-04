<?php

namespace Modules\AreaModule\Repository;

use Modules\AreaModule\Entities\Government;


class GovernmentRepository
{

    static function findAll()
    {
        $govs = Government::with('translations')->get();

        return $govs;
    }

    static function find($id)
    {
        $gov = Government::where('id', $id)->with('translations')->first();

        return $gov;
    }
    static function findWhere($att,$value)
    {
        $gov = Government::where($att, $value)->with('translations')->get();

        return $gov;
    }
    static function save($data)
    {
        $gov = Government::create($data);

        return $gov;
    }

    static function update($id, $data, $data_trans)
    {
        $gov = Government::find($id);
        $gov->update($data);

        foreach (\LanguageHelper::getLang() as $lang) {
            $gov->translate('' . $lang->lang)->name = $data_trans[$lang->lang]['name'];

            $gov->save();
        }
        return $gov;

    }

    static function delete($gov)
    {
        Government::destroy($gov->id);
    }

}
