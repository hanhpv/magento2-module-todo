<?php

namespace Hans\Todo\Model\ResourceModel\Todo;

/**
 * collection class, 1 class đặc biệt để chứa 1 danh sách các simple model
 *
 * trong hàm _construct của collection chúng ta cần chỉ định class của các model mà nó sẽ chứa và class resource model mà nó sẽ dùng để đọc ghi dữ liệu từ database
 *
 * Class Collection
 * @package Hans\Todo\Model\ResourceModel\Todo
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Hans\Todo\Model\Todo', 'Hans\Todo\Model\ResourceModel\Todo');
    }
}