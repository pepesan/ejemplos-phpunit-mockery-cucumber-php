<?php

namespace api;

use Before;
use GuzzleHttp\Client;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class JsonApiTest extends TestCase
{

    public $client;

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    #[Before]
    protected function setUp(): void
    {
        $this->client = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com']);
    }

    #[Test]
    #[TestDox('Comprueba que el Api JSON es valido el Get /post')]
    public function testListPost()
    {

        $response = $this->client->request('GET', "/posts");
        // Asegúrate de que el código de estado sea 200 OK
        $this->assertEquals(200, $response->getStatusCode());
        // Decodifica la respuesta JSON
        $body = $response->getBody();
        $data = json_decode($body, true);
        // Asegúrate de que la respuesta sea un array
        $this->assertIsArray($data);
        $this->assertCount(100, $data);
        $first_data = $data[0];
        $this->assertIsArray($first_data);
        $this->assertCount(4, $first_data);
        $this->assertArrayHasKey('userId', $first_data);
        $this->assertArrayHasKey('id', $first_data);
        $this->assertArrayHasKey('title', $first_data);
        $this->assertArrayHasKey('body', $first_data);
        $this->assertEquals($first_data['userId'], 1);
        $this->assertEquals($first_data['id'], 1);
        $this->assertEquals($first_data['title'], "sunt aut facere repellat provident occaecati excepturi optio reprehenderit");
        $this->assertEquals($first_data['body'], "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto");
    }

    #[Test]
    #[TestDox('Comprueba que el Api JSON es valido el Post /post')]
    public function testAddPost()
    {
        $response = $this->client->request(
            'POST',
            "/posts",
            ["form_params" => array(
                "title" => "foo",
                "body" => "bar",
                "userId" => 1
            )]
        );
        // Asegúrate de que el código de estado sea 200 OK
        $this->assertEquals(201, $response->getStatusCode());
        // Decodifica la respuesta JSON
        $body = $response->getBody();
        $data = json_decode($body, true);
        // Asegúrate de que la respuesta sea un array
        $this->assertIsArray($data);
        $this->assertCount(4, $data);
        $this->assertArrayHasKey('title', $data);
        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('userId', $data);
        $this->assertArrayHasKey('body', $data);
        $this->assertEquals($data['title'], "foo");
        $this->assertEquals($data['body'], "bar");
        $this->assertEquals($data['userId'], 1);
        $this->assertEquals(101, $data['id']);

    }
}
