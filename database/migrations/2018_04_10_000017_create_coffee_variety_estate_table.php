<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoffeeVarietyEstateTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'coffee_variety_estate';

    /**
     * Run the migrations.
     * @table coffee_variety_estate
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('coffee_variety_id');
            $table->integer('estate_id');

            $table->primary(array('coffee_variety_id', 'estate_id'));

            $table->index(["coffee_variety_id"], 'fk_coffee_varieties_has_estates_coffee_varieties1_idx');

            $table->index(["estate_id"], 'fk_coffee_varieties_has_estates_estates1_idx');


            $table->foreign('coffee_variety_id', 'fk_coffee_varieties_has_estates_coffee_varieties1_idx')
                ->references('id')->on('coffee_varieties')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('estate_id', 'fk_coffee_varieties_has_estates_estates1_idx')
                ->references('id')->on('estates')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
