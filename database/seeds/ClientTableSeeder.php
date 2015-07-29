<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \GerenciadorProjeto\Models\Client::truncate();
        factory(\GerenciadorProjeto\Models\Client::class, 10)->create();

    }
}
