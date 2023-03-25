<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            'name' => 'José',
            'linkedin' => 'https://www.linkedin.com/in/jose/',
            'github' => 'https://github.com/jose',
            'url' => "https://matheuspsilvadev.com/jose"
        ]);
    }
}
