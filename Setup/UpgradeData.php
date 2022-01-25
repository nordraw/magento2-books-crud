<?php

namespace Encomage\Books\Setup;

use \Magento\Framework\Setup\UpgradeDataInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($context->getVersion() && version_compare($context->getVersion(), '1.1.0') < 0) {
            $tableName = $setup->getTable('encomage_books_book');

            $data = [
                'author_id' => 2,
                'title' => 'Don Quixote',
                'image' => 'view/frontend/web/images/don-quixote.jpg',
                'total_pages' => 245,
            ];

            $setup->getConnection()->insertMultiple($tableName, $data);
        }

        $setup->endSetup();
    }
}
