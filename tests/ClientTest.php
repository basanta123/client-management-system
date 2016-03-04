<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientTest extends TestCase
{
    /**
     * Testing all clients.
     *
     * @return void
     */
    public function testAllClient()
    {

      
      $response = $this->call('GET', '/api/v1/client');

      $this->assertEquals(200, $response->status());
    }

    /**
     * Testing add new client.
     *
     * @return void
     */
    public function testAddNewClient()
    {

      $this->post('/api/v1/client')
      
      ->see('Name field is required');
    }
}
