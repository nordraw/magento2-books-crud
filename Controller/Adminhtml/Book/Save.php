<?php

namespace Encomage\Books\Controller\Adminhtml\Book;

use Encomage\Books\Api\BookRepositoryInterface;
use Encomage\Books\Model\BookFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;
use \Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\App\Request\Http;

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
        if (isset($bookData['book_id']) && !empty($bookData['book_id'])) {
            $book->setId($bookData['book_id']);
        }
        if (isset($bookData['total_pages']) && !empty($bookData['total_pages'])) {
            $book->setTotalPages($bookData['total_pages']);
        }
        $book->setTitle($bookData['title']);
        $book->setAuthor($bookData['author']);

        $this->bookRepository->save($book);

        $redirect = $this->redirectFactory->create();
        return $redirect->setPath('*/*/listing');
    }
}
