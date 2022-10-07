<?php

namespace Praveen\DisplayData\Model;

use Praveen\DisplayData\Api\Data\ModelInterface;

class Model extends \Magento\Framework\Model\AbstractModel implements \Praveen\DisplayData\Api\Data\ModelInterface
{
    protected function _construct()
    {
        $this->_init('Praveen\DisplayData\Model\ResourceModel\Model');
    }

    public function getId()
    {
        return $this->_getData('Id');
    }

    public function setId($id)
    {
        $this->setData('Id', $id);
    }

    public function getName()
    {
        return $this->_getData('Name');
    }

    public function setName($name)
    {
        $this->setData('Name', $name);
    }

    public function getEmail()
    {
        return $this->_getData('Email');
    }

    public function setEmail($email)
    {
        $this->setData('Email', $email);
    }

    public function getTelephone()
    {
        return $this->_getData('Telephone');
    }

    public function setTelephone($telephone)
    {
        $this->setData('Telephone', $telephone);
    }
}
