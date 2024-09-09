<?php

class Order
{
    private $shippingService;

    public function __construct(ShippingService $shippingService)
    {
        $this->shippingService = $shippingService;
    }

    public function calculateTotal($itemCost, $weight, $destination)
    {
        $shippingCost = $this->shippingService->calculateShippingCost($weight, $destination);
        return $itemCost + $shippingCost;
    }
}

