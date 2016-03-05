<?php

namespace spec\Cantor\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailSpec extends ObjectBehavior
{

    function let(){
        $this->beConstructedWith($email = 'mariusz24245@gmail.com');
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Domain\Email');
    }

    function it_is_get_email_correct(){
        $this->getEmail()->shouldReturn('mariusz24245@gmail.com');
    }

    function it_is_object_to_string_return_email(){
        $this->__toString()->shouldReturn('mariusz24245@gmail.com');
    }
}
