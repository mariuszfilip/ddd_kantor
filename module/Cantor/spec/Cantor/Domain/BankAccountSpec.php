<?php

namespace spec\Cantor\Domain;

use Cantor\Domain\NumberAccount;
use Cantor\Domain\Currency;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BankAccountSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Domain\BankAccount');
    }

    function let(){
        $this->beConstructedWith(new NumberAccount('89 8762 1022 0035 8000 3000 0010'),new Currency('PLN'));
    }

    function it_is_add_client_to_account(){
        $this->setIdClient('123123');

        $this->getIdClient()->shouldReturn('123123');
    }

    function it_is_get_id_account(){
        $this->setIdAccount('123123');

        $this->getIdAccount()->shouldReturn('123123');
    }

}
