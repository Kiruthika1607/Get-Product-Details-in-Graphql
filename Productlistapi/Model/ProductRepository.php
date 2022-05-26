<?php

namespace Training\Productlistapi\Model;

use Training\Productlistapi\Api\Data\ProductInterfaceFactory;
use Training\Productlistapi\Helper\ProductHelper;
use Training\Productlistapi\Api\Data\ProductInterface;
use Training\Productlistapi\Api\ConfigurableProductRepositoryInterface;
use Training\Productlistapi\Api\ProductRepositoryInterface;


class ProductRepository implements ProductRepositoryInterface
{
    private $productInterfaceFactory;
    private $productHelper;
    private $productRepository;
    /**
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     * @param ProductInterfaceFactory $productInterfaceFactory
     * @param ProductHelper $productHelper
     */
    public function __construct(\Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
                                ProductInterfaceFactory $productInterfaceFactory,
                                ProductHelper $productHelper)
    {
        $this->productInterfaceFactory =$productInterfaceFactory;
        $this->productHelper = $productHelper;
        $this->productRepository = $productRepository;
    }
    public function getProductId($id){
        /** @var \Training\Productlistapi\Api\Data\ProductInterface $productInterface */
        $productInterface = $this->productInterfaceFactory->create();
        try{
            /** @var \Magento\Catalog\Api\Data\ProductInterface $product */
            $product = $this->productRepository->getById($id);
            $productInterface->setId($product->getId());
            $productInterface->setSku($product->getSku());
            $productInterface->setName($product->getName());
            $productInterface->setDescription($product->getDescription() ? $product->getDescription() : "");
            $productInterface->setPrice($this->productHelper->formatPrice($product->getPrice()));
            $productInterface->setImage($this->productHelper->getProductImageArray($product));
            return $productInterface;
        }
        catch(NoSuchEntityException $e){
            throw NoSuchEntityException::singleField("id",$id);
        }
    }
}
