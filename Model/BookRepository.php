<?php

namespace Encomage\Books\Model;

use \Encomage\Books\Api\BookRepositoryInterface;
use \Encomage\Books\Model\BookFactory;
use \Encomage\Books\Model\ResourceModel\Book\CollectionFactory;
use \Encomage\Books\Model\ResourceModel\BookFactory as BookResourceFactory;

class BookRepository implements BookRepositoryInterface
{
    protected $bookFactory;
    protected $bookResourceFactory;
    protected $bookCollectionFactory;

    public function __construct(
        BookFactory         $bookFactory,
        BookResourceFactory $bookResourceFactory,
        CollectionFactory   $bookCollectionFactory
    )
    {
        $this->bookFactory = $bookFactory;
        $this->bookResourceFactory = $bookResourceFactory;
        $this->bookCollectionFactory = $bookCollectionFactory;
    }

    public function save($book)
    {
        $bookResource = $this->bookResourceFactory->create();
        $bookResource->save($book);

        return $book;
    }

    public function getById($id)
    {
        $bookCollection = $this->bookCollectionFactory->create();
        $bookCollection->addFieldToFilter('book_id', ['eq' => (int)$id]);
        $bookCollection->addFieldToSelect(['title', 'author', 'image', 'total_pages']);
        $bookCollection->getSelect();

        return $bookCollection;
    }

    public function getAll()
    {
        $bookCollection = $this->bookCollectionFactory->create();

        $bookCollection->addFieldToSelect(['book_id', 'title', 'author', 'image', 'total_pages']);
        $bookCollection->getSelect()->order('book_id ASC');

        return $bookCollection;
    }

    public function deleteById($id)
    {
        $book = $this->bookFactory->create();
        $book->setId($id);

        $bookResource = $this->bookResourceFactory->create();
        $bookResource->delete($book);

        return $book;
    }
}
