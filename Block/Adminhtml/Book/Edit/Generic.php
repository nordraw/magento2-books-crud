<?php

namespace Encomage\Books\Block\Adminhtml\Book\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class Generic
{
    protected $context;

    public function __construct(
        Context $context
    )
    {
        $this->context = $context;
    }

    public function getEntityId()
    {
        try {
            return $this->context->getRequest()->getParam('book_id');
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
