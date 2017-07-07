<?php

namespace Hans\Todo\Block\Adminhtml\Todo;

/**
 * Form bao gồm form container + form
 *
 * Đây là form container class, chịu trách nhiệm render ra tiêu đề của form, các nút chức năng như Lưu, Quay Lại, Xóa,...
 * Form container sẽ tự động tìm và tạo class form của nó theo logic định nghĩa trong
 * @see \Magento\Backend\Block\Widget\Form\Container::_prepareLayout()
 *
 * Class Edit
 * @package Hans\Todo\Block\Adminhtml\Todo
 */
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        /**
         * Các thuộc tính quan trọng để form container có thể tìm được class form của nó
         */
        $this->_objectId   = 'todo_id';
        $this->_blockGroup = 'Hans_Todo';
        $this->_controller = 'adminhtml_todo';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save Todo'));
        $this->buttonList->update('delete', 'label', __('Delete Todo'));

        $this->buttonList->add(
            'saveandcontinue',
            [
                'label'          => __('Save and Continue Edit'),
                'class'          => 'save',
                'data_attribute' => [
                    'mage-init' => ['button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form']],
                ]
            ],
            -100
        );
    }

    /**
     * @return \Hans\Todo\Model\Todo
     */
    public function getCurrentTodo()
    {
        return $this->_coreRegistry->registry('current_todo');
    }

    /**
     * Get edit form container header text
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->getCurrentTodo()->getId()) {
            return __("Edit Todo");
        } else {
            return __('New Todo');
        }
    }
}
