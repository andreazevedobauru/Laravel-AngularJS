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
        
        \GerenciadorProjeto\Client::truncate();
        factory(\GerenciadorProjeto\Client::class, 10)->create();

    }
}
