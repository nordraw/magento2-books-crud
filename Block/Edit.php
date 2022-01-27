<?php

namespace Encomage\Books\Block;

use Encomage\Books\Model\ResourceModel\Book\Collection as BookCollection;

class Edit extends \Magento\Framework\View\Element\Template
{
    protected $_request;
    protected $_bookCollectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context           $context,
        \Magento\Framework\App\Request\Http                        $request,
        \Encomage\Books\Model\ResourceModel\Book\CollectionFactory $bookCollectionFactory,
        array                                                      $data = [])
    {
        $this->_request = $request;
        $this->_bookCollectionFactory = $bookCollectionFactory;
        parent::__construct($context, $data);
    }

//    public function getUpdateUrl()
//    {
//        $this->getUrl('books/index/update');
//    }

    public function getBookData()
    {
        $bookId = $this->_request->getParam('id');

        /** @var BookCollection $bookCollection */
        $bookCollection = $this->_bookCollectionFactory->create();

        $bookCollection->addFieldToFilter('book_id', ['eq' => (int)$bookId]);
        $bookCollection->addFieldToSelect(['title', 'author', 'image', 'total_pages']);
        $bookCollection->getSelect();

        return $bookCollection;
    }
}
