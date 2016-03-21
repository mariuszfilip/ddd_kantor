<?php

namespace spec\Cantor\Domain;

use Cantor\Domain\Exception\QuantityException;
use Cantor\Domain\ExchangeRate;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExchangeSummarySpec extends ObjectBehavior
{

    function let(ExchangeRate $exchangeRate){
        $this->beConstructedWith($exchangeRate->getWrappedObject(),12);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Domain\ExchangeSummary');
    }

    function it_is_ammount_operation_correct(ExchangeRate $exchangeRate){

        $exchangeRate->getCourse()->willReturn(3.00);
        $this->beConstructedWith($exchangeRate->getWrappedObject(),12);
        $this->getAmountSummary()->shouldReturn(36.00);
    }

    function it_is_quantity_larger_then_zero(ExchangeRate $exchangeRate){

        $this->shouldThrow(new QuantityException())->during('__construct',array($exchangeRate,0));
        $this->shouldThrow(new QuantityException())->during('__construct',array($exchangeRate,-1));
    }
}
