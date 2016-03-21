<?php

namespace spec\Cantor\Domain;

use Cantor\Domain\Exception\FloatException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AmountSpec extends ObjectBehavior
{
    function let(){
        $fAmount = 3.50;
        $this->beConstructedWith($fAmount);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Domain\Amount');
    }


    function it_is_get_correct_value(){
        $this->getValue()->shouldReturn(3.50);
    }

    function it_is_create_with_only_float(){
        $fAmount = 3.50;
        $this->beConstructedWith($fAmount);

        $fAmount = 3;
        $this->shouldThrow(new FloatException())->during('__construct',array($fAmount));
    }
}
