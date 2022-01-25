<?php

namespace Encomage\Books\Model\ResourceModel;

class Book extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('encomage_books_book', 'book_id');
    }
}
