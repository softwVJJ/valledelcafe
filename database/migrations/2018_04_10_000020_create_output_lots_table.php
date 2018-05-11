<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputLotsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'output_lots';

    /**
     * Run the migrations.
     * @table output_lots
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('kilos_number');
            $table->integer('input_lots_id');
            $table->integer('coffee_lines_id');
            $table->timestamps();

            $table->index(["input_lots_id"], 'fk_output_lots_input_lots1_idx');

            $table->index(["coffee_lines_id"], 'fk_output_lots_coffee_lines1_idx');


            $table->foreign('input_lots_id', 'fk_output_lots_input_lots1_idx')
                ->references('id')->on('input_lots')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('coffee_lines_id', 'fk_output_lots_coffee_lines1_idx')
                ->references('id')->on('coffee_lines')
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
