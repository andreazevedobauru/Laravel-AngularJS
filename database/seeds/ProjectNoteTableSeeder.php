<?php

use Illuminate\Database\Seeder;

class ProjectNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //\GerenciadorProjeto\Entities\Project::truncate();
        factory(\GerenciadorProjeto\Entities\ProjectNote::class, 10)->create();

    }
}
