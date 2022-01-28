<?php

namespace Encomage\Books\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Delete implements HttpGetActionInterface
{
    protected $_bookResource;
    protected $_book;
    protected $_request;
    protected $_redirectFactory;

    public function __construct(
        \Encomage\Books\Model\ResourceModel\Book                   $bookResource,
        \Encomage\Books\Model\Book                                 $book,
        \Magento\Framework\App\Request\Http                        $request,
        \Magento\Backend\Model\View\Result\RedirectFactory         $redirectFactory
    )
    {
        $this->_bookResource = $bookResource;
        $this->_book = $book;
        $this->_request = $request;
        $this->_redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        /** @var \Encomage\Books\Model\ResourceModel\Book $book */
        $bookId = $this->_request->getParams('id');

        $book = $this->_book->setId($bookId);
        $this->_bookResource->delete($book);

        $redirect = $this->_redirectFactory->create();
        $redirect->setUrl('/books/index/index');

        return $redirect;
    }
}
