<?php

namespace Fliq\UniqueLaravel\Facades;

use Fliq\Unique\Collections;
use Fliq\Unique\Tokens;
use Fliq\Unique\UniqueClient;
use Illuminate\Support\Facades\Facade;

/**
 * @method Collections collections()
 * @method Tokens tokens()
 * @method UniqueClient client()
 */
class Unique extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'unique';
    }
}
