<?php

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class GroupsTest extends TestCase
{

    #[Test]
    #[Group('database')]
    public function testUserIsSavedToDatabase(): void
    {
        // Simulación de guardar usuario en la base de datos
        $this->assertTrue(true);
    }

    #[Test]
    #[Group('api')]
    public function testApiReturnsUserData(): void
    {
        // Simulación de guardar usuario en la base de datos
        $this->assertTrue(true);
    }

    #[Test]
    #[Group('database')]
    public function testUserIsDeletedFromDatabase(): void
    {
        // Simulación de eliminar usuario de la base de datos
        $this->assertTrue(true);
    }

    #[Test]
    #[Group('api')]
    public function testApiReturnsErrorForInvalidUser(): void
    {
        // Simulación de una petición a la API con un usuario inválido
        $this->assertEquals(404, 404);
    }
}
