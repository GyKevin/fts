<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('festivals', function (Blueprint $table) {
            $table->id();
            $table->string('festival_name');
            $table->date('date');
            $table->string('location');
            $table->text('description')->nullable();
            $table->integer('max_participants')->nullable();
            $table->date('registration_deadline')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('festivals');
    }
};
