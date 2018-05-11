<?php

use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Person::class, 100)->create()->each(function(App\Person $person){
        	$person->user_types()->attach([
        		rand(1, 3)
        	]);
        });
    }
}
