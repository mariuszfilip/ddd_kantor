<?php

namespace spec\Cantor\Infrastructure\Read\View;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Cantor\Application\Cqrs\Query\GetExchangeHistoryQuery;

class ExchangeHistorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Infrastructure\Read\View\ExchangeHistory');
    }

    function it_is_get_all_history_with_filter(GetExchangeHistoryQuery $query){

        $aShouldReturn  = array(array('id'=>1,'numer_konta'=>'test'));

        $this->getHistory($query->getWrappedObject())->shouldReturn($aShouldReturn);
    }
}
