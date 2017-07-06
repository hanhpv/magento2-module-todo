<?php

namespace Hans\Todo\Model\ResourceModel;

/**
 * resource model của todo model
 * là class sẽ trực tiếp đọc, ghi dữ liệu từ database
 *
 * trong hàm _construct của resource model, chúng ta cần khai báo bảng mà nó sẽ làm việc và khóa chính của bảng đó
 *
 * Class Todo
 * @package Hans\Todo\Model\ResourceModel
 */
class Todo extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('todo', 'todo_id');
    }
}