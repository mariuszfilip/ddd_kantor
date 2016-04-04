<?php

namespace Cantor\Domain;
use Doctrine\Common\Collections\ArrayCollection;
use Rhumsaa\Uuid\Uuid;


class Client
{

    protected $_id;

    protected $_name;

    /**
     * @var Email
     */
    protected $_email;


    protected $_date_add;

    /**
     * @var bool
     */
    protected $_isRegistered = false;


    protected $_bankAccount;

    protected $_surname;

    public function __construct(Name $name, Email $email, $isRegistered)
    {
        $this->_id = Uuid::uuid4()->toString();
        $this->_name = $name->getName();
        $this->_surname = $name->getSurname();
        $this->_email = $email->getEmail();
        $this->_isRegistered = $isRegistered;
        $this->_date_add = new \DateTime("now");
        $this->_bankAccount = new ArrayCollection();
    }

    /**
     * @return bool
     */
    public function isRegistered()
    {
        return $this->_isRegistered;
    }

    public function register()
    {
        $this->_isRegistered = true;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    public function addBankAccount(BankAccount $bankAccount)
    {
        $this->_bankAccount->add($bankAccount);
    }
    
}
