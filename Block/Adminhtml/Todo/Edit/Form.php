<?php

namespace Hans\Todo\Block\Adminhtml\Todo\Edit;

/**
 * class form, chịu trách nhiệm sinh ra phần thân của form
 * Các trường trong form được định nghĩa trong class này
 *
 * Class Form
 * @package Hans\Todo\Block\Adminhtml\Todo\Edit
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * Init form
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('todo_form');
        $this->setTitle(__('General Information'));
    }

    /**
     * @return \Hans\Todo\Model\Todo
     */
    public function getCurrentTodo()
    {
        return $this->_coreRegistry->registry('current_todo');
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $model = $this->getCurrentTodo();

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('todo_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField(
                'todo_id',
                'hidden',
                [
                    'name' => 'todo_id'
                ]
            );
        }

        $fieldset->addField(
            'title',
            'text',
            [
                'name'     => 'title',
                'label'    => __('Title'),
                'title'    => __('Title'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'completed',
            'checkbox',
            [
                'name'     => 'completed',
                'label'    => __('Is Completed?'),
                'title'    => __('Is Completed?'),
                'onchange' => 'this.value = this.checked;'
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
