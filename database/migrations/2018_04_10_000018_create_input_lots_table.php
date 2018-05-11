<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputLotsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'input_lots';

    /**
     * Run the migrations.
     * @table input_lots
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('input_date');
            $table->integer('kilos_number');
            $table->integer('available_kilos');
            $table->char('state', 1);
            $table->integer('estates_id');
            $table->integer('cup_profiles_id');
            $table->integer('yield_factors_id');
            $table->integer('production_lots_id');
            $table->timestamps();

            $table->index(["estates_id"], 'fk_input_lots_estates1_idx');

            $table->index(["yield_factors_id"], 'fk_input_lots_yield_factors1_idx');

            $table->index(["production_lots_id"], 'fk_input_lots_production_lots1_idx');

            $table->index(["cup_profiles_id"], 'fk_input_lots_cup_profiles1_idx');


            $table->foreign('estates_id', 'fk_input_lots_estates1_idx')
                ->references('id')->on('estates')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('cup_profiles_id', 'fk_input_lots_cup_profiles1_idx')
                ->references('id')->on('cup_profiles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('yield_factors_id', 'fk_input_lots_yield_factors1_idx')
                ->references('id')->on('yield_factors')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('production_lots_id', 'fk_input_lots_production_lots1_idx')
                  ->references('id')->on('production_lots')
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
