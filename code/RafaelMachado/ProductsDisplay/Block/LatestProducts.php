<?php

namespace RafaelMachado\ProductsDisplay\Block;

use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Catalog\Model\Product\Visibility;
use Magento\Catalog\Block\Product\Context;

class LatestProducts extends AbstractProduct
{
    protected $productCollectionFactory;
    protected $catalogProductVisibility;

    public function __construct(
        Context $context,
        CollectionFactory $productCollectionFactory,
        Visibility $catalogProductVisibility,
        array $data = []
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->catalogProductVisibility = $catalogProductVisibility;
        parent::__construct($context, $data);
    }

    public function getProductCollection($limit = 8)
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*')
            ->addAttributeToFilter('visibility', ['in' => $this->catalogProductVisibility->getVisibleInCatalogIds()])
            ->addAttributeToFilter('status', \Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED)
            ->setOrder('created_at', 'desc')
            ->setPageSize($limit);

        return $collection;
    }
}
