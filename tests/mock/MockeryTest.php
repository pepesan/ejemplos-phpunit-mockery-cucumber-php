<?php

namespace mock;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use UserService;

require_once 'src/mockery/UserService.php';
require_once 'src/mockery/UserRepository.php';

class MockeryTest extends MockeryTestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testUserService()
    {
        // Crear un mock de la clase UserRepository
        $mock = Mockery::mock('UserRepository');

        // Configurar el mock para que espere que el método findByEmail sea llamado con 'user@example.com'
        // y retorne un valor predefinido.
        $mock->shouldReceive('findByEmail')
            ->with('user@example.com')
            ->andReturn(['id' => 1, 'email' => 'user@example.com']);

        // Crear una instancia del servicio con el mock
        $userService = new UserService($mock);

        // Ejecutar el método de prueba
        $result = $userService->getUserByEmail('user@example.com');

        // Asegurarse de que el resultado es el esperado
        $this->assertEquals(['id' => 1, 'email' => 'user@example.com'], $result);
    }
}

