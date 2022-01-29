<?php

namespace Encomage\Books\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;

class Insert extends Template
{
    public function __construct(
        Context $context,
        array   $data = []
    )
    {
        parent::__construct($context, $data);
    }

    public function getSaveUrl()
    {
        return $this->getUrl('books/index/save');
    }
}
