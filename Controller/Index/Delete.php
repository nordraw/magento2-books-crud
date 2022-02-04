<?php

namespace Encomage\Books\Controller\Index;

use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\App\Request\Http;
use \Magento\Backend\Model\View\Result\RedirectFactory;
use \Encomage\Books\Api\BookRepositoryInterface;

class Delete implements HttpGetActionInterface
{
    protected $request;
    protected $redirectFactory;
    protected $bookRepository;

    public function __construct(
        Http                    $request,
        RedirectFactory         $redirectFactory,
        BookRepositoryInterface $bookRepository
    )
    {
        $this->request = $request;
        $this->redirectFactory = $redirectFactory;
        $this->bookRepository = $bookRepository;
    }

    public function execute()
    {
        $bookId = $this->request->getParams('id');

        $this->bookRepository->deleteById($bookId);

        $redirect = $this->redirectFactory->create();
        $redirect->setUrl('/books/index/listing');

        return $redirect;
    }
}
