<?php

namespace Hans\Todo\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table `todo`
         */
        $table = $installer->getConnection()
                           ->newTable($installer->getTable('todo'))
                           ->addColumn(
                               'todo_id',
                               \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                               null,
                               ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                               'Todo item ID'
                           )
                           ->addColumn(
                               'title',
                               \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                               256,
                               ['nullable' => false],
                               'Todo title'
                           )
                           ->addColumn(
                               'completed',
                               \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                               null,
                               ['nullable' => false, 'default' => '0'],
                               'Is todo completed'
                           )
                           ->setComment('Todo Table');
        $installer->getConnection()->createTable($table);

        $installer->endSetup();

    }
}
