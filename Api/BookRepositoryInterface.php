<?php

namespace Encomage\Books\Api;

use \Encomage\Books\Api\Data\BookInterface;

interface BookRepositoryInterface
{
    /**
     * Create or update a book
     * @param BookInterface $book
     * @return BookInterface
     */
    public function save($book);

    /**
     * Get a book by Id
     * @param $id
     * @return BookInterface
     */
    public function getById($id);

    /**
     * Get a collection of all books
     */
    public function getAll();

    /**
     * Delete a book by Id
     * @param $id
     * @return BookInterface
     */
    public function deleteById($id);
}
