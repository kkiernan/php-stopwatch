<?php

namespace Kiernan\Laravel;

use Illuminate\Support\Facades\Facade;

class StopwatchFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'stopwatch';
    }
}
