<?php

namespace Praveen\DisplayData\Model\ResourceModel;

class Model extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName = 'Id';

    protected function _construct()
    {
        $this->_init('Praveen_Data','Id');
    }
}