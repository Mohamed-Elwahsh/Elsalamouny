<?php

namespace Modules\NewsModule\Repository;

use Modules\NewsModule\Entities\News;
use DB;


class NewsRepository
{

    static function findAll()
    {
        // $news = News::with('translations')->get();
        $news = News::with(['categories','categories.translations', 'translations'])->get();
        return $news;
    }

    static function find($id)
    {
        // $news = News::where('id', $id)->with('translations')->first();
        $news = News::where('id', $id)->with(['categories','categories.translations', 'translations'])->get()->first();
        return $news;
    }
    static function findWhere($att,$value)
    {
        $news = News::where($att, $value)->with('translations')->get();

        return $news;
    }
    static function save($data)
    {
        $news = News::create($data);

        return $news;
    }

    static function update($id, $data, $data_trans)
    {
        $news = News::find($id);
        $news->update($data);

        foreach (\LanguageHelper::getLang() as $lang) {
            $news->translate('' . $lang->lang)->title = $data_trans[$lang->lang]['title'];

            $news->save();
        }
        return $news;

    }

    static function delete($cat)
    {
        News::destroy($cat->id);
    }

}
