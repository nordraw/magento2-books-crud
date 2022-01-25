<?php

namespace Encomage\Books\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $_bookFactory;

    public function __construct(\Encomage\Books\Model\BookFactory $bookFactory)
    {
        $this->_bookFactory = $bookFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            'author_id' => 1,
            'title' => 'The Adventures of Huckleberry Finn',
            'image' => 'view/frontend/web/images/huckleberry-finn.jpg',
            'total_pages' => 353,
        ];

        $book = $this->_bookFactory->create();
        $book->addData($data)->save();
    }
}
