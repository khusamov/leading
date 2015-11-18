<?php

namespace ZfDeals\Service;

class Checkout
{
    private $dealAvailable;
    private $orderMapper;
    private $productMapper;
    private $dealMapper;

    public function setDealMapper($dealMapper)
    {
        $this->dealMapper = $dealMapper;
    }

    public function getDealMapper()
    {
        return $this->dealMapper;
    }

    public function process($ordering)
    {
        try {
            $this->orderMapper->insert($ordering);
            $deal = $this->dealMapper->findOneById($ordering->getDeal());
            $product = $this->productMapper->findOneById($deal->getProduct());

            $this->productMapper->update(
                array('stock' => $product->getStock() - 1),
                array('productId' => $product->getProductId())
            );

        } catch (\Exception $e) {
            throw new \DomainException('Order could not be processed.');
        }

        return true;
    }

    public function setProductMapper($productMapper)
    {
        $this->productMapper = $productMapper;
    }

    public function getProductMapper()
    {
        return $this->productMapper;
    }

    public function setOrderMapper($orderMapper)
    {
        $this->orderMapper = $orderMapper;
    }

    public function setDealAvailable($dealAvailable)
    {
        $this->dealAvailable = $dealAvailable;
    }

    public function getDealAvailable()
    {
        return $this->dealAvailable;
    }

    public function getOrderMapper()
    {
        return $this->orderMapper;
    }
}
