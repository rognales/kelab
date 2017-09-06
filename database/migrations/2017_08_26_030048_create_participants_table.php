<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('staff_id');
          $table->string('email');
          $table->text('division')->nullable();
          $table->boolean('member')->default(false);
          $table->string('payment_status')->default('not paid');
          $table->text('payment_details')->nullable();
          $table->integer('event_id')->nullable();
          $table->boolean('attend')->default(false);
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
        Schema::dropIfExists('participants');
    }
}
