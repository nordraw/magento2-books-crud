<?php

namespace Encomage\Books\Controller\Adminhtml\Book;

use Magento\Framework\App\Action\HttpPostActionInterface;
use \Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\App\Request\Http;

class Save implements HttpPostActionInterface
{
    protected $request;
    protected $redirectFactory;

    public function __construct(
        Http $request,
        RedirectFactory $redirectFactory
    )
    {
        $this->request = $request;
        $this->redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        $redirect = $this->redirectFactory->create();
        return $redirect->setUrl('/books/index/index');
    }
}
