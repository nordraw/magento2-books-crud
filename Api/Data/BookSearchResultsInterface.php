<?php

namespace Encomage\Books\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface BookSearchResultsInterface extends SearchResultsInterface
{
    public function getItems();

    public function setItems(array $items);
}
