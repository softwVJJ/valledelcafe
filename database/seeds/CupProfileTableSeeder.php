<?php

use Illuminate\Database\Seeder;

class CupProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CupProfile::class, 10)->create();
    }
}
