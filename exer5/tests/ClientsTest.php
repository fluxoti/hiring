<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Client;

class ClientsTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;



    public function testIndex(){
        $response = $this->call('GET', 'clients');

        $this->assertEquals(200, $response->status());
    }

    public function testShow(){
        $client = factory(Client::class,1)->create();
        $this->visit('/clients/'.$client->id)
            ->see($client->name)
            ->see($client->address)
            ->see($client->phone)
            ->see($client->birth);

    }

    public function testStoreActionWithInvalidData(){

        $response = $this->call('POST', 'clients', array());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertSessionHasErrors();
    }


    public function testStoreActionWithValidData(){
        $client = factory(Client::class)->make();

        $response = $this->call('POST', 'clients', $client->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('/');

    }

    public function testClientDatabaseCreate(){
        $client = factory(Client::class)->create();

        $this->seeInDatabase('clients', ['id' => $client->id]);

    }

    public function testDelete()
    {
        $client = factory(Client::class)->create();

        $response = $this->call('DELETE', 'clients/'.$client->id);

        $this->assertEquals(302, $response->getStatusCode());
        $this->missingFromDatabase('clients', ['id' => $client->id]);
    }
}
