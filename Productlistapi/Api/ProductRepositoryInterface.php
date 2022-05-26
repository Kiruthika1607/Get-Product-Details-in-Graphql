<?php

namespace Training\Productlistapi\Api;
use Magento\Framework\Exception\NoSuchEntityException;
interface ProductRepositoryInterface
{
    /**
     * @param int $id
     * @return \Training\Productlistapi\Api\Data\ProductInterface
     * @throws NoSuchEntityException
     */
    public function getProductId($id);
}
