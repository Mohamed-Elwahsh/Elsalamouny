<?php

namespace Modules\NewsModule\Repository;

use Modules\NewsModule\Entities\Category;


class CategoryRepository
{

    static function findAll()
    {
        $cat = Category::with('translations')->get();

        return $cat;
    }

    static function find($id)
    {
        $cat = Category::where('id', $id)->with('translations')->first();

        return $cat;
    }
    static function findWhere($att,$value)
    {
        $cat = Category::where($att, $value)->with('translations')->get();

        return $cat;
    }
    static function save($data)
    {
        $cat = Category::create($data);

        return $cat;
    }

    static function update($id, $data, $data_trans)
    {
        $cat = Category::find($id);
        $cat->update($data);

        foreach (\LanguageHelper::getLang() as $lang) {
            $cat->translate('' . $lang->lang)->title = $data_trans[$lang->lang]['title'];

            $cat->save();
        }
        return $cat;

    }

    static function delete($cat)
    {
        Category::destroy($cat->id);
    }

}
