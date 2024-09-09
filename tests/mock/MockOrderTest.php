<?php

namespace mock;

use Order;
use PHPUnit\Framework\TestCase;
use ShippingService;

require_once 'src/mock/ShippingService.php';
require_once 'src/mock/Order.php';

class MockOrderTest extends TestCase
{
    public function testCalculateTotal()
    {
        // Crea un mock de ShippingService
        $shippingServiceMock = $this->createMock(ShippingService::class);

        // Configura el mock para devolver un valor específico cuando se llama a calculateShippingCost
        $shippingServiceMock
            //->expects($this->once())
            ->expects($this->exactly(1))
            ->method('calculateShippingCost')
            ->with(5, 'New York') // Verifica que los parámetros sean los esperados
            ->willReturn(20.0);  // Simula el costo de envío

        // Crea la instancia de Order con el mock
        $order = new Order($shippingServiceMock);

        // Calcula el total
        $total = $order->calculateTotal(100, 5, 'New York');

        // Asegura que el total es el esperado (costo del artículo + costo de envío simulado)
        $this->assertEquals(120.0, $total);
    }
}

