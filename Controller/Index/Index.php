<?php

namespace Encomage\Books\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Index implements HttpGetActionInterface
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context      $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        //parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
