<?php

namespace Encomage\Books\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\App\Request\Http;
use \Encomage\Books\Model\ResourceModel\Book\CollectionFactory;

use \Encomage\Books\Model\ResourceModel\BookFactory as BookResoureFactory;
use \Encomage\Books\Model\BookFactory;

class Edit extends Template
{
    protected $request;
    protected $bookCollectionFactory;
    protected $bookFactory;
    protected $bookResource;

    public function __construct(
        Context            $context,
        Http               $request,
        CollectionFactory  $bookCollectionFactory,
        BookFactory        $bookFactory,
        BookResoureFactory $bookResource,

        array              $data = [])
    {
        $this->request = $request;
        $this->bookCollectionFactory = $bookCollectionFactory;
        $this->bookFactory = $bookFactory;
        $this->bookResource = $bookResource;
        parent::__construct($context, $data);
    }

    public function getBookData()
    {
        $bookId = $this->request->getParam('id');

        $bookCollection = $this->bookCollectionFactory->create();

        $bookCollection->addFieldToFilter('book_id', ['eq' => (int)$bookId]);
        $bookCollection->addFieldToSelect(['title', 'author', 'image', 'total_pages']);
        $bookCollection->getSelect();

        return $bookCollection;
    }
}
