<?php

namespace Modules\ServiceModule\Repository;

use Modules\ServiceModule\Entities\ServiceCategory\ServiceCategory;


class ServiceCategoryRepository
{
  public function find($id)
  {
    $serviceCateg = ServiceCategory::where('id', $id)->first();

    return $serviceCateg;
  }

  public function findAll()
  {
    $serviceCategs = ServiceCategory::all();

    return $serviceCategs;
  }

  public function save($data)
  {
    
    $service = ServiceCategory::create($data);
    
    return $service;
  }

  public function update($id, $data)
  {
    $categ = ServiceCategory::find($id);

    foreach (\LanguageHelper::getLang() as $lang) {

      
            if ($categ->hasTranslation('' . $lang->lang)) {
            }else {
                 $categ->translateOrNew('' . $lang->lang);
                }

        if(isset($data[$lang->lang]['title'])) {
            $categ->translate('' . $lang->lang)->title = $data[$lang->lang]['title'];
            $categ->translate('' . $lang->lang)->description = $data[$lang->lang]['description'];
            $categ->translate('' . $lang->lang)->meta_title = $data[$lang->lang]['meta_title'];
            $categ->translate('' . $lang->lang)->meta_desc = $data[$lang->lang]['meta_desc'];
            $categ->translate('' . $lang->lang)->slug = $data[$lang->lang]['slug'];
            $categ->translate('' . $lang->lang)->meta_keywords = $data[$lang->lang]['meta_keywords'];
            $categ->save();
        }
    }
    return $categ;
  }

  public function delete($categ)
  {
    ServiceCategory::destroy($categ->id);
  }
}
