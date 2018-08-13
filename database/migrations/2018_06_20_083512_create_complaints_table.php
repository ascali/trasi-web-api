<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->increments('complaint_id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('complaint_type', 50)->nullable();
            $table->string('in_charge_police', 50)->nullable();
            $table->text('description')->nullable();
            $table->string('complaint_status', 50)->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('address')->nullable();
            $table->string('created_by', 30)->nullable();
            $table->string('updated_by', 30)->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                  ->references('user_id')->on('users')
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
        Schema::dropIfExists('complaints');
    }
}
