<?php

namespace Encomage\Books\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{
    const ROW_EDIT_URL = 'books/book/edit';
    protected $urlBuilder;
    protected $editUrl;

    public function __construct(
        ContextInterface   $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface       $urlBuilder,
                           $editUrl = self::ROW_EDIT_URL,
        array              $components = [],
        array              $data = [])
    {
        $this->urlBuilder = $urlBuilder;
        $this->editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $this->urlBuilder->getUrl($this->editUrl, ['book_id' => $item['book_id']]),
                        'label' => __('Edit book')
                    ]
                ];
            }
        }

        return $dataSource;
    }
}
