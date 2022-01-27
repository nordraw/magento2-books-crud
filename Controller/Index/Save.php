<?php

namespace Encomage\Books\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;

class Save implements HttpPostActionInterface
{
    protected $_request;
    protected $_bookResource;
    protected $_redirectFactory;
    protected $_book;

    public function __construct(
        \Magento\Framework\App\Request\Http                  $request,
        \Encomage\Books\Model\ResourceModel\Book             $bookResource,
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory,
        \Encomage\Books\Model\Book                           $book
    )
    {
        $this->_request = $request;
        $this->_bookResource = $bookResource;
        $this->_redirectFactory = $redirectFactory;
        $this->_book = $book;
    }

    public function execute()
    {
        $bookData = $this->_request->getPost();
        $data = [
            'title' => $bookData['title'],
            'author_id' => $bookData['author_id'],
            'total_pages' => (int)$bookData['total_pages'],
        ];
        $book = $this->_book->setData($data);
        $this->_bookResource->save($book);

        $redirect = $this->_redirectFactory->create();
        $redirect->setPath('books');

        return $redirect;
    }
}
