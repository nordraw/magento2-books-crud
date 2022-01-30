<?php

namespace Encomage\Books\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Encomage\Books\Api\BookRepositoryInterface;

class Index extends Template
{
    protected $bookRepository;

    public function __construct(
        Context                 $context,
        BookRepositoryInterface $bookRepository,
        array                   $data = []
    )
    {
        $this->bookRepository = $bookRepository;
        parent::__construct($context, $data);
    }

    public function getResult()
    {
        $bookCollection = $this->bookRepository->getAll();

        return $bookCollection;
    }

    public function getInsertUrl()
    {
        return $this->getUrl('books/index/insert');
    }

    public function getEditUrl()
    {
        return $this->getUrl('books/index/edit');
    }

    public function getDeleteUrl()
    {
        return $this->getUrl('books/index/delete');
    }
}
