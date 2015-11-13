<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Client;

class ClientTest extends TestCase
{

    use DatabaseTransactions;

    public function testDatabase(){

        $client = factory(Client::class)->create();

        $this->visit('/clients/list')
            ->see($client->name);

    }

    public function testRequests(){

        $client = factory(Client::class)->create();

        $response = $this->call('GET', '/clients/');
        $this->assertEquals(404, $response->status());

        $response = $this->call('GET', '/clients/new');
        $this->assertEquals(200, $response->status());

        $response = $this->call('GET', '/clients/list');
        $this->assertEquals(200, $response->status());

        $response = $this->call('GET', '/clients/edit/'.$client->id);
        $this->assertEquals(200, $response->status());

        $response = $this->call('POST', '/clients/store',
            [
                'name' => 'Ruiz',
                'birth' => '1992-07-08',
                'address' => 'bairro centro',
                'phone' => '55 42 9916-1669'
            ]
        );
        $this->assertEquals(500, $response->status());

        $response = $this->call('POST', '/clients/store',
            [
                '_token' => csrf_token(),
                'name' => 'Ruiz'
            ]
        );
        $this->assertEquals(302, $response->status());

        $response = $this->call('POST', '/clients/store',
            [
                '_token' => csrf_token(),
                'name' => 'Ruiz',
                'birth' => '1992-07-08',
                'address' => 'bairro centro',
                'phone' => '55 42 9916-1669'
            ]
        );
        $this->assertEquals(200, $response->status());

        $response = $this->call('POST', '/clients/update/'.$client->id,
            [
                'name' => 'Ruiz',
                'birth' => '1992-07-08',
                'address' => 'bairro centro',
                'phone' => '55 42 9916-1669'
            ]
        );
        $this->assertEquals(500, $response->status());

        $response = $this->call('POST', '/clients/update/'.$client->id,
            [
                '_token' => csrf_token(),
                'name' => 'Ruiz'
            ]
        );
        $this->assertEquals(302, $response->status());

        $response = $this->call('POST', '/clients/update/'.$client->id,
            [
                '_token' => csrf_token(),
                'name' => 'Brizola',
                'birth' => '1992-07-08',
                'address' => 'bairro centro',
                'phone' => '4230353333'
            ]
        );
        $this->assertEquals(200, $response->status());

        $response = $this->call('POST', '/clients/delete/');
        $this->assertEquals(500, $response->status());

        $response = $this->call('POST', '/clients/delete/'.$client->id,
            [
                '_token' => csrf_token()
            ]);
        $this->assertEquals(200, $response->status());

    }

    public function testClientNew(){

        $this->visit('/clients/new')
            ->see('Novo cliente')
            ->type('Ricardo', 'name')
            ->type('12071992', 'birth')
            ->type('Rua Saldanha', 'address')
            ->type('(42)9958-1669', 'phone')
            ->press('Criar')
            ->seePageIs('/clients/store')
            ->see('Cliente cadastrado');

    }

    public function testClientList(){

        $client = factory(Client::class)->create();

        $this->visit('/clients/list')
            ->see('Lista de clientes')
            ->click('Editar'.$client->id)
            ->seePageIs('/clients/edit/'.$client->id)
            ->visit('/clients/list')
            ->see('Lista de clientes')
            ->press('Excluir'.$client->id)
            ->seePageIs('/clients/delete/'.$client->id)
            ->see('Cliente excluído');

    }

    public function testClientEdit(){

        $client = factory(Client::class)->create();

        $this->visit('/clients/edit/'.$client->id)
            ->see('Atualizar cliente')
            ->type('Novo endereço', 'address')
            ->press('Atualizar')
            ->seePageIs('/clients/update/'.$client->id)
            ->see('Cliente atualizado')
            ->see('Novo endereço');

    }

}