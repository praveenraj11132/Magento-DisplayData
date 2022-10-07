<?php
namespace Praveen\DisplayData\Api;

use \Praveen\DisplayData\Api\Data\ModelInterface;

interface ModelRepositoryInterface
{
   
    public function save(ModelInterface $model);

    
    public function delete(ModelInterface $model);

   
    public function deleteById($id);

    
    public function getById($id);

  
}