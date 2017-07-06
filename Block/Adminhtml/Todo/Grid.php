<?php

namespace Hans\Todo\Block\Adminhtml\Todo;

/**
 * Todo Grid
 *
 * Class Grid
 * @package Hans\Todo\Block\Adminhtml\Todo
 *
 * đây là Grid class, sẽ tạo ra 1 bảng hiển thị dữ liệu từ 1 nguồn dữ liệu, thường là 1 collection các object, mỗi object trong collection sẽ tạo 1 dòng trong bảng.
 *
 * trong class này chúng ta định nghĩa nguồn dữ liệu (collection), danh sách cột của bảng, url khi click 1 dòng trong bảng,...
 */
class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /** @var \Hans\Todo\Model\ResourceModel\Todo\CollectionFactory */
    protected $_collectionFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Hans\Todo\Model\ResourceModel\Todo\CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Hans\Todo\Model\ResourceModel\Todo\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('todoGrid');
        $this->setDefaultSort('todo_id');
        $this->setDefaultDir('DESC');
    }

    /**
     * Prepare collection
     *
     * @return \Magento\Backend\Block\Widget\Grid
     */
    protected function _prepareCollection()
    {
        $collection = $this->_collectionFactory->create();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare columns
     *
     * @return \Magento\Backend\Block\Widget\Grid\Extended
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'todo_id',
            [
                'header' => __('Todo ID'),
                'index'  => 'todo_id',
                'align'  => 'center'
            ]
        );

        $this->addColumn(
            'firstname',
            [
                'header' => __('Title'),
                'index'  => 'title'
            ]
        );

        $this->addColumn(
            'completed',
            [
                'header'  => __('Is Completed?'),
                'index'   => 'completed',
                'type'    => 'options',
                'options' => [
                    '0' => __('No'),
                    '1' => __('Yes')
                ]
            ]
        );

        return parent::_prepareColumns();
    }

    /**
     * Return row url for js event handlers
     *
     * @param \Hans\Todo\Model\Todo $item
     * @return string
     */
    public function getRowUrl($item)
    {
        return $this->getUrl('*/*/edit', ['todo_id' => $item->getId()]);
    }
}