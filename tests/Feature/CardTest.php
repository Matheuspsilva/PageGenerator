<?php

namespace Tests\Feature;

use App\Models\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CardTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed', ['--class' => 'CardSeeder']);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_retornar_pagina_de_qrcode_ao_gerar_pagina()
    {
        $this->visit('/generate')
        ->see('Laravel')
        ->type('joao', 'name')
        ->type('https://www.linkedin.com/in/joao/', 'linkedin')
        ->type('https://github.com/joao', 'github')
        ->press('Generate Image')
        ->see('Scan Me');
    }

    public function test_erro_ao_gerar_pagina_com_usuario_repetido(){
        $card =  [
            'name' => 'José',
            'linkedin' => 'https://www.linkedin.com/in/jose/',
            'github' => 'https://github.com/jose'
        ];
        $this->visit('/generate')
        ->type($card['name'], 'name')
        ->type($card['linkedin'], 'linkedin')
        ->type($card['github'], 'github')
        ->press('Generate Image')
        ->see('The name has already been taken')
        ->see('The linkedin has already been taken')
        ->see('The github has already been taken');

    }



}
