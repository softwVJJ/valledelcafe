<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDryingTypeEstateTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'drying_type_estate';

    /**
     * Run the migrations.
     * @table drying_type_estate
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('drying_type_id');
            $table->integer('estate_id');

            $table->primary(array('drying_type_id', 'estate_id'));

            $table->index(["estate_id"], 'fk_drying_types_has_estates_estates1_idx');

            $table->index(["drying_type_id"], 'fk_drying_types_has_estates_drying_types1_idx');


            $table->foreign('drying_type_id', 'fk_drying_types_has_estates_drying_types1_idx')
                ->references('id')->on('drying_types')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('estate_id', 'fk_drying_types_has_estates_estates1_idx')
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
