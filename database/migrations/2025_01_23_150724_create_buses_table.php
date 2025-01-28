<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('bus_number');
            $table->foreignId('festival_id')->constrained()->onDelete('cascade');
            $table->foreignId('driver_id')->nullable()->constrained()->onDelete('set null');
            $table->date('date');
            $table->string('location');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->integer('total_seats');
            $table->integer('available_seats');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('buses');
    }
};
