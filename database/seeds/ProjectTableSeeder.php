<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //\GerenciadorProjeto\Entities\Project::truncate();
        factory(\GerenciadorProjeto\Entities\Project::class, 10)->create();

    }
}
