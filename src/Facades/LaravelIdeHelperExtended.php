<?php

namespace Wasinpwg\LaravelIdeHelperExtended\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wasinpwg\LaravelIdeHelperExtended\LaravelIdeHelperExtended
 */
class LaravelIdeHelperExtended extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Wasinpwg\LaravelIdeHelperExtended\LaravelIdeHelperExtended::class;
    }
}
