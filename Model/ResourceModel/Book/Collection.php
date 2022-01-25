<?php

namespace Encomage\Books\Model\ResourceModel\Book;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'book_id';
    protected $_eventPrefix = 'encomage_books_book_collection';
    protected $_eventObject = 'book_collection';

    protected function _construct()
    {
        $this->_init('Encomage\Books\Model\Book', 'Encomage\Books\ResourceModel\Book');
    }
}
