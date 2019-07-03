<?php

use Illuminate\Database\Seeder;

class ReposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Repo::class, 20)->create();
    }
}
