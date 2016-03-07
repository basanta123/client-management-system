<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\ClientController;

class ClientTest extends TestCase
{
    private $client;

    /**
     * Testing all clients.
     *
     * @return void
     */
    public function testAllClient()
    {
        $this->client = new ClientController();
        $response = $this->call('GET', '/api/v1/client');
        $this->client->getALLClient();
        $this->assertEquals(200, $response->status());
    }

    /**
     * Testing add new client.
     *
     * @return void
     */
    public function testAddNewClient()
    {
        $response= $this->call('POST', '/api/v1/client');
        $this->see('Name field is required');
        $this->assertEquals(200, $response->status());
    }
}
