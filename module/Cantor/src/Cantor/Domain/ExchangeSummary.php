<?php

namespace Cantor\Domain;

use Cantor\Domain\Exception\QuantityException;
use Rhumsaa\Uuid\Uuid;

/**
 * Class ExchangeSummary
 * @package Cantor\Domain
 */
class ExchangeSummary
{
    /**
     * @var ExchangeRate
     */
    private $_exchangeRate;
    /**
     * @var
     */
    private $_quantity;
    /**
     * @var
     */
    private $_amountSummary;
    /**
     * @var
     */
    private $_idAccountNumberTarget;
    /**
     * @var
     */
    private $_idAccountNumberSource;
    /**
     * @var string
     */
    private $_id;
    /**
     * @var
     */
    private $_currencyCode;
    /**
     * @var
     */
    private $_course;

    /**
     * ExchangeSummary constructor.
     * @param ExchangeRate $exchangeRate
     * @param $quantity
     * @throws QuantityException
     */
    public function __construct(ExchangeRate $exchangeRate, $quantity)
    {
        if($quantity <= 0){
            throw new QuantityException();
        }
        $this->_id = Uuid::uuid4()->toString();
        $this->_exchangeRate = $exchangeRate;
        $this->_quantity = $quantity;
        $this->_amountSummary = $this->_quantity*$this->_exchangeRate->getCourse();
    }

    /**
     * @return mixed
     */
    public function getAmountSummary()
    {
        return $this->_amountSummary;
    }

    /**
     * @param BankAccount $source
     * @param BankAccount $target
     */
    public function confirm(BankAccount $source, BankAccount $target)
    {
        $this->_idAccountNumberSource = $source->getIdAccount();
        $this->_idAccountNumberTarget = $target->getIdAccount();
        $this->_currencyCode = $this->_exchangeRate->getCurrencyCode();
        $this->_course = $this->_exchangeRate->getCourse();
    }
}
