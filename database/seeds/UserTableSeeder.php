<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\GerenciadorProjeto\Entities\User::class)->create([
            'name' =>  'Andre',
            'email' => 'andre.felip.az@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);
        factory(\GerenciadorProjeto\Entities\User::class, 10)->create();

    }
}
