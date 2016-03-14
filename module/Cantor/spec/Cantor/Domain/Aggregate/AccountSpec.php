<?php

namespace spec\Cantor\Domain\Aggregate;

use Cantor\Domain\Repository\AccountRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Cantor\Domain\Client;
use Cantor\Domain\BankAccount;
use Cantor\Domain\NumberAccount;
use Cantor\Domain\Name;
use Cantor\Domain\Email;
use Cantor\Domain\Currency;

class AccountSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Cantor\Domain\Aggregate\Account');
    }

    function let(AccountRepository $accountRepository){
        $this->beConstructedWith($accountRepository->getWrappedObject());
    }

    function it_is_add_account_correct(AccountRepository $accountRepository,
                                       BankAccount $oBankAccount, Client $oClient

    ){

        $oBankAccountWrapped = $oBankAccount->getWrappedObject();
        $accountRepository->add($oBankAccountWrapped)->shouldBeCalled();
        $oBankAccount->setIdClient($oClient->getId());

        $this->beConstructedWith($accountRepository->getWrappedObject());
        $this->add($oClient->getWrappedObject(), $oBankAccountWrapped);
    }
}
