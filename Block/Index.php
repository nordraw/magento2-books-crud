<?php

namespace Encomage\Books\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Encomage\Books\Model\ResourceModel\Book\CollectionFactory;

class Index extends Template
{
    protected $bookCollectionFactory = null;

    public function __construct(
        Context           $context,
        CollectionFactory $bookCollectionFactory,
        array             $data = [])
    {
        $this->bookCollectionFactory = $bookCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getResult()
    {
        $bookCollection = $this->bookCollectionFactory->create();

        $bookCollection->addFieldToSelect(['book_id', 'title', 'author', 'image', 'total_pages']);
        $bookCollection->getSelect()->order('book_id ASC');

        return $bookCollection;
    }

    public function getInsertUrl()
    {
        return $this->getUrl('books/index/insert');
    }

    public function getEditUrl()
    {
        return $this->getUrl('books/index/edit');
    }

    public function getDeleteUrl()
    {
        return $this->getUrl('books/index/delete');
    }
}
