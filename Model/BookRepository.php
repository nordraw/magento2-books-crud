<?php

namespace Encomage\Books\Model;

use \Encomage\Books\Api\BookRepositoryInterface;
use \Encomage\Books\Api\Data\BookInterface;
use \Encomage\Books\Api\Data\BookSearchResultsInterface;
use \Encomage\Books\Api\Data\BookSearchResultsInterfaceFactory;
use \Encomage\Books\Model\ResourceModel\Book\CollectionFactory;
use \Encomage\Books\Model\ResourceModel\Book as BookResource;
use \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use \Magento\Framework\Api\SearchCriteriaInterface;
use \Magento\Framework\Exception\CouldNotDeleteException;
use \Magento\Framework\Exception\CouldNotSaveException;
use \Magento\Framework\Exception\NoSuchEntityException;

class BookRepository implements BookRepositoryInterface
{
    /**
     * @var BookResource
     */
    protected $bookResource;

    /**
     * @var CollectionFactory
     */
    protected $bookCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var BookSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var BookFactory
     */
    protected $bookFactory;

    /**
     * @param BookResource $bookResource
     * @param CollectionFactory $bookCollectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param BookSearchResultsInterfaceFactory $searchResultsFactory
     * @param BookFactory $bookFactory
     */
    public function __construct(
        BookResource                      $bookResource,
        CollectionFactory                 $bookCollectionFactory,
        CollectionProcessorInterface      $collectionProcessor,
        BookSearchResultsInterfaceFactory $searchResultsFactory,
        BookFactory                       $bookFactory
    )
    {
        $this->bookResource = $bookResource;
        $this->bookCollectionFactory = $bookCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->bookFactory = $bookFactory;
    }

    /**
     * Save a Book
     * @param BookInterface $book
     * @return BookInterface
     * @throws CouldNotSaveException
     */
    public function save(BookInterface $book)
    {
        try {
            $this->bookResource->save($book);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $book;
    }

    /**
     * Load Book data by given Book Identity
     * @param $bookId
     * @return BookInterface|Book
     * @throws NoSuchEntityException
     */
    public function getById($bookId)
    {
        $book = $this->bookFactory->create();
        $this->bookResource->load($book, $bookId);
        if (!$book->getId()) {
            throw new NoSuchEntityException(__('Book with id "%1" does not exist.', $bookId));
        }
        return $book;
    }

    /**
     * Load Book data collection by given search criteria
     * @param SearchCriteriaInterface $searchCriteria
     * @return BookSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->bookCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var BookSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Delete a Book
     * @param BookInterface $book
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(BookInterface $book)
    {
        try {
            $this->bookResource->delete($book);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete a Book by given Book Identity
     * @param $bookId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($bookId)
    {
        return $this->delete($this->getById($bookId));
    }
}
