<?php

use Illuminate\Database\Seeder;

class YieldFactorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\YieldFactor::class, 10)->create();
    }
}
