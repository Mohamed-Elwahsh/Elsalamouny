<?php

namespace Modules\CommonModule\Facades;

use Illuminate\Support\Facades\Facade;

class LanguageFacade extends Facade
{
  public static function getFacadeAccessor()
  {
    return 'LanguageHelper';
  }
}