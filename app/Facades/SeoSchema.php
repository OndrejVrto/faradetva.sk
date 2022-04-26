<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SeoSchema extends Facade
{
    protected static function getFacadeAccessor() {
        return 'seo.schema-org';
    }
}
