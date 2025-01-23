<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('license_number')->unique();
            $table->date('license_expiry');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('drivers');
    }
};
