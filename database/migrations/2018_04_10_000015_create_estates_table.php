<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstatesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'estates';

    /**
     * Run the migrations.
     * @table estates
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('altitude');
            $table->string('vereda')->nullable();
            $table->integer('people_id');
            $table->integer('municipalities_id');
            $table->timestamps();

            $table->index(["people_id"], 'fk_estates_people1_idx');

            $table->index(["municipalities_id"], 'fk_estates_municipalities1_idx');


            $table->foreign('people_id', 'fk_estates_people1_idx')
                ->references('id')->on('people')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('municipalities_id', 'fk_estates_municipalities1_idx')
                ->references('id')->on('municipalities')
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
