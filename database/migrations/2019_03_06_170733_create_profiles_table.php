<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('university')->nullable();
            $table->integer('edu_from')->nullable();
            $table->string('edu_to')->nullable();
            $table->text('edu_description')->nullable();
            $table->string('graduate')->nullable();
            $table->string('work_company')->nullable();
            $table->string('work_designation')->nullable();
            $table->integer('work_from')->nullable();
            $table->string('work_to')->nullable();
            $table->string('work_city')->nullable();
            $table->string('work_description')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
