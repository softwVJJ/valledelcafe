<?php

use Illuminate\Database\Seeder;

class EstateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Estate::class, 20)->create()->each(function(App\Estate $estate){
        	$estate->coffee_varieties()->attach([
        		rand(1, 2)
        	]);
        	$estate->drying_types()->attach([
        		1
        	]);
        });
    }
}
