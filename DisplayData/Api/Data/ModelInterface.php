<?php
namespace Praveen\DisplayData\Api\Data;

interface ModelInterface
{

   const Id = 'Id';
   const Name = 'Name';
   const Email = 'Email';
   const Telephone = 'Telephone';

    public function getId();


    public function setId($id);


    public function getName();

 
    public function setName($name);


    public function getEmail();


    public function setEmail($email);


    public function getTelephone();


    public function setTelephone($telephone);


}