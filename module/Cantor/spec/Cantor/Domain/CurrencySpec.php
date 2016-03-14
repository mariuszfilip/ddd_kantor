<?php

namespace spec\Cantor\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Cantor\Domain\Exception\CurrencyNotCorrectException;

class CurrencySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Domain\Currency');
    }

    function let(){
        $this->beConstructedWith('PLN');
    }

    function it_is_throw_if_currency_is_not_correct(){

        $this->shouldThrow(new CurrencyNotCorrectException())->during('__construct',array('PL'));
        $this->shouldThrow(new CurrencyNotCorrectException())->during('__construct',array(132));
    }


    function it_is_return_correct_short_name_currency(){
        $this->getCode()->shouldReturn('PLN');
    }
}
