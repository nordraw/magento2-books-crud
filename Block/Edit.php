<?php

namespace Encomage\Books\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\App\Request\Http;
use \Encomage\Books\Api\BookRepositoryInterface;

class Edit extends Template
{
    protected $request;
    protected $bookRepository;

    public function __construct(
        Context                 $context,
        Http                    $request,
        BookRepositoryInterface $bookRepository,
        array                   $data = []
    )
    {
        $this->request = $request;
        $this->bookRepository = $bookRepository;
        parent::__construct($context, $data);
    }

    public function getBookData()
    {
        $bookId = $this->request->getParam('id');

        $book = $this->bookRepository->getById($bookId);

        return $book;
    }

    public function getSaveUrl()
    {
        return $this->getUrl('books/index/save');
    }
}
