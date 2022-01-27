<?php

namespace Encomage\Books\Block;

use \Encomage\Books\Model\ResourceModel\Book\Collection as BookCollection;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $bookCollectionFactory = null;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context           $context,
        \Encomage\Books\Model\ResourceModel\Book\CollectionFactory $bookCollectionFactory,
        array                                                      $data = [])
    {
        $this->bookCollectionFactory = $bookCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getResult()
    {
        /** @var BookCollection $bookCollection */
        $bookCollection = $this->bookCollectionFactory->create();

        $bookCollection->addFieldToSelect(['book_id', 'title', 'image', 'total_pages']);
        $bookCollection->getSelect()->order('book_id ASC');

        return $bookCollection;
    }

    public function getInsertUrl()
    {
        return $this->getUrl('books/index/insert');
    }
}
