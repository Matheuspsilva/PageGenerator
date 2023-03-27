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
    public function test_sucesso_ao_Retornar_pagina_de_qrcode_e_pagina_about_ao_gerar_pagina()
    {
        $usuario = [
            'name' => 'joao',
            'linkedin' => 'https://www.linkedin.com/in/joao/',
            'github' => 'https://github.com/joao',
            'url' => 'https://localhost.com/page/joao'
        ];

        $this->visit('/generate')
        ->see('PageGenerator')
        ->type($usuario['name'], 'name')
        ->type($usuario['linkedin'], 'linkedin')
        ->type($usuario['github'], 'github')
        ->press('Generate Image')
        ->see('Scan Me')
        ->visit($usuario['url'])
        ->see('Hello, my name is ' . $usuario['name'])
        ->seeLink('Linkedin',$usuario['linkedin'])
        ->seeLink('Github',$usuario['github'])
        ;
    }

    public function test_erro_ao_gerar_pagina_com_usuario_repetido(){
        $usuario =  [
            'name' => 'José',
            'linkedin' => 'https://www.linkedin.com/in/jose/',
            'github' => 'https://github.com/jose'
        ];
        $this->visit('/generate')
        ->type($usuario['name'], 'name')
        ->type($usuario['linkedin'], 'linkedin')
        ->type($usuario['github'], 'github')
        ->press('Generate Image')
        ->see('The name has already been taken')
        ->see('The linkedin has already been taken')
        ->see('The github has already been taken');

    }

    public function test_sucesso_ao_gerar_pagina_com_usuario_com_acentos_e_caracteres_especiais(){
        $usuario = [
            'name' => 'øiấêçØ',
            'linkedin' => 'https://www.linkedin.com/in/oiaeco',
            'github' => 'https://github.com/oiaeco',
            'url' => 'https://localhost.com/page/oiaeco'
        ];
        $this->visit('/generate')
        ->see('PageGenerator')
        ->type($usuario['name'], 'name')
        ->type($usuario['linkedin'], 'linkedin')
        ->type($usuario['github'], 'github')
        ->press('Generate Image')
        ->see('Scan Me');


        $this->visit($usuario['url'])
        ->see('Hello, my name is ' . $usuario['name'])
        ->seeLink('Linkedin',$usuario['linkedin'])
        ->seeLink('Github',$usuario['github']);

    }

    public function test_erro_ao_gerar_pagina_com_usuario_mais_de_255_caracteres(){
        $usuario = [
            'name' => '7wItR03qT4dsgFJT46Sw0Qlz3d8KZiUYy9GavUKPavoar1YdNwWh8AVNKJFYlZ71D
            xv9nyeCYQs8Yql0tsYGWrMj7mHzKZgtRWqxha0V2tsqiGoch02ehykJKX5VLxpzvU60314skgmwtunAAMGhMw6wvSXio0l1kbtaVSLw7tKCz4APYtqKVQizK
            UY6zbn6Noh98OQscyxlNnd7IWbLAVoAnDxR8tTowWrpr8EsCy3ta2lkS6ik1cLrXUZzc0OJilVsIT0Juq6XDg7TEUmzsp9IpWR7Sp1El8pEIFc4xbQL',
            'linkedin' => 'https://www.linkedin.com/in/kalsdl',
            'github' => 'https://github.com/kalsdl',
            'url' => 'https://localhost.com/page/kalsdl'
        ];



        $this->visit('/generate')
        ->see('PageGenerator')
        ->type($usuario['name'], 'name')
        ->type($usuario['linkedin'], 'linkedin')
        ->type($usuario['github'], 'github')
        ->press('Generate Image')
        ->see('The name must not be greater than 255 characters.');

    }

    public function test_erro_ao_gerar_pagina_com_linkedin_e_github_sem_formato_de_site(){
        $usuario =  [
            'name' => 'teste',
            'linkedin' => 'teste',
            'github' => 'teste'
        ];
        $this->visit('/generate')
        ->type($usuario['name'], 'name')
        ->type($usuario['linkedin'], 'linkedin')
        ->type($usuario['github'], 'github')
        ->press('Generate Image')
        ->see('The linkedin format is invalid.')
        ->see('The github format is invalid.')
        ;

    }


}
