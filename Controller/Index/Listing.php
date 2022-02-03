<?php

namespace Encomage\Books\Controller\Index;

use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\View\Result\PageFactory;
use \Encomage\Books\Helper\Data as HelperData;
use \Magento\Backend\Model\View\Result\RedirectFactory;

class Listing implements HttpGetActionInterface
{
    protected $pageFactory;
    protected $helperData;
    protected $redirectFactory;

    public function __construct(
        PageFactory $pageFactory,
        HelperData  $helperData,
        RedirectFactory $redirectFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->helperData = $helperData;
        $this->redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        if ($this->helperData->getGeneralConfig('enable')) {
            return $this->pageFactory->create();
        }
        $redirect = $this->redirectFactory->create();
        $redirect->setUrl('/');
        return $redirect;
    }
}
