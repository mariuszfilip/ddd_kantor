<?php

namespace spec\Cantor\Domain;

use Cantor\Domain\Amount;
use Cantor\Domain\Currency;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExchangeRateSpec extends ObjectBehavior
{
    function let(Currency $currency, Amount $amount){
        $this->beConstructedWith($currency->getWrappedObject(),$amount->getWrappedObject());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Domain\ExchangeRate');
    }

    function it_is_get_course(Currency $currency){
        $amount = new Amount(3.25);

        $this->beConstructedWith($currency->getWrappedObject(),$amount);

        $this->getCourse()->shouldReturn(3.25);
    }

    function it_is_get_currency_code_correct(Currency $currency, Amount $amount){
        $currency->getCode()->willReturn('PLN');

        $this->beConstructedWith($currency->getWrappedObject(),$amount->getWrappedObject());
        $this->getCurrencyCode()->shouldReturn('PLN');

    }
}
