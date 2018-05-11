<?php

use Illuminate\Database\Seeder;

class InputLotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\InputLot::class, 20)->create();
    }
}
