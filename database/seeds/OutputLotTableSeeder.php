<?php

use Illuminate\Database\Seeder;

class OutputLotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\OutputLot::class, 20)->create();
    }
}
