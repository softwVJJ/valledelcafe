<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonUserTypeTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'person_user_type';

    /**
     * Run the migrations.
     * @table person_user_type
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('person_id');
            $table->integer('user_type_id');

            $table->primary(array('person_id', 'user_type_id'));

            $table->index(["person_id"], 'fk_person_types_people1_idx');

            $table->index(["user_type_id"], 'fk_person_user_type_user_types1_idx');


            $table->foreign('person_id', 'fk_person_types_people1_idx')
                ->references('id')->on('people')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_type_id', 'fk_person_user_type_user_types1_idx')
                ->references('id')->on('user_types')
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
