<?php

namespace Encomage\Books\Api\Data;

interface BookInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $book_id
     * @return $this
     */
    public function setId($book_id);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getAuthor();

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor($author);

    /**
     * @return string
     */
    public function getImage();

    /**
     * @param string $image
     * @return $this
     */
    public function setImage($image);

    /**
     * @return int
     */
    public function getTotalPages();

    /**
     * @param int $total_pages
     * @return $this
     */
    public function setTotalPages($total_pages);

    /**
     * @return $this
     */
    public function getCreatedAt();

    /**
     * @param $created_at
     * @return $this
     */
    public function setCreatedAt($created_at);

    /**
     * @return $this
     */
    public function getUpdatedAt();

    /**
     * @param $updated_at
     * @return $this
     */
    public function setUpdatedAt($updated_at);
}
