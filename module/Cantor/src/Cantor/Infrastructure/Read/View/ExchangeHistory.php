<?php

namespace Cantor\Infrastructure\Read\View;

use Cantor\Application\Cqrs\Query\GetExchangeHistoryQuery;

class ExchangeHistory
{
    public function getHistory(GetExchangeHistoryQuery $argument1)
    {
        return array(array('id'=>1,'numer_konta'=>'test'));
    }
}
