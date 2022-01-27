<?php

namespace Encomage\Books\Block;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Insert extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }

    public function getSaveUrl()
    {
        return $this->getUrl('books/index/save');
    }
}
