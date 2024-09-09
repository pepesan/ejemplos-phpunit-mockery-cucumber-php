<?php

use PHPUnit\Framework\Attributes\After;
use PHPUnit\Framework\Attributes\AfterClass;
use PHPUnit\Framework\Attributes\Before;
use PHPUnit\Framework\Attributes\BeforeClass;
use PHPUnit\Framework\TestCase;

class FixtureTest extends TestCase
{


    /**
     * Se ejecuta una sola vez antes de que todas las pruebas en la clase se ejecuten
     * Generalmente, se utiliza para configurar algo costoso o global, como una conexión a la base de datos.
     */
    #[BeforeClass]
    public static function setUpBeforeClass(): void
    {
        echo "beforeClass\n";
    }

    /**
     * Se ejecuta antes de cada prueba
     * Se utiliza normalmente para inicializar el estado antes de cada prueba
     */
    #[Before]
    protected function setUp(): void
    {
        echo "before\n";
    }

    /**
     * Un test básico que verifica si los datos del usuario están configurados correctamente
     */
    public function testUnNamed(): void
    {
        $this->assertEquals(1, 1);
    }

    /**
     * Un test que verifica si el email del usuario es correcto
     */
    public function testComplementario(): void
    {
        $this->assertEquals(1, 1);
    }

    /**
     * Se ejecuta después de cada prueba
     * Se utiliza para limpiar el entorno o estado después de cada prueba
     */
    #[After]
    protected function tearDown(): void
    {
        echo "after\n";
    }

    /**
     * Se ejecuta una sola vez después de que todas las pruebas en la clase hayan terminado
     * Generalmente, se utiliza para cerrar conexiones o liberar recursos
     */
    #[AfterClass]
    public static function tearDownAfterClass(): void
    {
        echo "afterClass\n";
    }
}

