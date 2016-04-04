<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 05.03.16
 * Time: 12:22
 */

namespace Cantor\Application\Cqrs\Payload;


use Malocher\Cqrs\Message\PayloadInterface;

class AccountNumberRequest implements PayloadInterface{

    private $_numberAccount = null;
    private $_countryCode = null;
    private $_id_client = null;

    /**
     * @param null $numberAccount
     */
    public function setNumberAccount($numberAccount)
    {
        $this->_numberAccount = $numberAccount;
    }

    /**
     * @param null $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->_countryCode = $countryCode;
    }

    /**
     * @param null $id_client
     */
    public function setIdClient($id_client)
    {
        $this->_id_client = $id_client;
    }



    /**
     * Get an array copy of the payload
     *
     * @return array
     */
    public function getArrayCopy()
    {
       return array(
           'number'=>$this->_numberAccount,
           'country_code'=>$this->_countryCode,
           'id_client' => $this->_id_client
       );
    }
}