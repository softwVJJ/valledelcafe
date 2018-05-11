<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCupProfilesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'cup_profiles';

    /**
     * Run the migrations.
     * @table cup_profiles
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->double('cup_score');
            $table->string('aroma');
            $table->string('flavor');
            $table->string('acidity');
            $table->string('body');
            $table->string('sweetness');
            $table->integer('balance_value');
            $table->string('balance_description')->nullable();
            $table->integer('total_input_weight');
            $table->integer('estimated_output');
            $table->timestamps();
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
