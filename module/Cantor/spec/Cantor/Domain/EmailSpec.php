<?php

namespace spec\Cantor\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Domain\Email');
    }
}
