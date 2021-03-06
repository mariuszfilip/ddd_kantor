<?php

namespace spec\Cantor\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Cantor\Domain\Exception\NameNotCorrectException;

class NameSpec extends ObjectBehavior
{

    function let(){
        $this->beConstructedWith('Mariusz','Filipkowski');
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Domain\Name');
    }

    function it_is_get_name_and_surname_correct(){

        $this->beConstructedWith('Mariusz','Filipkowski');

        $this->getName()->shouldReturn('Mariusz');
        $this->getSurname()->shouldReturn('Filipkowski');
        $this->getName()->shouldBeString();
        $this->getSurname()->shouldBeString();
    }

    function it_is_throw_if_name_or_surname_is_short_then_2_letters(){
        $this->shouldThrow(new NameNotCorrectException())->during('__construct',array('M','atest'));
        $this->shouldThrow(new NameNotCorrectException())->during('__construct',array('Ma','a'));
    }



}
