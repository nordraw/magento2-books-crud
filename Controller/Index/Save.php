<?php

namespace Encomage\Books\Controller\Index;

use \Magento\Framework\App\Action\HttpPostActionInterface;
use \Magento\Framework\App\Request\Http;
use \Encomage\Books\Model\ResourceModel\BookFactory as BookResourceFactory;
use \Magento\Framework\Controller\Result\RedirectFactory;
use \Encomage\Books\Model\BookFactory;

class Save implements HttpPostActionInterface
{
    protected $request;
    protected $bookResourceFactory;
    protected $redirectFactory;
    protected $bookFactory;

    public function __construct(
        Http                $request,
        BookResourceFactory $bookResourceFactory,
        RedirectFactory     $redirectFactory,
        BookFactory         $bookFactory
    )
    {
        $this->request = $request;
        $this->bookResourceFactory = $bookResourceFactory;
        $this->redirectFactory = $redirectFactory;
        $this->bookFactory = $bookFactory;
    }

    public function execute()
    {
        $bookData = $this->request->getPost();

        $data = array();
        foreach ($bookData as $key => $value) {
            $data[$key] = $value;
        }

        $book = $this->bookFactory->create();
        $book->setData($data);

        $bookResource = $this->bookResourceFactory->create();
        $bookResource->save($book);


        $redirect = $this->redirectFactory->create();
        $redirect->setPath('books');

        return $redirect;
    }
}
