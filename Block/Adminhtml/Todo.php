<?php

namespace Hans\Todo\Block\Adminhtml;

/**
 * Todo grid container
 *
 * Class Todo
 * @package Hans\Todo\Block\Adminhtml
 *
 * Grid (danh sách) gồm 2 thành phần container + grid
 * Container là 1 class sẽ sinh ra phần khung của grid bao gồm: tiêu đề bảng, các nút (thêm mới, export, ...)
 * Container sẽ tự động tìm và tạo Grid của nó theo công thức trong hàm _prepareLayout
 * @see \Magento\Backend\Block\Widget\Grid\Container::_prepareLayout()
 */
class Todo extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller     = 'adminhtml_todo';
        $this->_blockGroup     = 'Hans_Todo';
        $this->_headerText     = __('Todo List');
        $this->_addButtonLabel = __('New Todo');

        parent::_construct();
    }
}