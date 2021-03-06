<?php

use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Redis;

class ReenvioProdtechTest extends TestCase
{
    use DatabaseTransactions;

    public function testReenvioSoap()
    {
        Redis::shouldReceive('publish')->once();
        $reenvio_movil = factory(App\ReenvioMovil::class)->states('prodtech')->create();

        $this->post('/reenvios', [
            'movil_id' => $reenvio_movil->movil_id,
            'hora' => 1485237690,
            'patente' => 'EVU033',
            'latitud' => -33.387117,
            'longitud' => -60.156392,
            'velocidad' => 0.000000,
            'sentido' => 0.000000,
            'posGpsValida' => 1,
            'evento' => 1,
            'temperatura1' => 0,
            'temperatura2' => 0,
            'temperatura3' => 0,
            'sentido_id' => 5, // debe mapear a 2
            'antena' => 7230,
        ]);
        $this->assertResponseStatus(201);
    }
}
