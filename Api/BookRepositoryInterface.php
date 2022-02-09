<?php

namespace Encomage\Books\Api;

interface BookRepositoryInterface
{
    /**
     * Save a book
     * @param \Encomage\Books\Api\Data\BookInterface $book
     * @return \Encomage\Books\Api\Data\BookInterface
     */
    public function save(Data\BookInterface $book);

    /**
     * Retrieve a book
     * @param $bookId
     * @return \Encomage\Books\Api\Data\BookInterface
     */
    public function getById($bookId);

    /**
     * Retrieve books matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Cms\Api\Data\BlockSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete a book
     * @param \Encomage\Books\Api\Data\BookInterface $book
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\BookInterface $book);

    /**
     * Delete a book by ID
     * @param $bookId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($bookId);
}
