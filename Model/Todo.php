<?php

namespace Hans\Todo\Model;

/**
 * đây là 1 model, 1 class tái hiện 1 todo, tức 1 công việc cần làm
 * đây là simple model trong Magento, nó sẽ làm việc chỉ với 1 bảng trong database (khác với EAV model, dữ liệu được lưu trong rất nhiều bảng)
 *
 * kế thừa từ \Magento\Framework\Model\AbstractModel sẽ giúp model có được rất nhiều thuộc tính, phương thức cơ bản của một model
 * Model không trực tiếp đọc và ghi dữ liệu vào database, nó sẽ sử dụng 1 class khác tên là resource model. Trong hàm _construct của model, chúng ta cần khai báo resource model này
 *
 * Class Todo
 * @package Hans\Todo\Model
 */
class Todo extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Hans\Todo\Model\ResourceModel\Todo');
    }
}