<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYieldFactorsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'yield_factors';

    /**
     * Run the migrations.
     * @table yield_factors
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('yield_factor');
            $table->integer('pasilla_percentage');
            $table->integer('white_percentage');
            $table->integer('fermented_percentage');
            $table->integer('berry_borer_percentage')->nullable();
            $table->integer('merma')->nullable();
            $table->integer('d_x_machine')->nullable();
            $table->char('machine_trilla',1);
            $table->char('machine_desimetric',1);
            $table->char('machine_electronic',1);
            $table->char('machine_tostion',1);
            $table->char('machine_select',1);

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
