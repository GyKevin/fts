<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('user_festival_registrations', function (Blueprint $table) {
        if (!Schema::hasColumn('user_festival_registrations', 'points_used')) {
            $table->integer('points_used')->default(0);
        }
        
        if (!Schema::hasColumn('user_festival_registrations', 'used_points_discount')) {
            $table->boolean('used_points_discount')->default(false);
        }
    });
}

public function down()
{
    Schema::table('user_festival_registrations', function (Blueprint $table) {
        $table->dropColumn(['points_used', 'used_points_discount']);
    });
}
};