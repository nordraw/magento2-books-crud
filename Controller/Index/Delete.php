<?php

namespace Encomage\Books\Controller\Index;

use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Encomage\Books\Model\ResourceModel\BookFactory as BookResourceFactory;
use \Encomage\Books\Model\BookFactory;
use \Magento\Framework\App\Request\Http;
use \Magento\Backend\Model\View\Result\RedirectFactory;

class Delete implements HttpGetActionInterface
{
    protected $bookResourceFactory;
    protected $bookFactory;
    protected $request;
    protected $redirectFactory;

    public function __construct(
        BookResourceFactory $bookResourceFactory,
        BookFactory         $bookFactory,
        Http                $request,
        RedirectFactory     $redirectFactory
    )
    {
        $this->bookResourceFactory = $bookResourceFactory;
        $this->bookFactory = $bookFactory;
        $this->request = $request;
        $this->redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        $bookId = $this->request->getParams('id');

        $book = $this->bookFactory->create();
        $book->setId($bookId);

        $bookResource = $this->bookResourceFactory->create();
        $bookResource->delete($book);

        $redirect = $this->redirectFactory->create();
        $redirect->setUrl('/books/index/index');

        return $redirect;
    }
}
