<?php

namespace mock;

use Order;
use PHPUnit\Framework\TestCase;
use ShippingService;

require_once 'src/mock/ShippingService.php';
require_once 'src/mock/Order.php';

class StubOrderTest extends TestCase
{
    public function testCalculateTotal()
    {
        // Crea un stub de ShippingService
        $shippingServiceStub = $this->createStub(ShippingService::class);

        // Configura el stub para devolver un valor específico cuando se llama a calculateShippingCost
        $shippingServiceStub
            ->method('calculateShippingCost')
            ->with(5, 'New York') // Verifica que los parámetros sean los esperados
            ->willReturn(20.0);  // Simula el costo de envío

        // Crea la instancia de Order con el stub
        $order = new Order($shippingServiceStub);

        // Calcula el total
        $total = $order->calculateTotal(100, 5, 'New York');

        // Asegura que el total es el esperado (costo del artículo + costo de envío simulado)
        $this->assertEquals(120.0, $total);
    }
}

