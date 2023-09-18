<?php

namespace OmidSandi\Statistics;

use Illuminate\Support\Facades\Facade;
class StatisticsFacade extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'statistics';
    }
}
