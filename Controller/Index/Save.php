<?php

namespace Encomage\Books\Controller\Index;

use \Magento\Framework\App\Action\HttpPostActionInterface;
use \Magento\Framework\App\Request\Http;
use \Magento\Framework\Controller\Result\RedirectFactory;
use \Encomage\Books\Model\BookFactory;
use \Encomage\Books\Api\BookRepositoryInterface;

class Save implements HttpPostActionInterface
{
    protected $request;
    protected $redirectFactory;
    protected $bookFactory;
    protected $bookRepository;

    public function __construct(
        Http                    $request,
        RedirectFactory         $redirectFactory,
        BookFactory             $bookFactory,
        BookRepositoryInterface $bookRepository
    )
    {
        $this->request = $request;
        $this->redirectFactory = $redirectFactory;
        $this->bookFactory = $bookFactory;
        $this->bookRepository = $bookRepository;
    }

    public function execute()
    {
        $bookData = $this->request->getPost();

        $book = $this->bookFactory->create();
        if (isset($bookData['book_id'])) {
            $book->setId($bookData['book_id']);
        }
        $book->setTitle($bookData['title']);
        $book->setAuthor($bookData['author']);
        $book->setTotalPages($bookData['total_pages']);

        $this->bookRepository->save($book);

        $redirect = $this->redirectFactory->create();
        $redirect->setPath('books/index/listing');

        return $redirect;
    }
}
