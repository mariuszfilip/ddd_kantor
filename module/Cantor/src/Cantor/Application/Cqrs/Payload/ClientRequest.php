<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 05.03.16
 * Time: 12:22
 */

namespace Cantor\Application\Cqrs\Payload;


use Malocher\Cqrs\Message\PayloadInterface;

class ClientRequest implements PayloadInterface{

    private $_email;
    private $_name;
    private $_surname;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->_surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->_surname = $surname;
    }


    /**
     * Get an array copy of the payload
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return array(
            'name'=>$this->_name,
            'surname'=>$this->_surname,
            'email'=>$this->_email,
        );
    }
}