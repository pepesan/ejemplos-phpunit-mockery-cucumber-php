<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    #[Test]
    #[TestDox('Comprueba que es JSON valido')]
    public function testTrueAssertsToTrue()
    {
        $client = new Client(['base_uri' => 'https://pactometro.cursosdedesarrollo.com/']);
        $response = $client->request('GET', "resultados.json");
        // Asegúrate de que el código de estado sea 200 OK
        $this->assertEquals(200, $response->getStatusCode());
        // Decodifica la respuesta JSON
        $body = $response->getBody();
        $data = json_decode($body, true);
        // Asegúrate de que la respuesta sea un array
        $this->assertIsArray($data);
        $this->assertCount(12, $data);
        $first_data = $data[0];
        $this->assertIsArray($first_data);
        $this->assertCount(3, $first_data);
        $this->assertArrayHasKey('nombre', $first_data);
        $this->assertArrayHasKey('dipu', $first_data);
        $this->assertArrayHasKey('imagen', $first_data);
        $this->assertEquals($first_data['nombre'], "PP");
        $this->assertEquals($first_data['dipu'], 137);
        $this->assertEquals($first_data['imagen'], "logotipo-pp.png");

    }
}