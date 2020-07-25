<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

		Schema::create('eventplanner', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('The Primary Key for the table.');
            $table->string('firstName', 255)->comment('The Name of the user.');
			$table->string('lastName', 255)->comment('The lastName of the user.');
			$table->text('email')->comment('The email of the user');
            $table->date('birthday')->comment('Birthday.');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('The Primary Key for the table.');
			$table->unsignedBigInteger('user_id')->index('user_id')->comment('The corresponding user.');
            $table->string('title', 255)->comment('The title of the event.');
            $table->text('description')->comment('The full text description of the event.');
			$table->text('image')->comment('Image of the event.');
			$table->text('date')->comment('date of the event.');
            $table->integer('value')->comment('The rate of the event.');
            $table->integer('capacity')->comment('The capacity of the event.');
            $table->timestamps();
            $table->softDeletes();
			$table->foreign('user_id')->references('id')->on('users');
        });

    

        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('The Primary Key for the table.');
            $table->unsignedBigInteger('event_id')->index('event_id')->comment('The corresponding event.');
			$table->unsignedBigInteger('user_id')->index('user_id')->comment('The corresponding user.');
            $table->date('bookingDate')->comment('The date of the booking the event.');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('event_id')->references('id')->on('events');
			$table->foreign('user_id')->references('id')->on('users');
        });
		
		Schema::create('savings', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('The Primary Key for the table.');
            $table->unsignedBigInteger('event_id')->index('event_id')->comment('The corresponding event.');
			$table->unsignedBigInteger('user_id')->index('user_id')->comment('The corresponding user.');
            $table->date('savingDate')->comment('The date of the saving the event.');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('event_id')->references('id')->on('events');
			$table->foreign('user_id')->references('id')->on('users');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('savings');
        Schema::dropIfExists('users');
        
    }
}