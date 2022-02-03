<?php

namespace Encomage\Books\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Encomage\Books\Api\BookRepositoryInterface;

class Listing extends Template
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

    public function getEditUrl($id)
    {
        return $this->getUrl('books/index/edit', ['id' => $id]);
    }

    public function getDeleteUrl($id)
    {
        return $this->getUrl('books/index/delete', ['id' => $id]);
    }
}
