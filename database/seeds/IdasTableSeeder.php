<?php

use Illuminate\Database\Seeder;

class IdasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(\Figview\Entities\Idas::class, 10)->create();
    }
}
