<?php

namespace spec\Cantor\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


use Cantor\Domain\Exception\NumberAccountNotCorrectException;

class NumberAccountSpec extends ObjectBehavior
{

    function let(){
        $sNumerKonta = '89876210220035800030000010';
        $this->beConstructedWith($sNumerKonta);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Domain\NumberAccount');
    }
    function it_is_throw_for_account_not_have_26_characters(){
        $this->shouldThrow(new NumberAccountNotCorrectException())->during('__construct',array('123123123123'));
    }
    function it_is_return_number_for_correct_account(){
        $sNumerKonta = '89876210220035800030000010';
        $this->beConstructedWith($sNumerKonta);
        $this->getNumber()->shouldReturn($sNumerKonta);
    }

    function it_is_correct_account_with_space(){
        $sNumerKonta = '89 8762 1022 0035 8000 3000 0010';
        $sNumerKontaWithoutSpace = '89876210220035800030000010';
        $this->beConstructedWith($sNumerKonta);
        $this->getNumber()->shouldReturn($sNumerKontaWithoutSpace);
    }
}
