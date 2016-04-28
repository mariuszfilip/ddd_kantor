<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 05.03.16
 * Time: 12:22
 */

namespace Cantor\Application\Cqrs\Payload;


use Malocher\Cqrs\Message\PayloadInterface;

/**
 * Class ExchangeCurrencyRequest
 * @package Cantor\Application\Cqrs\Payload
 */
class ExchangeCurrencyRequest implements PayloadInterface{

    /**
     * @var
     */
    private $_currencyCode ;
    /**
     * @var
     */
    private $_quantity;
    /**
     * @var
     */
    private $_id_acccount_in;
    /**
     * @var
     */
    private $_id_acccount_return;

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->_currencyCode;
    }

    /**
     * @param mixed $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->_currencyCode = $currencyCode;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /**
     * @param mixed $amount
     */
    public function setQuantity($amount)
    {
        $this->_quantity = $amount;
    }

    /**
     * @return mixed
     */
    public function getIdAcccountIn()
    {
        return $this->_id_acccount_in;
    }

    /**
     * @param mixed $numer_acccount_in
     */
    public function setIdAcccountIn($numer_acccount_in)
    {
        $this->_id_acccount_in = $numer_acccount_in;
    }

    /**
     * @return mixed
     */
    public function getIdAcccountReturn()
    {
        return $this->_id_acccount_return;
    }

    /**
     * @param mixed $numer_acccount_return
     */
    public function setIdAcccountReturn($numer_acccount_return)
    {
        $this->_id_acccount_return = $numer_acccount_return;
    }



    /**
     * Get an array copy of the payload
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return array(
            'quantity' => $this->_quantity,
            'id_account_in'=>$this->_id_acccount_in,
            'id_account_return'=>$this->_id_acccount_return,
            'currency_code'=>$this->_currencyCode,

        );
    }
}