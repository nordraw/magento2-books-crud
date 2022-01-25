<?php

namespace Encomage\Books\Model;

use \Magento\Framework\DataObject\IdentityInterface;
use \Magento\Framework\Model\AbstractModel;

class Book extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'encomage_books_book';

    protected $_cacheTag = 'encomage_books_book';

    protected $_eventPrefix = 'encomage_books_book';

    protected function _construct()
    {
        $this->_init('Encomage\Books\Model\ResourceModel\Book');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
