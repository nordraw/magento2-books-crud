<?php

namespace Encomage\Books\Block;

use \Magento\Framework\Api\SortOrder;
use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Encomage\Books\Api\BookRepositoryInterface;
use \Magento\Framework\Api\Search\SearchCriteriaBuilder;
use \Magento\Framework\Api\FilterBuilder;

class Listing extends Template
{
    protected $bookRepository;
    protected $searchCriteriaBuilder;
    protected $filterBuilder;

    public function __construct(
        Context                 $context,
        BookRepositoryInterface $bookRepository,
        SearchCriteriaBuilder   $searchCriteriaBuilder,
        FilterBuilder           $filterBuilder,
        array                   $data = []
    )
    {
        $this->bookRepository = $bookRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        parent::__construct($context, $data);
    }

    public function getResult()
    {
        $this->searchCriteriaBuilder->addSortOrder('book_id', SortOrder::SORT_ASC);
        $searchCriteria = $this->searchCriteriaBuilder->create();

        $searchResult = $this->bookRepository->getList($searchCriteria);
        $items = $searchResult->getItems();

        return $items;
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
