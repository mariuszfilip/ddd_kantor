<?php

namespace spec\Cantor\Domain;

use Cantor\Domain\BankAccount;
use Cantor\Domain\Email;
use Cantor\Domain\Name;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientSpec extends ObjectBehavior
{

    function let(Name $name,Email $email){
        $this->beConstructedWith($name->getWrappedObject(),$email->getWrappedObject(),$isRegistered = false);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Domain\Client');
    }

    function it_is_client_not_registered_if_not_exists_in_system(Name $name,Email $email){

        $this->beConstructedWith($name->getWrappedObject(),$email->getWrappedObject(),$isRegistered = false);

        $this->isRegistered()->shouldReturn(false);
    }

    function it_is_client_registered_if_exists_in_system(Name $name,Email $email){

        $this->beConstructedWith($name->getWrappedObject(),$email->getWrappedObject(),$isRegistered = true);

        $this->isRegistered()->shouldReturn(true);
    }

    function it_is_client_register_after_register_in_system(){

        $this->register();
        $this->isRegistered()->shouldReturn(true);
    }

    function it_is_clienta_can_add_bank_account(BankAccount $bankAccount){

        $this->addBankAccount($bankAccount);
    }

    function it_is_client_have_bank_account_after_add(BankAccount $bankAccount){
        $wrappedObject =$bankAccount->getWrappedObject();
        $this->addBankAccount($wrappedObject);
        $this->getBankAccount()->shouldReturn($bankAccount->getWrappedObject());
    }
}
