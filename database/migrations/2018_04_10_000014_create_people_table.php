<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'people';

    /**
     * Run the migrations.
     * @table people
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('names');
            $table->string('surnames');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->integer('employee_roles_id')->nullable();
            $table->integer('identification_types_id');
            $table->timestamps();

            $table->index(["employee_roles_id"], 'fk_persons_employee_roles1_idx');

            $table->index(["identification_types_id"], 'fk_people_identification_types1_idx');


            $table->foreign('employee_roles_id', 'fk_persons_employee_roles1_idx')
                ->references('id')->on('employee_roles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('identification_types_id', 'fk_people_identification_types1_idx')
                ->references('id')->on('identification_types')
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
