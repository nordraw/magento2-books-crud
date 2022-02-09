<?php

namespace Encomage\Books\Model;

use \Encomage\Books\Api\Data\BookInterface;
use \Magento\Framework\DataObject\IdentityInterface;
use \Magento\Framework\Model\AbstractModel;

class Book extends AbstractModel implements IdentityInterface, BookInterface
{
    const CACHE_TAG = 'encomage_books_book';

    protected $_cacheTag = 'encomage_books_book';

    protected $_eventPrefix = 'encomage_books_book';

    protected function _construct()
    {
        $this->_init('Encomage\Books\Model\ResourceModel\Book');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getId()
    {
        return $this->getData('book_id');
    }

    public function setId($book_id)
    {
        return $this->setData('book_id', $book_id);
    }

    public function getTitle()
    {
        return $this->getData('title');
    }

    public function setTitle($title)
    {
        return $this->setData('title', $title);
    }

    public function getImage()
    {
        return $this->getData('image');
    }

    public function setImage($image)
    {
        return $this->setData('image', $image);
    }

    public function getTotalPages()
    {
        return $this->getData('total_pages');
    }

    public function setTotalPages($total_pages)
    {
        return $this->setData('total_pages', $total_pages);
    }

    public function getCreatedAt()
    {
        return $this->getData('created_at');
    }

    public function setCreatedAt($created_at)
    {
        return $this->setData('created_at', $created_at);
    }

    public function getUpdatedAt()
    {
        return $this->getData('updated_at');
    }

    public function setUpdatedAt($updated_at)
    {
        return $this->setData('updated_at', $updated_at);
    }

    public function getAuthor()
    {
        return $this->getData('author');
    }

    public function setAuthor($author)
    {
        return $this->setData('author', $author);
    }
}
