<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('nik', 16)->unique();
            $table->string('username', 15)->nullable();
            $table->string('longname', 50)->nullable();
            $table->string('password');
            $table->tinyInteger('gender')->nullable();
            $table->text('pob')->nullable();
            $table->date('dob')->nullable();
            $table->string('email', 30)->unique();
            $table->string('phone', 12)->nullable();
            $table->string('api_token')->nullable();
            $table->text('img_profile')->nullable();
            $table->integer('role_id')->nullable()->unsigned();
            $table->string('via', 10)->nullable();
            $table->text('current_latitude')->nullable();
            $table->text('current_longitude')->nullable();
            $table->text('last_position')->nullable();
            $table->tinyInteger('activation');
            $table->string('created_by', 30);
            $table->string('updated_by', 30);
            $table->timestamps();
            $table->foreign('role_id')
                  ->references('role_id')->on('roles')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
