<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string('seat_number');
        });
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number');
        });
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
        });
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->foreign('passenger_id')->references('id')->on('passengers');
            $table->unsignedBigInteger('flight_id');
            $table->foreign('flight_id')->references('id')->on('flights');
            $table->unsignedBigInteger('seat_id');
            $table->foreign('seat_id')->references('id')->on('seats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
